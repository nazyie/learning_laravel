<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class URLGenerationController extends Controller
{
  public function __construct()
  {
    $this->middleware('signed', ['only' => ['index']]);
  }

  public function index(Request $request)
  {
    return response()->json([
      "name" => "Engku Nazri",
      "data" => "This is response from URLGenerationController",
    ]);
  }

  public function create()
  {
    $hashURL = URL::signedRoute('url.name');

    return response()->json([
      "url" => $hashURL,
    ]);
  }

  public function createTemporarySignedRoute()
  {
    $hashURL = URL::temporarySignedRoute('url.name', now()->addSeconds(30));

    return response()->json([
      "url" => $hashURL,
    ]);
  }
}
