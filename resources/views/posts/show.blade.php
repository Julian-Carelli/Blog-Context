@extends('layouts.app')

@section('content')
<div class="">
    <div class="flex justify-center">
        <div class="flex flex-wrap xs:w-11/12 md:w-4/5 lg:w-4/5 xl:w-3/5 py-1">
            @if($post->image)
            <div class="w-full py-3 px-2" style="border-radius:5px;">
                <img class="w-full" src="{{ env('APP_ENV') == 'local' ? $post->get_image : $post->image }}"/>
            </div>
            @endif
            <div class="w-full py-3 px-2">
                <h2 class="xs:text-3xl sm:text-3xl md:text-3xl lg:text-3xl xl:text-5xl" style="font-weight:800;color: #253b8c;"> {{ $post->title }} </h2>
            </div>
            <div class="w-full py-4 px-2">
                <div class="content">
                    <p class="xs:leading-6 sm:leading-7 md:leading-8 lg:leading-8 xl:leading-9 xs:text-md sm:text-lg md:text-lg lg-text-lg xl:text-lg">{{ $post->content }}</p>
                </div>
                <div class="date-user pt-3">
                    <span style="font-weight:800;color: #253b8c;" class="xs:text-xs sm:text-sm mx:text-md lg:text-md xl:text-lg"> Creado por el usuario {{ $post->user->name }} en la fecha {{ $post->created_at->format('Y-m-d') }} </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
