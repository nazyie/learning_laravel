<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QueryBuilderController extends Controller
{
  ////////////////////
  // READ DATABASES //
  ////////////////////

  public function retrievingResult($type)
  {
    if($type == 'all'){
      $users = DB::table('users')->get();

      dd($users);
    }
    if($type == 'singleByValue'){
      $user = DB::table('users')->where('email', 'engkunazri98@gmail.com')->first();

      dd($user);
    }
    if($type == 'singleOnlyValue'){
      $user = DB::table('users')->where('email', 'engkunazri98@gmail.com')->value('email');

      dd($user);
    }
    if($type == 'singleById'){
      $user = DB::table('users')->find(3);

      dd($user);
    }
    if($type == 'columnValues'){
      $users = DB::table('users')->pluck('name', 'email');

      dd($users);
    }
  }

  public function chunkingResult()
  {
    DB::table('users')->orderBy('id')->chunk(100, function($users){
      foreach ($users as $user){
        // process the record
        DB::table('users')
          ->where('id', $user->id)
          ->update([
            'remember_token' => 'testing'
          ]);

        // stop the record
        return false;
      }
    });
  }

  public function mathValue($type)
  {
    if($type == 'count'){
      $users = DB::table('users')->count();

      dd($users);
    }
    if($type == 'max'){
      $users = DB::table('users')->max('id');

      dd($users);
    }
    if($type == 'average'){
      $users = DB::table('users')
        ->whereNotNull('name')
        ->avg('id');

      dd($users);
    }
    if($type == 'exist'){
      $users = DB::table('users')
        ->where('name', 'Engku Nazri Engku Nasir')
        ->exists();
        //->doesntExists();

      dd($users);
    }
  }

  public function select($type)
  {
    if($type == 'select'){
      $users = DB::table('users')->select('name', 'email as user_email')->get();

      dd($users);
    }

    if($type == 'distinct'){
      $users = DB::table('users')->select('name', 'email as user_email')->get();

      dd($users);
    }

  }

  public function rawExpression($type)
  {
    if($type == 'raw'){
      $users = DB::table('users')
        ->select(DB::raw('users.name, users.email'))->get();

      dd($users);
    }

    if($type == 'selectRaw'){
      $users = DB::table('users')
        ->selectRaw('users.name, users.email')->get();

      dd($users);
    }

    // whereRaw | orWhereRaw
    if($type == 'whereRaw'){
      $users = DB::table('users')
        ->whereRaw('users.name = "Engku Nazri Bin Engku Nasir"')->get();

      dd($users);
    }

    // havingRaw | orHavingRaw
    if($type == 'havingRaw'){
      $users = DB::table('users')
        ->selectRaw('users.name, users.email')
        ->havingRaw('user.email = "engkunazri98@gmail.com"')
        ->get();

      dd($users);
    }

    // orderByRaw | groupByRaw
    if($type == 'orderByRaw'){
      $users = DB::table('users')
        ->selectRaw('users.name, users.email')
        ->havingRaw('user.email = "engkunazri98@gmail.com"')
        ->orderByRaw('user.email DESC')
        ->get();

      dd($users);
    }

  }

  public function tableJoin($type)
  {
    // leftJoin | rightJoin
    if($type == 'leftJoin'){
      $users = DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->get();

      dd($users);
    }

    if($type == 'join'){
      $users = DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.user_id')
        ->get();

      dd($users);
    }

    if($type == 'crossJoin'){
      $users = DB::table('users')
        ->crossJoin('posts')
        ->get();

      dd($users);
    }
  }

  public function unionQuery()
  {
    $first = DB::table('users')
      ->whereNull('name');

    $users = DB::table('users')
      ->whereNotNull('name')
      ->union($first)
      ->get();

    dd($users);
  }

  public function whereClause($type)
  {
    if($type == 'simple'){
      $users = DB::table('users')
        ->where('email', '=', 'engkunazri98@gmail.com')->first();
        // ->where('email', 'engkunazri98@gmail.com')->first();

      dd($users);
    }

    if($type == 'array'){
      $users = DB::table('users')
        ->where([
          ['email', '=', 'engkunazri98@gmail.com'],
          ['name', '=', 'Engku Nazri'],
        ])
        ->first();

      dd($users);
    }

    if($type == 'orWhere'){
      $users = DB::table('users')
        ->orWhere('email', '=', 'engkunazri98@gmail.com')->first();

      dd($users);
    }

    // whereBetween | orWhereBetween | whereNotBetween | orWhereNotBetween
    if($type == 'whereBetween'){
      $users = DB::table('users')
        ->orWhere('votes', [90, 100])->get();

      dd($users);
    }

    // whereIn | whereNotIn | orWhereIn | orWhereNotIn
    if($type == 'whereIn'){
      $users = DB::table('users')
        ->whereIn('id', [1, 2, 3])
        ->get();

      dd($users);
    }

    // whereData | whereMonth | whereDay | whereYear | whereTime
    if($type == 'whereData'){
      $users = DB::table('users')
        ->whereDate('created_at', '2016-8-12')
        ->get();

      dd($users);
    }

    // whereColumn - to verify the two column (default = same value)
    if($type == 'whereColumn'){
      $users = DB::table('users')
        ->whereColumn('created_at', '>', 'updated_at')
        ->get();

      dd($users);
    }


    // JSON where clause
    if($type == 'JSONWhere'){
      $users = DB::table('users')
        ->whereColumn('options->language', 'en')
        ->get();

      dd($users);
    }
  }

  public function ordering($type)
  {
    if($type == 'orderBy'){
      $users = DB::table('users')
        ->orderBy('id', 'DESC')
        ->get();

      dd($users);
    }

    // latest | oldest
    if($type == 'latest'){
      $users = DB::table('users')
        ->orderBy('id', 'DESC')
        ->latest()
        // ->oldest()
        ->get();

      dd($users);
    }

    if($type == 'randomOrder'){
      $users = DB::table('users')
        ->inRandomOrder()->get();
    }

    if($type == 'reOrder'){
      $query = DB::table('users')->orderBy('name');

      $unorderedUsers = $query->reorder()->get();

      dd($unorderedUsers);
    }

    // groupBy | having
    if($type == 'groupBy'){
      $users = DB::table('users')
        ->orderBy('name')
        ->groupBy('class_no')
        ->having('grade', '>', 80)
        ->get();

      dd($users);
    }

    if($type == 'skip'){
      $users = DB::table('users')
        ->offset(10)
        ->limit(5)
        ->get();

      dd($users);
    }
  }

  public function condition()
  {
  }

  //////////////////////
  // CREATE DATABASES //
  //////////////////////

  public function insert($type)
  {
    if($type == 'insert'){
      DB::table('users')
        ->insert([
          'name' => 'Engku Nazri',
          'email' => 'engkunazri@example.com',
          'password' => Hash::make('password'),
        ]);
    }

    if($type == 'insertOrIgnore'){
      DB::table('users')
        ->insert([
          'name' => 'Engku Nazri',
          'email' => 'engkunazri@example.com',
          'password' => Hash::make('password'),
        ],
        [
          'name' => 'Engku Nazri',
          'email' => 'engkunazri@example.com',
          'password' => Hash::make('password'),
        ]
        );
    }

    // insert the value if not exist && update the value if exist
    if($type == 'upsert'){
      DB::table('flights')->upsert([
        ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
        ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
      ], ['departure', 'destination'], ['price']);
    }

    if($type == 'insertGetId'){
      $id = DB::table('users')
        ->insertGetId([
          'name' => 'Engku Nazri',
          'email' => 'engkunazri@example.com',
          'password' => Hash::make('password'),
        ]);
    }
  }

  //////////////////////
  // UPDATE DATABASES //
  //////////////////////
  public function update($type)
  {
    if($type == 'update'){
      $affected = DB::table('users')
        ->where('id', 1)
        ->update([
          'name' => 'New Name'
        ]);
    }

    if($type == 'updateOrInsert'){
      $affected = DB::table('users')
        ->where('id', 1)
        ->updateOrInsert([
          'name' => 'New Name'
        ]);
    }

    if($type == 'updateJSON'){
      $affected = DB::table('users')
        ->where('id', 1)
        ->update([
          'user->name' => 'New Name'
        ]);
    }
  }

  //////////////////////
  // DELETE DATABASES //
  //////////////////////
  public function delete()
  {
    $deleteWholeData = DB::table('users')->delete();
    
    $deleteParticularData = DB::table('users')->where('id', 2)->delete();

    $truncateTable = DB::table('users')->truncate();
  }
}
