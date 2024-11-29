@php use Illuminate\Support\Facades\Storage; @endphp

@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title",$emlak->title)
@section("description")
    {{$emlak->title}}
@endsection

@section("keywords")
    {{$emlak->title}}
@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img id="mainImage" src="{{Storage::url($resimler->first())}}"
                                     style="width:266px; height: 381px; object-fit: cover;" alt=""/>

                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                    @foreach($resimler->chunk(3) as $index=>$datalist)
                                        <div class="item {{$index==0?"active":""}}">
                                            @foreach($datalist as $resim)
                                                <a href="javascript:void(0);" class="thumbnail-image"
                                                   onclick="changeImage('{{ Storage::url($resim) }}')"><img
                                                        src="{{Storage::url($resim)}}"
                                                        style="width: 85px; height: 84px; object-fit: cover;"
                                                        alt=""></a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                                <h2>{{$emlak->title}}</h2>


                                <span>
									<span>{{ number_format($emlak->fiyati, 0, ',', '.') }} TL</span>
								</span>

                                <span class="address"><i class="fa fa-map-marker"></i> {{$emlak->city}}</span>
                                <span class="addressinfo">{{$emlak->address}}</span>
                                <table class="info-table">
                                    <tr>
                                        <td><strong>İlan No</strong></td>
                                        <td>{{ str_pad($emlak->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>İlan Tarihi</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($emlak->created_at)->format('d.m.Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Emlak Tipi</strong></td>
                                        <td>Satılık {{$emlak->kategori->title}}</td>
                                    </tr>

                                    @switch($cins)
                                        @case("KONUT_ISYERI")
                                            <tr>
                                                <td><strong>Oda Sayısı</strong></td>
                                                <td>{{$ozellik->oda_sayisi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Binanın Kat Sayısı</strong></td>
                                                <td>{{$ozellik->binanin_kat_sayisi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bulunduğu Kat</strong></td>
                                                <td>{{$ozellik->bulundugu_kat}}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Binanın Yaşı</strong></td>
                                                <td>{{$ozellik->binanin_yasi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Isınma Tipi</strong></td>
                                                <td>{{$ozellik->isinma_tipi}}</td>
                                            </tr>
                                            @break
                                        @case("ARSA")
                                            <tr>
                                                <td><strong>Ada</strong></td>
                                                <td>{{$ozellik->ada}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Parsel</strong></td>
                                                <td>{{$ozellik->parsel}}</td>
                                            </tr>
                                            @break
                                        @case("TURISTIK_TESIS")
                                            <tr>
                                                <td><strong>Kapalı Alan Metrekare</strong></td>
                                                <td>{{$ozellik->kapali_alan_metrekare}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Açık Alan Metrekare</strong></td>
                                                <td>{{$ozellik->acik_alan_metrekare}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Oda Sayısı</strong></td>
                                                <td>{{$ozellik->oda_sayisi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Binanın Kat Sayısı</strong></td>
                                                <td>{{$ozellik->binanin_kat_sayisi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Binanın Yaşı</strong></td>
                                                <td>{{$ozellik->binanin_yasi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Yatak Sayısı</strong></td>
                                                <td>{{$ozellik->yatak_sayisi}}</td>
                                            </tr>
                                            @break
                                        @default
                                            <p>Ürün türü belirtilmemiş.</p>
                                    @endswitch

                                    <tr>
                                        <td><strong>Metrekare</strong></td>
                                        <td>{{$emlak->metrekare_toplam_alan}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Krediye Uygunluk</strong></td>
                                        <td>{{$emlak->krediye_uygunluk}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tapu Durumu</strong></td>
                                        <td>{{$emlak->tapu_durumu}}</td>
                                    </tr>

                                </table>


                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->


                </div>
                <div class="col-sm-3 padding-right">
                    <div class="product-information">
                        SATICI İLETİŞİM Bilgileri Bu alanda Yer alacak
                    </div>


                </div>


            </div>
            <div class="row">
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Detay</a></li>
                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                            <li><a href="#reviews" data-toggle="tab">Soru Sor ({{$sorucevaplar->count()}})</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" style="padding: 20px 25px;">
                            {!!$emlak->detail !!}
                        </div>

                        <div class="tab-pane fade" id="companyprofile">
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery1.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery3.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery2.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery4.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tag">
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery1.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery2.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery3.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery4.jpg" alt=""/>
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews">
                            <div class="col-sm-7 message-area">
                                <div class="card message-container">
                                    <div class="card-header bg-primary text-white">
                                        @if($sorucevaplar->count()>0)
                                        <h4 class="mb-0">
                                            <i class="fa fa-comments"></i> Soru Geçmişi
                                        </h4>
                                        @else
                                            <div class="alert alert-warning">
                                                <p>Henüz Hiç Soru Yok</a>.</p>
                                            </div>

                                        @endif
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="message-list" style="max-height: 500px; overflow-y: auto;">
                                            <!-- Kullanıcı Mesajı -->
                                            @foreach($sorucevaplar as $rs)
                                            <div class="message-item user-message border-bottom p-3">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="message-sender fw-bold">
                                                        <i class="fa fa-user"></i> <i class="fa fa-user-circle text-primary me-2"></i>{{$rs->user->name}}
                                                    </div>
                                                        <small class="text-muted">
                                                            <i class="fa fa-clock-o me-1"></i> {{ $rs->created_at->format('H:i') }}
                                                            <i class="fa fa-calendar-o ms-2 me-1"></i> {{ $rs->created_at->locale('tr')->translatedFormat('d F Y') }}
                                                        </small>
                                                </div>
                                                <div class="message-bubble user-bubble">
                                                    <p><b> {{$rs->subject}}</b></p>
                                                    <p class="message-text mb-0">
                                                        {{$rs->question}}
                                                    </p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                @auth
                                    <ul>
                                        <li><a href=""><i
                                                    class="fa fa-user"></i>{{\Illuminate\Support\Facades\Auth::user()->name}}
                                            </a></li>
                                        <li><a href=""><i
                                                    class="fa fa-clock-o"></i>{{ now('Europe/Istanbul')->format('H:i') }}
                                            </a></li>
                                        <li><a href=""><i
                                                    class="fa fa-calendar-o"></i>{{ now()->locale('tr')->translatedFormat('d F Y') }}
                                            </a></li>
                                    </ul>
                                    <p><b>"İlan sahibiyle iletişime geçin!"</b></p>
                                    <p>
                                        Merak ettiğiniz tüm detayları ilan sahibine kolayca sorabilirsiniz. Gayrimenkul
                                        hakkında daha fazla bilgi almak için aşağıdaki alanı kullanarak mesajınızı
                                        iletin. ilan sahibi sizinle en kısa sürede iletişime geçecektir.</p>
                                    <p><b>Dikkat:</b> Gönderdiğiniz mesaj, bilgi amaçlı olarak bu sayfada
                                        yayınlanacaktır.
                                        Bu
                                        nedenle özel ya da kişisel bilgiler içermemeye özen gösteriniz.</p>

                                    @livewire('review',['id'=>$emlak->id])
                                @else

                                    <div class="alert alert-warning">
                                        <p>Soru sorabilmek için lütfen <a href="{{ route('login') }}">giriş yapın</a>
                                            veya <a href="{{ route('register') }}">kayıt olun</a>.</p>
                                    </div>
                                @endauth
                            </div>

                        </div>

                    </div>
                </div><!--/category-tab-->
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    </section>

@endsection
@section("footer_js")
    <script>
        function changeImage(imageUrl) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = imageUrl;
        }
    </script>
@endsection
