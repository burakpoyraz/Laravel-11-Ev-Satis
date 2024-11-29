@extends("layouts.admin")

@section("title","Admin Paneli - Sorular    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">SORU AYRINTILARI</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    SORU
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
                                <td>{{$soru->id}}</td>
                            </tr>
                            <tr>
                                <th>İsim</th>
                                <td>{{$soru->user->name}}</td>
                            </tr>
                            <tr>
                                <th>Emlak</th>
                                <td>{{$soru->emlak->title}}</td>
                            </tr>
                            <tr>
                                <th>Konu</th>
                                <td>{{$soru->subject}}</td>
                            </tr>
                            <tr>
                                <th>Soru</th>
                                <td>{{$soru->question}}</td>
                            </tr>
                            <tr>
                                <th>Cevap</th>
                                <td>{{ $soru->answer ?? 'Henüz cevaplandırılmadı'}}</td>
                            </tr>
                            <tr>
                                <th>Cevap Tarihi</th>
                                <td>{{$soru->answered_at==null ? 'Cevap Yok': \Carbon\Carbon::parse($soru->answered_at)->format('d.m.Y  |  H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Ip</th>
                                <td>{{$soru->ip}}</td>
                            </tr>
                            <tr>
                                <th>Gönderilme Tarihi</th>
                                <td>{{ \Carbon\Carbon::parse($soru->created_at)->format('d.m.Y  |  H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Güncellenme Tarihi</th>
                                <td>{{ \Carbon\Carbon::parse($soru->updated_at)->format('d.m.Y  |  H:i') }}</td>
                            </tr>

                            </thead>
                        </table>
                    </div>


                    <form role="form" action="{{route("adminquestionupdate",["id"=>$soru->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Durumu</label>
                            <select class="form-control" name="status">
                                <option value="True" @if($soru->status == "True") selected @endif>True</option>
                                <option value="False" @if($soru->status == "False") selected @endif>False</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
