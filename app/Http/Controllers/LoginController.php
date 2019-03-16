<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
  public function login(Request $req){
    $this->validate($req, [
      'username' => 'required',
      'password' => 'required'
    ]);
  }
}
