<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index(){
    $user =  User::join('level','level.id','=','user.id_level')->select('user.id','user.name as uname','level.name as lname','username')->get();
    $data = [
      'user' => $user,
      'capt' => 'Master User'
    ];
    return view('user.user', $data);
  }
}
