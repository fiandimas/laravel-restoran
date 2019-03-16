<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
  public function show(){
    $level = Level::get();
    $data = [
      'level' => $level,
      'capt' => 'Master Level',
      'js' => 'js/level/delete.js',
      'alevel' => 'active'
    ];

    return view('level.level', $data);
  }

  public function edit($id){
    $level = Level::where('id',$id)->select('id','name')->first();
    $data = [
      'level' => $level,
      'capt' => 'Edit Level',
      'js' => 'js/level/edit.js',
      'alevel' => 'active'
    ];

    return view('level.edit', $data);
  }

  public function update(Request $req,$id){
    $this->validate($req,[
      'name' => 'required'
    ]);

    $level = Level::findOrFail($id);
    $level->name = $req->name;

    $level->save();

    return response()->json([
      'success' => true,
    ]);
  }
}
