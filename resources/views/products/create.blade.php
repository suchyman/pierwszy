@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodaj nowy</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Wróć do listy</a>
            </div>
        </div>
    </div>


<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Dodaj nowy</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Wróć</a>
        </div>
    </div>
</div> -->

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ojojj..</strong> Coś źle uzupełniłeś.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

     <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Data:</strong>
               <input type="date" name="date" class="form-control" placeholder="Name">
           </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
       <select name="name" class="form-control">
            <option value="Cerber2" selected> Cerber2 </option>
            <option value="SPL"> SPL </option>
            <option value="Nvision"> Nvision </option>
            <option value="SPL"> Qmatic </option>
      </select>
    </div>

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nazwa:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Opis zmian"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>
    </div>

</form>
@endsection
