<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($slider as $key => $emlak )
                        <li data-target="#slider-carousel" data-slide-to="{{$key}}" class="{{$key==0?"active":""}}"></li>
                        @endforeach

                    </ol>

                    <div class="carousel-inner">
                        @foreach($slider as $key => $emlak)
                        <div class="item {{$key==0?"active":""}}">
                            <div class="col-sm-6">
                                <h1>{{$emlak->kategori->title}}</h1>
                                <h4>{{$emlak->city}}  &nbsp;&nbsp;|&nbsp;&nbsp;  {{$emlak->metrekare_toplam_alan}} m² &nbsp;&nbsp;|&nbsp;&nbsp; {{ number_format($emlak->fiyati, 0, ',', '.') }} TL</h4>
                                <p>{{$emlak->title}}</p>
                                <a href="{{route("ilan",["id"=>$emlak->id,"slug"=>$emlak->slug])}}" type="button" class="btn btn-default get">İncele</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($emlak->image)}}" style="height: 441px" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
