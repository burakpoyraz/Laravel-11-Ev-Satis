
@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title","Hesap Ayarları")
@section("description"){{$setting->description??"---"}}@endsection

@section("keywords"){{$setting->keywords??"---"}}@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">

                @include("home._user_menu")

                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Hesabım</h2>
                        <div class="single-blog-post">
                           @include("profile.show")
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
