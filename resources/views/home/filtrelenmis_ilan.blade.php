@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings();

@endphp

@section("title", "Öne Çıkan İlanlar")
@section("description")
    {{$setting->description??"---"}}
@endsection

@section("keywords")
    {{$setting->keywords??"---"}}
@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">

                @include("home._category")

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">FİLTRELENMİŞ İLANLAR</h2>

                        @foreach($ilanlar as $ilan)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($ilan->image)}}"
                                                 style="height: 249px;width: 100%; object-fit: cover; object-position: center;"
                                                 alt=""/>
                                            <h2>{{ number_format($ilan->fiyati, 0, ',', '.') }} TL</h2>
                                            <p>{{$ilan->title}}</p>
                                            <p><strong>{{$ilan->city}}</strong>
                                                &nbsp;&nbsp;|&nbsp;&nbsp; {{$ilan->metrekare_toplam_alan}} m²</p>
                                            <a href="{{route("ilan",["id"=>$ilan->id,"slug"=>$ilan->slug])}}"
                                               class="btn btn-default add-to-cart"><i
                                                    class="fa fa-search"></i>Detay</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach
                    </div>

                    <div class="pagination-container text-center">
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
