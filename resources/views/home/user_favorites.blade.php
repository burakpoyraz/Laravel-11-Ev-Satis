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

                    <h2 class="title text-center">Favori İlanlarım</h2>

                    @if (session()->has("message"))
                        <div class="alert alert-success">
                            {{session("message")}}
                        </div>
                    @endif
                    @if(!empty($favorites) && $favorites->count() > 0)
                    <div class="panel panel-default">

                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Adı</th>
                                    <th>Kategori</th>
                                    <th>Fiyatı</th>
                                    <th>Adres</th>
                                    <th>Şehir</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($favorites as $rs)
                                    <tr>
                                        <td>{{$rs->emlak->id}}</td>
                                        <td>
                                            <a href="{{route("ilan",["id"=>$rs->emlak->id,"slug"=>$rs->emlak->slug])}}"> {{$rs->emlak->title}}</a>
                                        </td>
                                        <td>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->emlak->kategori,$rs->emlak->kategori->title)}}</td>
                                        <td class="text-nowrap">{{ number_format($rs->emlak->fiyati, 0, ',', '.') }}TL
                                        </td>
                                        <td>{{$rs->emlak->address}}</td>
                                        <td>{{$rs->emlak->city}}</td>
                                        <td>
                                            <a
                                                href="{{route("homefavoritedelete",["id"=>$rs->id])}}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bu favori ilanı silmek istediğinize emin misiniz?')"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                    @else
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i>
                            Henüz favoriye aldığın ilan bulunmamaktadır.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
