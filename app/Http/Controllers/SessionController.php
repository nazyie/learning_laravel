<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
  public function index(Request $request)
  {
    $value = $request->session()->get('key');

    $all = $request->session()->all();

    return response()->json([
      "key" => $value,
      "allData" => $all,
    ]);
  }

  public function clear(Request $request)
  {
    $request->session()->forget('key');
    // $request->session()->forget(['key', 'key2']);
    // $request->session()->flush();

    return redirect('lesson-8/index');
  }

  public function create(Request $request)
  {
    $request->session()->put('key', 'value');

    return redirect('lesson-8/index');
  }

  public function createFlash()
  {
    return redirect('lesson-8/showFlash')->with('flashData', 'Hello from flash Data');
  }

  public function showFlash()
  {
    return view('lesson-8.index');
  }
}
