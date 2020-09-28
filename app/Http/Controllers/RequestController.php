<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
  /////////////
  // Request //
  /////////////
  
  public function index(Request $request)
  {
    // retrieving JSON request
    $JSONRequest = $request->input('user.name');

    // determined the request value
    if($request->has(['name', 'email'])) {
      //
    }

    // return value if it satisfy one of value the request value
    if($request->hasAny(['name', 'email'])) {
      //
    }

    // return true if it filled
    if($request->filled('email')) {
      //
    }

    // return true if it missing
    if($request->missing(['name', 'email'])) {
      //
    }
    
    // return true if it missing
    if($request->hasFile('images')) {
      $request->photo->store('images');
    }
  }
}
