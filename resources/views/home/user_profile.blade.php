
@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title","Hesap Ayarları")
@section("description"){{$setting->description}}@endsection

@section("keywords"){{$setting->keywords}}@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">

                @include("home._user_menu")

                <div class="col-sm-9 padding-right">
                    <h2 class="title text-center">Başlık </h2>
                   BU SAYFA HESAP AYARLARI İÇİNDİR

                </div>

            </div>
        </div>
    </section>

@endsection
