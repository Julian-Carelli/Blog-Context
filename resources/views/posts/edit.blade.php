@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="width:70%;">
            <div class="col-sm-12 pt-3">
                <span>Numero del post: {{ $post->id }}</span>
            </div>
            <div class="col-sm-12 pt-3">
                <h2>Editar Post</h2>
                <span>Creado por el usuario {{ $post->user->name }} en la fecha {{ $post->created_at }}</span>
            </div>
        </div>
        <form style="width:70%;" action="{{ route('posts.update', $post->id )}}" method="POST">
            <div class="col-sm-12 pt-3">
                <label>Titulo del post</label>
                <input type="text" class="form-control" name="title" placeholder="Agregar un titulo" value="{{old('title', $post->title)}}"/>
            </div>
            <div class="col-sm-12 pt-3">
                <label>Contenido del post</label>
                <textarea class="form-control" style="height:200px;" name="content" placeholder="Agregar contenido">{{ old('content', $post->content) }}</textarea>
            </div>
            <div class="col-sm-12 pt-3">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary btn-md-3">Editar Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
