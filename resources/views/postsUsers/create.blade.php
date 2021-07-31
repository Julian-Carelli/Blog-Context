@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="row justify-content-center">
        <div style="width:70%;" class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div style="width:70%;">
            <div class="col-sm-12 pt-3">
                <h2>Crear Post</h2>
            </div>
        </div>
        <form style="width:70%;" action="{{ route('postsUsers.store', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
            <div class="col-sm-12 pt-3">
                <label>Titulo del post</label>
                <input type="text" class="form-control" name="title" placeholder="Agregar un titulo"/>
            </div>
            <div class="col-sm-12 pt-3">
                <label>Categoria del post</label>
                <input type="text" name="category" list="categoryList">
                    <datalist id="categoryList">
                        @foreach ($categories as $category)
                            <option value="{{ucfirst($category->title)}}">
                        @endforeach
                    </datalist>
            </div>
            <div class="col-sm-12 pt-3">
                <label>Contenido del post</label>
                <textarea class="form-control" style="height:200px;" name="content" placeholder="Agregar contenido"></textarea>
            </div>
            <div class="col-sm-12 pt-3">
                <label>Imagen</label>
                <input type="file" name="image" class="form-control-file"/>
            </div>
            <div class="col-sm-12 pt-3">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-md-3">Crear Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
