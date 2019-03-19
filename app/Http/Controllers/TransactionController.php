<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Menu;
use Session;
use Cart;
use DB;

class TransactionController extends Controller {

  public function index(){
    $data = [
      'menu' => Menu::get(),
      'last_order' => $this->getLatestOrder(),
      'capt' => 'Transaksi',
      'atransaction' => 'active',
      'js' => 'js/transaction/transaction.js',
      'cart' => 'js/transaction/cart.js'
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
    if(Cart::count() == 0){
      return response()->json([
        'success' => FALSE,
        'message' => 'Silahkan pesan masakan terlebih dahulu!'
      ]);
    }else{
      Order::create([
        'num_table' => $req->num_table,
        'id_user' => Session::get('id_user'),
        'information' => $req->information,
        'status_order' => $req->status_order
      ]);
  
      $cart = [];
      $total = 0;
      foreach(Cart::content() as $data){
        array_push($cart,[
          'id_order' => (int)$req->no_order,
          'id_menu' =>  $data->id,
          'qty' => $data->qty,
          'information' => NULL,
          'status_detail_order' => $data->options->status 
        ]);
        $total += $data->subtotal;
      }
  
      Transaction::create([
        'id_user' => Session::get('id_user'),
        'total' => $total
      ]);
  
      DetailOrder::insert($cart);
      Cart::destroy();
  
      return response()->json([
        'success' => TRUE
      ]);
    }
  }

  private function getLatestOrder(){
    $data = Order::latest()->select('id')->first();
    return empty($data) ? 0 : $data->id ;
  }
}
