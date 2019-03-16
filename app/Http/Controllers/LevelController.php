<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
  public function edit($id){
    $level = Level::where('id',$id)->select('id','name')->first();
    $data = [
      'level' => $level,
    ];
    return view('level.edit', $data);
  }

  public function show(){
    $level = Level::get();
    $data = [
      'level' => $level,
    ];
    return view('level.level', $data);
  }

  public function update(Request $req,$id){
    return response()->json([
      'id' => $id,
      'name' => $req->name
    ]);
  }
}
