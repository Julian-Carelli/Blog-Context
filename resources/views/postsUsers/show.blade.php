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
                        <h2 class="card-title" style="font-size: 26px;font-weight: 800;">{{ $post->title }}</h2>
                    </div>
                    <div class="card-category">
                        <span class="card-category__title" style="font-size: 18px;">{{ ucfirst($post->category->title) }}  </span>
                    </div>
                    <div class="card-content">
                        <p class="card-text" style="font-size:18px;">{{ $post->get_content }}...</p>
                    </div>
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
