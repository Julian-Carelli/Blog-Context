@extends('layouts.app')

@section('content')
<div class="lg:w-4/5 lg:m-auto" style="height: 100%;">
    @if(session()->has('status'))
    <div class="row justify-content-center">
        <div class="col-md-10 alert-success">
            <p style="margin-buttom:0px;">{{ session()->get('status') }}</p>
        </div>
    </div>
    @endif
    <div class="flex justify-center py-3">
        <div class="flex flex-wrap xs:w-11/12 md:w-4/5 lg:w-3/4 xl:w-3/4 py-2">
            @foreach($posts as $key => $post)
            <div style="{{ $key % 2 ? 'background-color:white;' : 'background-color:#253b8c;'}} border:none;" class="card mb-4">
                <div class="card-body">
                    <div class="card-presentation xs:flex-col lg:flex-row-reverse xl:flex-row-reverse xs:item-start lg:item-center xl:item-center" style="display:flex;">
                        <div class="xs:flex lg:flex xl:flex xs:py-3 lg:py-0 xl:py-0 ">
                            <div class="xs:pr-2" style="text-align:right;">
                                <a href="{{route('posts.edit', $post)}}" style="color:black;">
                                    <i style="border-radius:25px;{{ $key % 2 ? 'color:black' : 'color:white;'}}" class="fas fa-pen-square xs:text-lg sm:text-lg md:text-lg lg-text-2xl xl:text-2xl"></i>
                                </a>
                            </div>
                            <div class="xs:pl-2" style="text-align:right;">
                                <button style="border:none;" data-toggle="modal" data-target="#myModalDelete{{ $post->id }}">
                                    <i style="{{ $key % 2 ? 'color:black' : 'color:white;'}}" class="fas fa-trash xs:text-lg sm:text-lg md:text-lg lg-text-2xl xl:text-2xl"></i>
                                </button>
                            </div>
                        </div>
                        <div class="w-full">
                            <h2 class="card-title xs:text-xl sm:text-xl md:text-2xl lg:text-2xl xl:text-3xl" style="font-weight: 800; text-align:left; margin-bottom:0px;{{ $key % 2 ? 'color:black' : 'color:white;'}}">{{ $post->title }}</h2>
                        </div>

                    </div>
                    <div class="card-category d-flex">
                        <span class="card-category__title xs:text-lg sm:text-lg md:text-lg lg-text-lg xl:text-lg" style="{{ $key % 2 ? 'color:black' : 'color:white;'}}">{{ ucfirst($post->category->title) }} - {{ ucfirst($post->statusPost->name)}}</span>
                    </div>
                    <div class="card-content">
                        <p class="xs:leading-6 sm:leading-7 md:leading-7 lg:leading-7 xl:leading-7 xs:text-base sm:text-lg md:text-lg lg-text-base xl:text-base" style="padding:25px 0px;{{ $key % 2 ? 'color:black' : 'color:white;'}}">{{ $post->get_content }}...</p>
                    </div>
                    <a href="{{ route('posts.show', $post) }}" style="{{ $key % 2 ? 'color:black' : 'color:white;'}}" class="card-text xs:text-xs sm:text-sm mx:text-base lg:text-base xl:text-base">
                        Ver post completo
                    </a>
                    <p class="text-muted mb-0">
                        <span class="xs:text-xs sm:text-sm mx:text-base lg:text-base xl:text-base" style="{{ $key % 2 ? 'color:black' : 'color:white;'}}">{{ $post->user->name }}</span>
                        <span class="xs:text-xs sm:text-sm mx:text-base lg:text-base xl:text-base" style="{{ $key % 2 ? 'color:black' : 'color:white;'}}">{{ $post->created_at->format('d M Y') }}</span>
                    </p>
                </div>
            </div>
            <div id="myModalDelete{{ $post->id }}" class="modal fade" style="width:100%;" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h4 class="modal-title xl:text-lg" style="color: #253b8c; font-weight:800;">{{ $post->title }}</h4>
                            </div>
                            <div>
                                <button type="button" style="color: #2ea8db;" class="close xl:text-2xl" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <p style="color: #253b8c;">¿Estas seguro que deseas eliminar este Post?</p>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="button" style="background-color: #2ea8db; color:white;" class="btn" data-dismiss="modal">Cancelar</button>
                            </div>
                            <div>
                                <form action="{{route('posts.destroy', $post)}}" style="margin-bottom:0px;" method="POST" class="form-group">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #061863; color:white;" class="btn btn-md-3">Eliminar Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="xs:w-11/12 md:w-4/5 lg:w-3/4 xl:w-3/4 py-2 m-auto">
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
