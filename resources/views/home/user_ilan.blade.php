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

                    <h2 class="title text-center">İlanlarım</h2>

                    @if (session()->has("message"))
                        <div class="alert alert-danger">
                            {{session("message")}}
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route("homeemlakcreate")}}" class="btn btn-primary"><i
                                    class="glyphicon glyphicon-plus"></i> İlan Ekle</a>
                        </div>
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Adı</th>
                                <th>Kategori</th>
                                <th>Fiyatı</th>
                                <th>Adres</th>
                                <th>Şehir</th>
                                <th>Resim</th>
                                <th>Galeri</th>
                                <th>Durum</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($emlaks as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td><a href="{{route("ilan",["id"=>$rs->id,"slug"=>$rs->slug])}}">{{$rs->title}}</a></td>
                                    <td>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->kategori,$rs->kategori->title)}}</td>
                                    <td class="text-nowrap">{{ number_format($rs->fiyati, 0, ',', '.') }}TL
                                    </td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->city}}</td>
                                    <td>
                                        @if($rs->image)
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}"
                                                 height="30" alt="">
                                        @endif


                                    </td>
                                    <td>

                                        <a href="{{route("homeimagecreate",["id"=>$rs->id])}}"
                                           onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')" class="btn btn-sm btn-info"><i
                                                class="fa fa-picture-o  fa-lg" aria-hidden="true"></i></a>

                                    </td>
                                    <td>{{$rs->status}}</td>

                                    <td style="width: 90px">
                                        <a href="{{route("homeemlakedit",["id"=>$rs->id])}}"
                                           class="btn btn-sm btn-info"> <i class="fa fa-pencil"
                                                                           aria-hidden="true"></i></a>
                                        <a
                                            href="{{route("homeemlakdelete",["id"=>$rs->id])}}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu ilanı silmek istediğinize emin misiniz?')"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection
