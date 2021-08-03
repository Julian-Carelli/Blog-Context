@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('status'))
    <div class="row justify-content-center">
        <div class="col-md-10 alert-success">
            <p style="margin-buttom:0px;">{{ session()->get('status') }}</p>
        </div>
    </div>
    @endif
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
                    <div class="card-presentation" style="display:flex;align-items:center;">
                        <div style="width:90%;">
                            <h2 class="card-title" style="font-size: 26px;font-weight: 800; margin-bottom:0px;">{{ $post->title }}</h2>
                        </div>
                        <div style="width:5%;text-align:right;">
                            <a href="{{route('posts.edit', $post)}}" style="color:black;">
                                <i style="font-size:26px;border-radius:25px;" class="fas fa-pen-square"></i>
                            </a>
                        </div>
                        <div style="width:5%;text-align:right;">
                            <button style="background-color: white; border:none;" data-toggle="modal" data-target="#myModalDelete{{ $post->id }}">
                                <i style="font-size:26px;" class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-category d-flex">
                        <span class="card-category__title" style="font-size: 18px;">{{ ucfirst($post->category->title) }} - {{ ucfirst($post->statusPost->name)}}</span>
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
            <div id="myModalDelete{{ $post->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h4 class="modal-title">{{ $post->title }}</h4>
                            </div>
                            <div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <p>¿Estas seguro que deseas eliminar este Post?</p>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                            </div>
                            <div>
                                <form action="{{route('posts.destroy', $post)}}" style="margin-bottom:0px;" method="POST" class="form-group">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md-3">Eliminar Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
