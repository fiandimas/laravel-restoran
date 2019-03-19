<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
use App\Models\Menu;
use App\Models\Level;
use App\Models\Transaction;

class LoginController extends Controller
{
  
  public function index(){
    $data = [
      'menu' => Menu::get()->count(),
      'level' => Level::get()->count(),
      'user' => User::get()->count(),
      'transaction' => Transaction::get()->count(),
      'capt' => 'Dashboard',
      'adashboard' => 'active'
    ]; 

    return view('dashboard', $data);
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
          'login' => true
        ];

        Session::put($session);
        return response()->json([
          'success' => true,
          'message' => 'Success login, now you can login!',
          'redirect' => '/'
        ]);
      }else{
        return response()->json([
          'success' => false,
          'message' => 'Wrong password!'
        ]);
      }
    }else{
      return response()->json([
        'success' => false,
        'message' => 'Username not registered!'
      ]);
    }
  }
}
