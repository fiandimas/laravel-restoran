<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
  public function index(){
    $menu = Menu::select('id','name','price')->get();
    $data = [
      'menu' => $menu
    ];
    
    return view('menu.menu', $data);
  }
}
