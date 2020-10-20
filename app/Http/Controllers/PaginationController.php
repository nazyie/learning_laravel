<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
  // based on page
  public function index()
  {
    $pagination = User::paginate(2);

    $simplePagination = User::simplePaginate(2);

    dd($simplePagination);
  }

  // if using the bootstrap we can configure it AppServiceProvider
  // the default is tailwindcss 
  public function samplePagination()
  {
    $users = User::paginate(2);

    return view('lesson-10.index', compact('users'));
  }
}
