@extends('layouts.app')

@section('content')
<div class="h-screen xs:pt-3 sm:pt-3 md:pt-0">
    @if($errors->any())
    <div class="justify-content-center">
        <div style="width:70%;" class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
    @endif
    <div class="flex lg:justify-center xl:justify-center" style="height:100%;">
        <div class="xs:hidden sm:hidden md:flex lg:flex xl:flex md:w-1/2 lg:w-1/2 xl:w-1/2">
            <img style="height:100%;object-fit:fill;" src="https://res.cloudinary.com/dhcftzbv3/image/upload/v1629087241/sky_kaa6mi.jpg" width="100%"/>
        </div>
        <div class="xs:w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 flex xs:justify-start sm:justify-start lg:justify-center xl:justify-center flex-col">
            <div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <h2 class="xs:text-xl sm:text-xl md:text-2xl lg:text-3xl xl:text-5xl" style="color:#253b8c; font-weight:600;">Editar Post</h2>
                    <span class="xs:text-base sm:text-base md:text-base lg:text-lg xl:text-lg" style="color:#253b8c;">Creado por el usuario {{ $post->user->name }} en la fecha {{ $post->created_at }}</span>
                </div>
            </div>
            <form action="{{ route('posts.update', $post->id )}}" method="POST" enctype="multipart/form-data">
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Titulo del post</label>
                    <input type="text" class="form-control" style="border:none;border-bottom:1px solid lightgray;" name="title" placeholder="Agregar un titulo" value="{{old('title', $post->title)}}"/>
                </div>
                <div class="col-sm-12 pt-3 flex flex-col" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Categoria del post</label>
                    <input type="text" name="category" style="border:none;border-bottom:1px solid lightgray;" value="{{old('category', ucfirst($post->category->title))}}" list="categoryList">
                    <datalist id="categoryList">
                        @foreach ($categories as $category)
                            <option value="{{ucfirst($category->title)}}">
                        @endforeach
                    </datalist>
                </div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600">Contenido del post</label>
                    <textarea class="form-control" style="height:200px;width:100%;" name="content" placeholder="Agregar contenido">{{ old('content', $post->content) }}</textarea>
                </div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Imagen</label>
                    <input type="file" name="image" class="form-control-file"/>
                </div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    @csrf
                    @method('PUT')
                    <button type="submit" style="background-color: #253b8c" class="btn btn-primary btn-md-3">Editar Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
