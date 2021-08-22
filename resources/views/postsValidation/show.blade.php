@extends('layouts.app')

@section('content')
<div class="flex-wrap xs:w-full sm:w-full md:w-full lg:w-3/5 xl:w-3/5 m-auto">
    <div class="flex items-center xs:px-3 sm:px-3 py-4" style="display: flex; justify-content:space-between;">
        <h2 class="xs:text-base sm:text-base md:text-base lg:text-lg xl:text-lg" style="font-weight:600;">Tus temas</h2>
        <ul class="category-navigation xs:w-1/2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2" style="display:flex; overflow-x:auto;align-items:center;">
            @foreach ($categories as $category)
                <li style="padding:15px px;width:500px;color:#1b3470;font-weight:600;margin:0px 20px;text-align:center; white-space:nowrap;">
                    <a href="{{route('categoryUser.index', $category->category)}}">
                        {{ucwords($category->category->title)}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="justify-content-center">
        <div class="xs:px-3 sm:px-3">
            @foreach($posts as $key => $post)
                @foreach($post as $item)
                <div class="card mb-4 p-3" style="{{ $key % 2 ? 'background-color:white;' : 'background-color:#253b8c;'}} border:none;">
                    <div class="py-3">
                        <p style="{{ $key % 2 ? 'color:black' : 'color:white;'}}" class="card-text xs:text-xs sm:text-sm mx:text-sm lg:text-sm xl:text-sm">
                            <span>{{ $item->user->name }}</span>
                            <span>{{ $item->created_at->format('d M Y') }}</span>
                        </p>
                        <div class="card-presentation">
                            <h2 class="card-title xs:text-xl sm:text-xl md:text-2xl lg:text-2xl xl:text-3xl" style="font-weight: 800; text-align:left; margin-bottom:0px;{{ $key % 2 ? 'color:black' : 'color:white;'}}"> {{ $item->title }} </h2>
                        </div>
                        <div class="card-category flex items-center">
                            <span class="card-category__title xs:text-lg sm:text-lg md:text-lg lg-text-lg xl:text-lg pr-3" style="{{ $key % 2 ? 'color:black' : 'color:white;'}}">{{ ucfirst($item->category->title) }}</span>
                            <a href="{{ route('posts.show', $item) }}" style="{{ $key % 2 ? 'color:black' : 'color:white;'}}" class="card-text xs:text-ñg sm:text-lg mx:text-lg lg:text-lg xl:text-lg">
                                Ver post completo
                            </a>
                        </div>
                        <p class="xs:leading-6 sm:leading-7 md:leading-7 lg:leading-7 xl:leading-7 xs:text-base sm:text-lg md:text-lg lg-text-base xl:text-base" style="padding:25px 0px;{{ $key % 2 ? 'color:black' : 'color:white;'}}">
                            {{ $item->get_content }}...
                        </p>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="justify-content-center">
        <div class="">
        </div>
    </div>
</div>
@endsection
