<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Level;
use App\Models\Menu;
use App\Models\User;
use Session;
use Hash;

class LoginController extends Controller {

  public function __construct(){
    $this->middleware('admin',['except' => [
      'login','index'
    ]]);
  }
  
  public function index(){
    if(Session::get('login')){
      $data = [
        'menu' => Menu::get()->count(),
        'level' => Level::get()->count(),
        'user' => User::get()->count(),
        'transaction' => Transaction::get()->count(),
        'capt' => 'Dashboard',
        'adashboard' => 'active'
      ]; 
  
      return view('dashboard', $data);
    }else{
      return redirect('/masuk');
    }
  }
  
  public function login(Request $req){
    $this->validate($req, [
      'username' => 'required',
      'password' => 'required'
    ]);

    $data = User::where('username',$req->username);
    if($data->count() > 0){
      $user = $data->first();
      if(Hash::check($req->password,$user->password)){
        $session = [
          'id_user' => $user->id,
          'id_level' => $user->id_level,
          'name' => $user->name,
          'login' => TRUE
        ];
        Session::put($session);

        return response()->json([
          'success' => TRUE,
          'message' => 'Anda berhasil login!',
          'redirect' => '/'
        ]);
      }else{
        return response()->json([
          'success' => FALSE,
          'message' => 'Password yang anda masukkan salah!'
        ]);
      }
    }else{
      return response()->json([
        'success' => FALSE,
        'message' => 'Nama Pengguna tidak terdaftar!'
      ]);
    }
  }
}
