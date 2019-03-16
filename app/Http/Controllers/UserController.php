<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Level;

class UserController extends Controller
{
  public function index(){
    $user =  User::join('level','level.id','=','user.id_level')
              ->select('user.id','user.name as uname','level.name as lname','username')
              ->get();
    $data = [
      'user' => $user,
      'capt' => 'Master User',
      'auser' => 'active',
      'js' => 'js/user/delete.js'
    ];
    return view('user.user', $data);
  }

  public function add(){
    $data = [
      'level' => Level::select('id','name')->get(), 
      'capt' => 'Tambah pengguna',
      'auser' => 'active',
      'js' => 'js/user/add.js'
    ];

    return view('user.add', $data);
  }

  public function store(Request $req){
    $this->validate($req,[
      'name' => 'required',
      'username' => 'required',
      'password' => 'required'
    ]);

    $user = User::where('username', $req->username);
    if($user->count() > 0){
      return response()->json([
        'success' => false,
        'message' => 'Username sudah terdaftar'
      ]);
    }else{
      User::create([
        'name' => $req->name,
        'username' => $req->username,
        'password' => Hash::make($req->password),
        'id_level' => $req->id_level
      ]);

      return response()->json([
        'success' => true
      ]);
    }
  }

  public function edit($id){
    $user = User::where('user.id',$id)
              ->join('level','level.id','=','user.id_level')
              ->select('user.id','user.name as uname','username','level.name as lname','level.id as lid')
              ->first();
    $level = Level::where('id','!=', $user->lid)->select('id','name')->get(); 
    $data = [
      'user' => $user,
      'level' => $level,
      'capt' => 'Edit User',
      'auser' => 'active',
      'js' => 'js/user/edit.js'
    ];
    return view('user.edit', $data);
  }

  public function update(Request $req,$id){
    $this->validate($req,[
      'name' => 'required'
    ]);

    $user = User::find($id);
    $user->name = $req->name;
    $user->id_level = $req->id_level;

    $user->save();

    return response()->json([
      'success' => true
    ]);
  }

  public function delete($id){
    $user = User::findOrFail($id)->delete();

    return response()->json([
      'success' => true
    ]);
  }
}
