
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



                <div class="col-sm-12">
                    <h2 class="title text-center">Hakkımızda </h2>
                   {!!$setting->aboutus??"Hakkkımızda bölümü henüz düzenlenmedi"  !!}
                </div>

            </div>
        </div>
    </section>

@endsection
