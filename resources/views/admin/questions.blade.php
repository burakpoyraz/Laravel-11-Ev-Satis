@extends("layouts.admin")

@section("title","Admin Paneli - Sorular    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">İlanlara Ait Sorular</h1>

            <!--   Kitchen Sink -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route("adminemlakcreate")}}" class="btn btn-primary"><i
                            class="glyphicon glyphicon-plus"></i> Sorular</a>
                </div>

                <div class="panel-body">

                    <div class="table-responsive">
                        @if (session()->has("success"))
                            <div class="alert alert-danger">
                                {{session("success")}}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
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

                            @foreach($sorular as $soru)
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
                                    <td class="text-nowrap" style="width: 120px;"><a href="{{route("adminquestionshow",["id"=>$soru->id])}}"  class="btn btn-sm btn-primary">  <i class="bi bi-pencil-square"></i></a> <a
                                            href="{{route("adminquestiondelete",["id"=>$soru->id])}}" style="margin-left: 25px"   class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu soruyu silmek istediğinize emin misiniz?')"><i class="bi bi-trash"></i></a></td>

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
