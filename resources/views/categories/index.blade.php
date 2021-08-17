@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-full justify-center" style="background-color: #061648">
        <div class="xs:w-full sm:w-full md:w-full lg:w-3/4 xl:w-3/4 m-auto" style="padding-top:20px;">
            <div class="card mb-4" style="border: none;">
                <div class="card-body" style="background-color: #061648;">
                    <h2 class="cart-title xs:text-xl sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl" style="font-weight: 800; color:#fff;">
                        Hola {{ auth()->user()->name }}<br>
                        Porfavor selecciona los temas que son de tu interes
                    </h2>
                </div>
            </div>
        </div>
        <div class="xs:w-full sm:w-full md:w-full lg:w-3/4 xl:w-3/4 m-auto">
            <form action="{{ route('categoriesUsers.store', auth()->user()->id )}}" method="POST">
            @foreach($categories as $key => $category)
            <div class="card mb-4" style="border: none;background-color:#142864;">
                <div class="card-body">
                    <div class="card-presentation" style="display:flex;justify-content:center;">
                        <div class="card-category" style="width:50%; display:flex; justify-content:center;">
                            <h2 class="card-title xs:text-base sm:text-base md:text-base lg:text-xl xl:text-xl" style="font-weight: 800; margin-bottom:0px; color:#fff;">{{ ucfirst($category->title) }}</h2>
                        </div>
                        <div class="card-check" style="width:50%; display:flex; justify-content:center;align-items:center;">
                            <input type="checkbox" name="category_{{$key + 1}}" style="border-radius:100%;"/>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card mb-5">
                @method('POST')
                @csrf
                <button type="submit" style="font-weight:600; color:#fff; background-color: #1b3470;" class="btn btn-md-3 xs:text-base sm:text-base md:text-base lg:text-xl xl:text-xl">Seleccionar categorias</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
