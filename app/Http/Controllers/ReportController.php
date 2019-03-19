<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class ReportController extends Controller {

  public function __construct(){
    $this->middleware('admin');
  }
  
  public function index(){
    $order = Order::join('user','user.id','=','order.id_user')->select('order.id','order.num_table','order.created_at','user.name')->orderBy('created_at','DESC')->get();
    $data = [
      'capt' => 'Laporan',
      'order' => $order,
      'areport' => 'active'
    ];

    return view('report.report', $data);
  }

  public function print($id){
    $data = Order::join('detail_order','detail_order.id_order','=','order.id')
          ->join('menu','menu.id','=','detail_order.id_menu')
          ->select('menu.name','menu.price','detail_order.qty','menu.price','order.created_at')
          ->where('order.id',$id)
          ->get();
    $total = 0;
    
    if(!empty($data[0])){
      $pdf =  PDF::loadView('report.hasil',compact('data','total'));
    
      return $pdf->download('invoice-'.$data[0]->created_at.time().'.pdf');
    }else{
      return redirect('/laporan');
    }
  }
}
