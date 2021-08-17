@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-full h-screen flex justify-center items-center flex-col">
        <div class="w-full">
            <h2 class="xs:text-5xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-9xl font-extrabold" style="text-align: center;">Blog Conte<span class="xs:text-5xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-9xl font-extrabold" style="color:#253b8c;">xt</span></h2>
        </div>
        <div class="w-full xs:flex-col sm:flex-col md:flex-row lg:flex-row xl:flex-row flex justify-center " style="padding-top:45px;">
            <div class="xs:p-5 sm:p-5 lg:pr-5 xl:pr-5 md:w-1/2 lg:w-1/4 xl:w-1/4">
                <button class="btn xs:text-md sm:text-md md:text-xl lg:text-3xl xl:text-3xl w-full font-semibold" style="background-color: #949fc9;padding:15px;color:#fff;">
                    <a href="{{route('login')}}">Iniciar sesion</a>
                </button>
            </div>
            <div class="xs:p-5 sm:p-5 lg:pl-5 xl:pl-5 md:w-1/2 lg:w-1/4 xl:w-1/4">
                <button class="btn xs:text-md sm:text-md md:text-xl lg:text-3xl xl:text-3xl w-full font-semibold" style="background-color: #253b8c;padding:15px;color:white;">
                    <a href="{{route('register')}}">Crear cuenta</a>
                </button>
            </div>
        </div>
        <div class="w-full flex justify-center xs:top-8 sm:top-8 lg:top-1/4 xl:top-1/4 relative">
            <a class="content__link" style="padding-right:15px;" target="blank" href="https://www.instagram.com/juli.carelli_/"><i class="content__icon fab fa-instagram xs:text-4xl sm:text-4xl md:text-4xl lg:text-5xl xl:text-5xl" aria-hidden="true"></i></a>
            <a class="content__link" style="padding:0px 10px;" target="blank" href="https://github.com/Julian-Carelli"><i class="content__icon fab fa-github xs:text-4xl sm:text-4xl md:text-4xl lg:text-5xl xl:text-5xl" aria-hidden="true"></i></a>
            <a class="content__link" style="padding-left:15px;" target="blank" href="https://www.linkedin.com/in/julian-carelli/"><i class="content__icon fab fa-linkedin xs:text-4xl sm:text-4xl md:text-4xl lg:text-5xl xl:text-5xl" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
@endsection
