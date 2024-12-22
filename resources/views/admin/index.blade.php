@extends("layouts.admin")

@section("title","Admin Paneli")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">GENEL İSTATİSTİKLER</h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('adminemlaks')}}">
                <div class="main-box ilan-box">

                    <div class="icon-container ilan-icon">
                        <i class="fa fa-home fa-5x"></i>
                    </div>
                    <h5 class="ilan-title">İLANLAR</h5>

                    <ul class="stats-list ilan-stats">
                        <li>
                            <strong>Onaylanan İlan Sayısı:</strong> <span
                                class="ilan-approved">{{$data["ilanlar"]["onaylananilansayisi"]}}</span>
                        </li>
                        <li>
                            <strong>Onay Bekleyen İlan Sayısı:</strong> <span
                                class="ilan-pending">{{$data["ilanlar"]["onaybekleyenilansayisi"]}}</span>
                        </li>
                    </ul>

                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('adminusers')}}">
                <div class="main-box ilan-box">

                    <div class="icon-container ilan-icon">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <h5 class="ilan-title">Kullanıcılar</h5>

                    <ul class="stats-list ilan-stats">
                        <li>
                            <strong>Toplam Kullanıcı Sayısı:</strong> <span
                                class="ilan-approved">{{$data["users"]["toplamkullanicisayisi"]}}</span>
                        </li>
                    </ul>

                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('adminmessages')}}">
                <div class="main-box ilan-box">

                    <div class="icon-container ilan-icon">
                        <i class="fa fa-envelope fa-5x"></i>
                    </div>
                    <h5 class="ilan-title">MESAJ KUTUSU</h5>

                    <ul class="stats-list ilan-stats">
                        <li>
                            <strong>Okunan Mesaj Sayısı:</strong> <span
                                class="ilan-approved">{{$data["messages"]["okunanmesajsayisi"]}}</span>
                        </li>
                        <li>
                            <strong>Okunmayan Mesaj Sayısı:</strong> <span
                                class="ilan-pending">{{$data["messages"]["okunmayanmesajsayisi"]}}</span>
                        </li>
                    </ul>

                </div>
            </a>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-6">

            <div class="main-box recent-box shadow rounded bg-light p-3">
                <h5 class="recent-title text-primary">Son Eklenen İlanlar</h5>
                <ul class="recent-list list-unstyled">
                    @foreach($data["ilanlar"]["soneklenenilanlar"] as $ilan)
                        <li><a style="color: #555" href="{{route("ilan",["id"=>$ilan->id,"slug"=>$ilan->slug])}}">
                                <strong class="text-dark">{{$ilan->kategori->title}}, {{$ilan->city}}:</strong> <span
                                    class="text-muted">{{$ilan->metrekare_toplam_alan}}m², {{ number_format($ilan->fiyati, 0, ',', '.') }} TL</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-md-6">
            <div class="main-box recent-box shadow rounded bg-light p-3">
                <h5 class="recent-title text-primary">Son Eklenen Kullanıcılar</h5>
                <ul class="recent-list list-unstyled">
                    @foreach($data["users"]["soneklenenkullanicilar"] as $kullanici)
                        <li><strong class="text-dark">{{$kullanici->name}}:</strong> <span
                                class="text-muted">{{ \Carbon\Carbon::parse($kullanici->created_at)->format('d.m.Y  |  H:i')}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
