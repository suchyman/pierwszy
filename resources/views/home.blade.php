@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Konto</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Zostałeś zalogowany!
                    <br>
                    <a class="btn btn-success btn-sm" href="{{ route('products.index') }}"> Wyświetl listę wpisów</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
