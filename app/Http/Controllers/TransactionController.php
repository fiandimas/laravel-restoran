<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use DB;
use Cart;

class TransactionController extends Controller
{
  public function index(){
    $data = [
      'menu' => Menu::get(),
      'capt' => 'Transaksi',
      'atransaction' => 'active'
    ];
    return view('transaction.transaction',$data);
  }

  public function addCart(Request $req,$id){
    $menu =  Menu::where('id',$id)->select('id','name','price')->first();
    if($menu){
      Cart::add([
        'id' => $menu->id,
        'name' => $menu->name,
        'qty' => 1,
        'price' => $menu->price,
        'options' => [
          'status' => $req->status_order
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
}
