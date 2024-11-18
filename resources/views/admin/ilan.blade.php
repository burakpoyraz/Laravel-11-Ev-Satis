@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">İLANLAR</h1>

            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route("adminemlakcreate")}}" class="btn btn-primary"><i
                            class="glyphicon glyphicon-plus"></i> İlan Ekle</a>
                </div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Adı</th>
                                <th>Kategori</th>
                                <th>Fiyatı</th>
                                <th>Adres</th>
                                <th>Şehir</th>
                                <th>Kullanıcı</th>
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
                                    <td>{{$rs->title}}</td>
                                    <td>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->kategori,$rs->kategori->title)}}</td>
                                    <td>{{$rs->fiyati}}</td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->city}}</td>
                                    <td>{{$rs->kullanici->name}}</td>
                                    <td>
                                        @if($rs->image)
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" height="30" alt="">
                                        @endif


                                    </td>
                                    <td>

                                        <a href="{{route("adminimagecreate",["id"=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><i class="bi bi-images h2" ></i></a>

                                    </td>
                                    <td>{{$rs->status}}</td>

                                    <td class="text-nowrap" style="width: 120px;"><a href="{{route("adminemlakedit",["id"=>$rs->id])}}"  class="btn btn-sm btn-primary" > <i class="bi bi-pencil-square" ></i></a>
                                        <a
                                            href="{{route("adminemlakdelete",["id"=>$rs->id])}}" style="margin-left: 25px" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu ilanı silmek istediğinize emin misiniz?')"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End  Kitchen Sink -->
        </div>
    </div>
    <!-- /. ROW  -->

@endsection
