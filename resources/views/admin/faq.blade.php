@extends("layouts.admin")

@section("title","Admin Paneli - SSS    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">SIKÇA SORULAN SORULAR</h1>

            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route("adminfaqcreate")}}" class="btn btn-primary"><i
                            class="glyphicon glyphicon-plus"></i> SSS Ekle</a>
                </div>

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
                                <th>Id</th>
                                <th>Soru</th>
                                <th>Cevap</th>
                                <th>Pozisyon</th>
                                <th>Durum</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($datalist as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->question}}</td>
                                    <td>{!!  $rs->answer!!}</td>
                                    <td>{{$rs->position}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td class="text-nowrap" style="width: 60px;"><a
                                            href="{{route("adminfaqedit",["id"=>$rs->id])}}"
                                            class="btn btn-sm btn-primary"> <i class="bi bi-pencil-square"></i></a>
                                        <a
                                            href="{{route("adminfaqdelete",["id"=>$rs->id])}}" style="margin-left: 2px"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu SSS i silmek istediğinize emin misiniz?')"><i
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
