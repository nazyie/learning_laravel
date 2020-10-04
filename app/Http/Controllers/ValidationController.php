<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
  public function index()
  {
    return view('lesson-9.form');
  }

  public function store(Request $request)
  {
    //$validated = $request->validate([
    //  'name' => ['required', 'max:255'],
    //  'email' => ['required'],
    //  'password' => ['required', 'min:10', 'max:20'],
    //]);

    $this->validateData();

    return redirect('/');
  }

  public function storeRequest(LearningRequest $request)
  {
    $validated = $request->validated();

    return redirect('/');
  }

  function validateData()
  {
    return request()->validate([
      'name' => ['required', 'max:255'],
      'email' => ['required_if:name,Engku Nazri'],
      'password' => ['required', 'min:10', 'max:20'],
    ]);
  }
}
