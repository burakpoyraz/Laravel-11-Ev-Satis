@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">MESAJLAR</h1>

            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                <div class="panel-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>İsim</th>
                                <th>Konu</th>
                                <th>Durum</th>
                                <th>Not</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($messages as $rs)


                                <tr class="{{$rs->status=="New"?"danger":"success"}}">
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->subject}}</td>
                                    <td> @if($rs->status == "New")
                                            <i class="bi bi-envelope"></i> Yeni
                                        @else
                                            <i class="bi bi-envelope-open"></i> Okundu
                                        @endif
                                    </td>
                                    <td>{{$rs->note}}</td>
                                    <td class="text-nowrap" style="width: 120px;"><a
                                            href="{{route("adminmessageedit",["id"=>$rs->id])}}"
                                            class="btn btn-sm btn-primary"> <i class="bi bi-pencil-square"></i></a> <a
                                            href="{{route("adminmessagedelete",["id"=>$rs->id])}}"
                                            style="margin-left: 25px" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu mesajı silmek istediğinize emin misiniz?')"><i
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
