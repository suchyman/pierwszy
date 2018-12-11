<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class History extends Controller
{
  protected function create()
  {
      return history::create([
          'id' => '',
          'date' => 'asd',
          'what' => 'sda'
      ]);


  }
}
