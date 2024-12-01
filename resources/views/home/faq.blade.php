
@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title","SSS - " . $setting->title )
@section("description"){{$setting->description}}@endsection

@section("keywords"){{$setting->keywords}}@endsection

@section("header_js")

    <link rel="stylesheet" href="{{asset("assets")}}/css/jquery.ui.accordion.css">
@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">



                <div class="col-sm-12">
                    <h2 class="title text-center">SIKÇA SORULAN SORULAR </h2>

                    <div id="accordion">
                        @foreach($datalist as $rs)
                        <h3><i class="fa fa-bars"></i> {{$rs->question}}</h3>
                        <div>
                            {!!$rs->answer!!}
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.jQuery) {
                (function($) {
                    $(function() {
                        $("#accordion").accordion({
                            heightStyle: "content",
                            active: false,
                            collapsible: true
                        });
                    });
                })(jQuery);
            } else {
                console.error('jQuery is not loaded');
            }
        });
    </script>
@endsection
