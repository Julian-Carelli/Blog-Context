@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="width:70%;">
            <div class="col-sm-12 pt-3">
                <h2> {{ $post->title }} </h2>
            </div>
            <div class="col-sm-12 pt-3">
                <p>{{ $post->content }}</p>
            </div>
            <div class="col-sm-12 pt-3">
                <span> Creado por el usuario {{ $post->user->name }} en la fecha {{ $post->created_at->format('Y-m-d') }} </span>
            </div>
        </div>
    </div>
</div>
@endsection
