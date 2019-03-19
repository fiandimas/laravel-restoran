<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\DetailOrder;
use DB;
use Cart;

class TransactionController extends Controller
{
  public function index(){
    $data = [
      'menu' => Menu::get(),
      'last_order' => $this->getLatestOrder()->id,
      'capt' => 'Transaksi',
      'atransaction' => 'active'
    ];
    
    return view('transaction.transaction',$data);
  }

  public function addCart($id,$status){
    $menu =  Menu::where('id',$id)->select('id','name','price')->first();
    if($menu){
      Cart::add([
        'id' => $menu->id,
        'name' => $menu->name,
        'qty' => 1,
        'price' => $menu->price,
        'options' => [
          'status' => $status
        ]
      ]);

      return redirect('/transaksi');
    }else{
      return redirect('/transaksi');
    }
  }

  public function removeCart($rowId){
    Cart::remove($rowId);
    return redirect('/transaksi');
  }

  public function destroyCart(){
    Cart::destroy();
    return redirect('/transaksi');
  }

  public function buy(Request $req){
    Order::create([
      'num_table' => $req->num_table,
      'id_user' => 1,
      'information' => $req->information,
      'status_order' => $req->status_order
    ]);

    $cart = [];
    foreach(Cart::content() as $data){
      array_push($cart,[
        'id_order' => (int)$req->no_order,
        'id_menu' =>  $data->id,
        'qty' => $data->qty,
        'information' => null,
        'status_detail_order' => $data->options->status 
      ]);
    }
    DetailOrder::insert($cart);
    Cart::destroy();
    return redirect('/transaksi');
  }

  private function getLatestOrder(){
    return Order::latest()->select('id')->first();
  }
}
