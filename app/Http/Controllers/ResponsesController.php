<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsesController extends Controller
{

  // creating responses
  public function string()
  {
    return 'Hello World';
  }

  public function array()
  {
    return [1, 2, 3];
  }

  public function responseObject()
  {
    return response('Hello World', 200)
      ->header('Content-Type', 'text/plain');
  }

  public function cookies()
  {
    return response('Hello World', 200)
      ->header('Content-Type', 'text/plain');
      //->cookie('name', 'value', $value)
  }

  // redirects
  public function redirects($type)
  {
    if($type == 'redirect'){
      return redirect('/');
    }

    if($type == 'backwithInput'){
      return back()->withInput();
    }

    if($type == 'backwithSession'){
      return back()->with('status', 'Profile Updated');
    }

    if($type == 'routeName'){
      return redirect()->route('home');
    }

    if($type == 'redirectController'){
      return redirect()->action([ResponsesController::class, 'string']);
    }

    if($type == 'redirectExternal'){
      return redirect()->away('https://www.google.com');
    }
  }

  // others response
  public function view()
  {
    return response()
      ->view('home');
  }

  public function json()
  {
    return response()
      ->json([
        'name' => 'Engku Nazri',
        'age' => 22
      ]);
  }

  public function downloadLink()
  {
    $pathToFile = 'tiputipuje';

    return response()->download($pathToFile);
    // return response()->download($pathToFile, $name, $header);
    // return response()->download($pathToFile)->deleteFileAfterSend();
  }
}
