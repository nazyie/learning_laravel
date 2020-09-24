<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
  public function __construct()
  {
    $this->middleware('carCheck', ['only' => ['index']]);
    $this->middleware('carCheck');
    $this->middleware('carCheck', ['except' => ['fx_didnt_want', '2nd_fx_didnt_want']]);
  }

  public function index()
  {
    return "You can access this car from controller";
  }
}
