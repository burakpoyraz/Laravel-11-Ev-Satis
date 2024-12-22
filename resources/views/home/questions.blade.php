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
                        <h2 class="title text-center">Sorularım</h2>
                        <div class="single-blog-post">
                            @if (session()->has("message"))
                                <div class="alert alert-danger">
                                    {{session("message")}}
                                </div>
                            @endif

                            @if(!empty($sorucevaplar) && $sorucevaplar->count() > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                    <tr>

                                        <th>Emlak</th>
                                        <th>Konu</th>
                                        <th>Soru</th>


                                        <th>Cevap</th>
                                        <th>Cevaplanma Zamanı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Durum</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sorucevaplar as $soru)
                                        <tr>

                                            <td>
                                                <a href="{{route("ilan",["id"=>$soru->emlak->id, "slug"=>$soru->emlak->slug])}}"> {{ $soru->emlak->title }}</a>
                                            </td>
                                            <td>{{ $soru->subject }}</td>
                                            <td>{{ $soru->question }}</td>


                                            <td>{{ $soru->answer ?? 'Henüz cevaplandırılmadı' }}</td>
                                            <td>{{ $soru->answered_at ?? 'Cevap yok' }}</td>
                                            <td>{{ $soru->created_at->format('d.m.Y H:i')}}</td>
                                            <td> @if($soru->status=="False")
                                                    Okunmadı
                                                @elseif($soru->status=="True")
                                                    Okundu
                                                @elseif($soru->status=="CV")
                                                    Cevap Verildi
                                                @endif</td>
                                            <td><a
                                                    href="{{route("deletequestion",["id"=>$soru->id])}}"
                                                    style="width: 90px" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Bu soruyu silmek istediğinize emin misiniz?')"><span
                                                        class="glyphicon glyphicon-trash"></span> Sil</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info text-center">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Henüz herhangi bir ilana sorunuz bulunmamaktadır.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
