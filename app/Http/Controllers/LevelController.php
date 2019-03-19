<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller {

  public function __construct(){
    $this->middleware('admin');
  }
  
  public function index(){
    $level = Level::get();
    $data = [
      'level' => $level,
      'capt' => 'Master Level',
      'js' => 'js/level/delete.js',
      'alevel' => 'active'
    ];

    return view('level.level', $data);
  }
}
