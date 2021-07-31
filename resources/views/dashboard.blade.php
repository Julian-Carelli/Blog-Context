@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-start">
                    <div>
                        {{ __('Dashboard') }}
                    </div>
                    <div class="pl-3">
                        <a href="{{ route('postsValidation.show') }}">Ir al blog</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Titulo</th>
                                <th>Fecha de creacion</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>

                                <td>
                                    <a href="{{route('posts.show', $post->id)}}">{{ $post->id }}</a>
                                </td>
                                <td>
                                    <a href="{{route('postsValidation.index', $post->user_id)}}">
                                        {{ $post->user->name }}
                                    </a>
                                </td>
                                <td>{{ ucfirst($post->category->title) }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-primary btn-md-3">
                                            <a style="color:white;" href="{{route('posts.edit', $post->id)}}">Editar</a>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="POST" class="form-group">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-md-3">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
