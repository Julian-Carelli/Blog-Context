@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pb-3">
            <div>
                <h2>
                    Solicitudes para revisar posts
                </h2>
            </div>
            <div>
                <span>Total de peticiones para revisar: {{ $totalPosts }} </span>
            </div>
        </div>
        <div class="col-md-8">

            @foreach($posts as $post)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="card-presentation">
                        <h5 class="card-title"> {{ $post->title }} </h5>
                    </div>
                    <div class="card-category">
                        <span class="card-category__title">{{ ucfirst($post->category->title) }}  </span>
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
            <div class="d-flex">
                <div class="pb-3 pt-3 pr-3">
                    <form action="{{ route('postsValidation.updateApprovedState', $post)}}" method="POST">
                    @method('PUT')
                    @csrf
                        <button class="btn btn-success">Aprobar post</button>
                    </form>
                </div>
                <div class="pb-3 pt-3">
                    <form action="{{ route('postsValidation.updateRejectedState', $post) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-danger">Rechazar post</button>
                    </form>
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
