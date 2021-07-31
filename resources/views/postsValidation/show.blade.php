@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach($posts as $post)
                @foreach($post as $item)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-presentation">
                            <h2 class="card-title" style="font-size: 26px;font-weight: 800;"> {{ $item->title }} </h2>
                        </div>
                        <div class="card-category">
                            <span class="card-category__title" style="font-size: 18px;">{{ ucfirst($item->category->title) }}</span>
                        </div>
                        <p class="card-text" style="font-size:18px;">
                            {{ $item->get_content }}...
                        </p>
                        <a href="{{ route('posts.show', $item) }}" class="card-text">
                            Ver post completo
                        </a>
                        <p class="text-muted mb-0">
                            <span>{{ $item->user->name }}</span>
                            <span>{{ $item->created_at->format('d M Y') }}</span>
                        </p>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</div>
@endsection
