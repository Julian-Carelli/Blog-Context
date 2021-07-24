@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Posts creados por el usuario {{ $user->name }}  </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-presentation">
                        <h5 class="card-title"> {{ $post->title }} </h5>
                    </div>
                    <div class="card-category">
                        <span class="card-category__title">{{ $post->category->title }}  </span>
                    </div>
                    <p class="card-text">
                        {{ $post->get_content }}...
                    </p>
                    <a href="{{ route('posts.show', $post) }}" class="card-text">
                        Ver post completo
                    </a>
                    <p class="text-muted mb-0">
                        <span>{{ $post->user->name }}</span>
                        <span>{{ $post->created_at->format('d M Y') }}</span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
