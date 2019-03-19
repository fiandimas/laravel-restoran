<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
  public function __construct(){
    $this->middleware('admin');
  }
  
  public function index(){
    $menu = Menu::select('id','name','price')->get();
    $data = [
      'menu' => $menu,
      'capt' => 'Master Masakan',
      'js' => 'js/menu/delete.js',
      'amenu' => 'active'
    ];

    return view('menu.menu', $data);
  }

  public function add(){
    $data = [
      'capt' => 'Tambah Masakan',
      'js' => 'js/menu/add.js',
      'amenu' => 'active'
    ];

    return view('menu.add', $data);
  }

  public function store(Request $req){
    $this->validate($req,[
      'name' => 'required',
      'price' => 'required|numeric'
    ]);

    Menu::create([
      'name' => $req->name,
      'price' => $req->price
    ]);

    return response()->json([
      'success' => true
    ]);
  }

  public function edit($id){
    $menu = Menu::where('id',$id)->select('id','name','price')->first();
    if($menu){
      $data = [
        'menu' => $menu,
        'capt' => 'Sunting Masakan',
        'js' => 'js/menu/edit.js',
        'amenu' => 'active'
      ];

      return view('menu.edit', $data);
    }else{
      return redirect('/masakan');
    }
  }

  public function update(Request $req,$id){
    $this->validate($req,[
      'name' => 'required',
      'price' => 'required|numeric'
    ]);

    $menu = Menu::findOrFail($id);
    $menu->name = $req->name;
    $menu->price = $req->price;

    $menu->save();
    
    return response()->json([
      'success' => true
    ]);
  }

  public function delete($id){
    $menu = Menu::find($id)->delete();

    return response()->json([
      'success' => true
    ]);
  }
}
