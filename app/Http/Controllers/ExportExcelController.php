<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class ExportExcelController extends Controller
{
    function index()
    {
      $products_data = DB::table('products')->get();
      return view('index')->with('products_data', $products_data);
    }
}
