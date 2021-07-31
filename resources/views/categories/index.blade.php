@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="cart-title" style="font-size: 26px;font-weight: 800;">
                        Hola {{ auth()->user()->name }}<br>
                        Porfavor selecciona los temas que son de tu interes
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <form action="{{ route('categories.store', auth()->user()->id )}}" method="POST">
            @foreach($categories as $key => $category)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-presentation" style="display:flex;justify-content:center;">
                        <div class="card-category" style="width:50%; display:flex; justify-content:center;">
                            <h2 class="card-title" style="font-size: 26px;font-weight: 800; margin-bottom:0px;">{{ ucfirst($category->title) }}</h2>
                        </div>
                        <div class="card-check" style="width:50%; display:flex; justify-content:center;align-items:center;">
                            <input class="card-input" type="checkbox" name="category_{{$key + 1}}" style="border-radius:100%;"/>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card mb-4">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-md-3">Seleccionar categorias</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
