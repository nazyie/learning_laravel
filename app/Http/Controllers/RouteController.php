<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
  public function index()
  {
    return "This is the route that you create";
  }

  public function about()
  {
    return "This can being retrieve either by get | post method";
  }

  public function routing_any_method()
  {
    return "This can being retrieve by any method";
  }

  public function optional($optional_param)
  {
    return "The parameter is ".$optional_param;
  }
}
