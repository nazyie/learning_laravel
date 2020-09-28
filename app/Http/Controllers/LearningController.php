<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LearningController extends Controller
{
  public function starter()
  {
    $users = User::all();

    return json_encode($users);
  }
}
