@php use Illuminate\Support\Facades\Storage; @endphp

@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title", $setting->title ?? '---')
@section("description")
    {{$setting->description ?? "---"}}
@endsection

@section("keywords")
    {{$setting->keywords ?? "---"}}
@endsection

@section("content")

    @include("home._slider")

    <section>
        <div class="container">
            <div class="row">

                @include("home._category")

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">GÜNÜN İLANLARI</h2>

                        @foreach($gunlukilanlar as $ilan)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{Storage::url($ilan->image)}}"
                                                 style="height: 249px;width: 100%; object-fit: cover; object-position: center;"
                                                 alt=""/>
                                            <span class="ilan-cinsi"
                                                  style="position: absolute; top: 0px; left: 0px; background: rgba(254,152,15,0.9); color: white; padding: 5px;">
        <strong>{{$ilan->kategori->title}}</strong>
    </span>
                                            <h2>{{ number_format($ilan->fiyati, 0, ',', '.') }} TL</h2>
                                            <p>{{$ilan->title}}</p>
                                            <p><strong><i class="fa fa-map-marker"></i> {{$ilan->city}}</strong>
                                                &nbsp;&nbsp;|&nbsp;&nbsp; <i
                                                    class="fa fa-arrows-alt"></i> {{$ilan->metrekare_toplam_alan}} m²
                                            </p>
                                            <a href="{{route("ilan",["id"=>$ilan->id,"slug"=>$ilan->slug])}}" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-search"></i>Detay</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach


                    </div><!--features_items-->

                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#daire" data-toggle="tab">Daire</a></li>
                                <li><a href="#mustakil-ev" data-toggle="tab">Müstakil Ev</a></li>
                                <li><a href="#arsa" data-toggle="tab">Arsa</a></li>
                                <li><a href="#isyeri" data-toggle="tab">İş Yeri</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="daire">

                                @foreach($daireler as $rs)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="image-container" style="position: relative;">
                                                        <img src="{{Storage::url($rs->image)}}"
                                                             style="height: 183px;width: 100%; object-fit: cover; object-position: center;"
                                                             alt=""/>
                                                        <span class="city-overlay"><strong><i class="fa fa-map-marker"></i> {{$rs->city}}</strong></span>
                                                    </div>
                                                    <h2>{{ number_format($rs->fiyati, 0, ',', '.') }} TL</h2>
                                                    <p>{{$rs->title}}</p>
                                                    <a href="{{route("ilan",["id"=>$rs->id,"slug"=>$rs->slug])}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-search"></i>İncele</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="mustakil-ev">
                                @foreach($mustakilevler as $rs)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="image-container" style="position: relative;">
                                                        <img src="{{Storage::url($rs->image)}}"
                                                             style="height: 183px;width: 100%; object-fit: cover; object-position: center;"
                                                             alt=""/>
                                                        <span class="city-overlay"><strong><i class="fa fa-map-marker"></i> {{$rs->city}}</strong></span>
                                                    </div>
                                                    <h2>{{ number_format($rs->fiyati, 0, ',', '.') }} TL</h2>
                                                    <p>{{$rs->title}}</p>
                                                    <a href="{{route("ilan",["id"=>$rs->id,"slug"=>$rs->slug])}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-search"></i>İncele</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="arsa">
                                @foreach($arsalar as $rs)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="image-container" style="position: relative;">
                                                        <img src="{{Storage::url($rs->image)}}"
                                                             style="height: 183px;width: 100%; object-fit: cover; object-position: center;"
                                                             alt=""/>
                                                        <span class="city-overlay"><strong><i class="fa fa-map-marker"></i> {{$rs->city}}</strong></span>
                                                    </div>
                                                    <h2>{{ number_format($rs->fiyati, 0, ',', '.') }} TL</h2>
                                                    <p>{{$rs->title}}</p>
                                                    <a href="{{route("ilan",["id"=>$rs->id,"slug"=>$rs->slug])}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-search"></i>İncele</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="isyeri">
                                @foreach($isyerleri as $rs)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <div class="image-container" style="position: relative;">
                                                        <img src="{{Storage::url($rs->image)}}"
                                                             style="height: 183px;width: 100%; object-fit: cover; object-position: center;"
                                                             alt=""/>
                                                        <span class="city-overlay">
                    <strong><i class="fa fa-map-marker"></i> {{$rs->city}}</strong>

                </span>
                                                    </div>
                                                    <span class="ilan-cinsi"
                                                          style="position: absolute; top: 0px; left: 0px; background: rgba(254,152,15,0.9); color: white; padding: 5px;">
        <strong>{{$rs->kategori->title}}</strong>
    </span>
                                                    <h2>{{ number_format($rs->fiyati, 0, ',', '.') }} TL</h2>
                                                    <p>{{$rs->title}}</p>
                                                    <a href="{{route("ilan",["id"=>$rs->id,"slug"=>$rs->slug])}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-search"></i>İncele</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Son eklenenler</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sonilanlaraltbolum->chunk(3) as $chunkIndex => $chunk)
                                    <div class="item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                        @foreach($chunk as $rs)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <div class="image-container" style="position: relative;">
                                                                <img src="{{Storage::url($rs->image)}}"
                                                                     style="height: 183px;width: 100%; object-fit: cover; object-position: center;"
                                                                     alt=""/>
                                                                <span class="city-overlay"><strong><i class="fa fa-map-marker"></i> {{$rs->city}}</strong></span>
                                                            </div>
                                                            <span class="ilan-cinsi"
                                                                  style="position: absolute; top: 0px; left: 0px; background: rgba(254,152,15,0.9); color: white; padding: 5px;"><strong>{{$rs->kategori->title}}</strong></span>
                                                            <h2>{{ number_format($rs->fiyati, 0, ',', '.') }} TL</h2>
                                                            <p>{{$rs->title}}</p>
                                                            <a href="{{route("ilan",["id"=>$rs->id,"slug"=>$rs->slug])}}" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-search"></i>İncele</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>

            </div>
        </div>
    </section>

@endsection
