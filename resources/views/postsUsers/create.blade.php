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
            <img style="height:100%;object-fit:fill;" src="https://res.cloudinary.com/dhcftzbv3/image/upload/v1629087240/mountain_benbn7.jpg" width="100%"/>
        </div>
        <div class="xs:w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 flex xs:justify-start sm:justify-start lg:justify-center xl:justify-center flex-col">
            <div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <h2 class="xs:text-xl sm:text-xl md:text-2xl lg:text-3xl xl:text-5xl" style="color:#253b8c; font-weight:600;">Crear Post</h2>
                    <p class="xs:text-base sm:text-base md:text-base lg:text-lg xl:text-lg" style="color:#253b8c;">Crea tu propio post para mostrar en el blog</p>
                </div>
            </div>
            <form  action="{{ route('postsUsers.store', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Titulo del post</label>
                    <input style="border:none;border-bottom:1px solid lightgray;" type="text" class="form-control" name="title" placeholder="Agregar un titulo"/>
                </div>
                <div class="col-sm-12 pt-3" style="display: flex; flex-direction:column;padding:10px 15p;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Categoria del post</label>
                    <input style="border:none;border-bottom:1px solid lightgray;" type="text" name="category" list="categoryList">
                        <datalist id="categoryList">
                            @foreach ($categories as $category)
                                <option value="{{ucfirst($category->title)}}">
                            @endforeach
                        </datalist>
                </div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Contenido del post</label>
                    <textarea class="form-control" style="height:200px;min-height:200px;max-height:200px;" name="content" placeholder="Agregar contenido"></textarea>
                </div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    <label class="xs:text-sm sm:text-sm md:text-sm lg:text-base xl:text-base" style="color:#253b8c; font-weight:600;">Imagen</label>
                    <input type="file" name="image" class="form-control-file xs:width-1/2 sm:width-1/2 md:width-1/2 lg:width-1/2 xl:width-1/2"/>
                </div>
                <div class="col-sm-12 pt-3" style="padding:10px 15px;">
                    @method('POST')
                    @csrf
                    <button type="submit" style="background-color:#253b8c;" class="btn btn-primary btn-md-3 xs:width-1/2 sm:width-1/2 md:width-1/2 lg:width-1/2 xl:width-1/2">Crear Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
