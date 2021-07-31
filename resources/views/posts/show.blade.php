@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="width:95%; padding-top:10px; padding-bottom:10px;">
            <div class="col-sm-12" style="padding: 10px 15px;">
                <h2 style="font-size:36px; font-weight:800;"> {{ $post->title }} </h2>
            </div>
            @if($post->image)
            <div class="col-sm-12" style="border-radius:5px;padding: 20px 15px;">
                <img src="{{ $post->get_image }}"class="card-img-top"/>
            @endif
            </div>
            <div class="col-sm-12" style="padding: 40px 15px;">
                <div class="content">
                    <p style="font-size:18px; line-height:35px;">{{ $post->content }}</p>
                </div>
                <div class="date-user">
                    <span> Creado por el usuario {{ $post->user->name }} en la fecha {{ $post->created_at->format('Y-m-d') }} </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
