@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title","Hesap Ayarları")
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

                @include("home._user_menu")

                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Cevap Verilen/Verilecek Sorular</h2>
                        <div class="single-blog-post">
                            @if (session()->has("message"))
                                <div class="alert alert-danger">
                                    {{session("message")}}
                                </div>
                            @endif
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Emlak</th>
                                    <th>Konu</th>
                                    <th>Soru</th>
                                    <th>IP Adresi</th>
                                    <th>Durum</th>
                                    <th>Cevap</th>
                                    <th>Cevaplanma Zamanı</th>
                                    <th>Oluşturulma Tarihi</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cevapverileceksorular as $soru)
                                    <tr>
                                        <td>{{ $soru->id }}</td>
                                        <td>
                                            <a href="{{route("ilan",["id"=>$soru->emlak->id, "slug"=>$soru->emlak->slug])}}"> {{ $soru->emlak->title }}</a>
                                        </td>
                                        <td>{{ $soru->subject }}</td>
                                        <td>{{ $soru->question }}</td>
                                        <td>{{ $soru->ip }}</td>
                                        <td>{{ $soru->status }}</td>
                                        <td>{{ $soru->answer ?? 'Henüz cevaplandırılmadı' }}</td>
                                        <td>{{ $soru->answered_at ?? 'Cevap yok' }}</td>
                                        <td>{{ $soru->created_at->format('d.m.Y H:i')}}</td>
                                        <td>
                                            <a href="{{route("homeemlakedit",["id"=>$rs->id])}}"
                                               class="btn btn-sm btn-info"> <i class="fa fa-pencil"
                                                                               aria-hidden="true"></i></a>
                                            <a
                                                href="{{route("deletequestion",["id"=>$soru->id])}}"
                                                style="margin-left: 25px" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bu soruyu silmek istediğinize emin misiniz?')"><span class="glyphicon glyphicon-trash"></span> Sil</a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
