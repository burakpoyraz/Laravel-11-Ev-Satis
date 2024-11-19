@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title","Hesap Ayarları")
@section("description")
    {{$setting->description}}
@endsection

@section("keywords")
    {{$setting->keywords}}
@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">



                <div class="col-md-12">
                    <h2 class="title text-center">İletişim </h2>
                    <div class="col-md-6">

                        <h3 class="" >Poyraz Ltd. Şti. </h3>
                        {!! $setting->contact !!}
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center" >İletişim Formu</h3>

                    </div>


                </div>

            </div>
        </div>
    </section>

@endsection
