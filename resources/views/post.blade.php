@extends('layout')

@section('content')
    <h1>My first post</h1>

    <p>Lorem ipsum dolor sit amet</p>
    <br>

@endsection
DB::insert('insert into history (id, date, what) values (?, ?, "sda"));
