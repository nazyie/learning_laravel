<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
  public function index(){
    $data = "data from controller";

    return view('lesson-6.index', ['data' => $data]);
    // return view('lesson-6.index')->with('data', $data);
    // return view('lesson-6.index', compact('data'));
  }
}
