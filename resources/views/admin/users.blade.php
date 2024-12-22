@php use Illuminate\Support\Facades\Storage; @endphp
@extends("layouts.admin")

@section("title","Admin Paneli - Kullanıcılar    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">KULLANICILAR</h1>

            <!--   Kitchen Sink -->
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-responsive">
                        @if (session()->has("success"))
                            <div class="alert alert-success">
                                {{session("success")}}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fotoğraf</th>
                                <th>İsim</th>
                                <th>E-mail</th>
                                <th>Telefon</th>
                                <th>Adres</th>
                                <th>Roller</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($datalist as $rs)
                                <tr>
                                    <td>{{ $rs->id }}</td>
                                    <td>
                                        @if($rs->profile_photo_path)
                                            <img src="{{Storage::url($rs->profile_photo_path)}}" height=50px
                                                 style="border-radius: 10px" alt=""></td>
                                    @endif
                                    <td>{{ $rs->name }}</td>
                                    <td>{{ $rs->email }}</td>
                                    <td>{{ $rs->phone }}</td>
                                    <td>{{ $rs->address }}</td>
                                    <td>
                                        @foreach($rs->roles as $rol)
                                            {{$rol->name}}
                                        @endforeach
                                        <a href="{{route("userroles",[$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=800,height=600')"><i class="bi bi-plus-circle-fill"></i></a>
                                    </td>
                                    <td class="text-nowrap" style="width: 120px;"><a
                                            href="{{route("adminuseredit",["id"=>$rs->id])}}"
                                            class="btn btn-sm btn-primary"> <i class="bi bi-pencil-square"></i></a> <a
                                            href="{{route("adminuserdelete",["id"=>$rs->id])}}"
                                            style="margin-left: 25px" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu soruyu silmek istediğinize emin misiniz?')"><i
                                                class="bi bi-trash"></i></a></td>

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
