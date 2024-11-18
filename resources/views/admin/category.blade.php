@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">KATEGORİLER</h1>

            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route("categorycreate")}}" class="btn btn-primary"><i
                            class="glyphicon glyphicon-plus"></i> Kategori Ekle </a>
                </div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Parent</th>
                                <th>Başlık</th>

                                <th>Durum</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td> {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}</td>
                                    <td>{{$rs->title}}</td>


                                    <td>{{$rs->status}}</td>
                                    <td class="text-nowrap" style="width: 120px;"><a href="{{route("categoryedit",["id"=>$rs->id])}}"  class="btn btn-sm btn-primary">  <i class="bi bi-pencil-square"></i></a> <a
                                            href="{{route("categorydelete",["id"=>$rs->id])}}" style="margin-left: 25px"   class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?')"><i class="bi bi-trash"></i></a></td>


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
