@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">MESAJ İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    MESAJ DÜZENLE
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <td>{{$message->id}}</td>
                            </tr>
                            <tr>
                                <th>İsim</th>
                                <td>{{$message->name}}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{$message->email}}</td>
                            </tr>
                            <tr>
                                <th>Ip Adresi</th>
                                <td>{{$message->ip}}</td>
                            </tr>
                            <tr>
                                <th>Telefon</th>
                                <td>{{$message->phone}}</td>
                            </tr>
                            <tr>
                                <th>Konu</th>
                                <td>{{$message->subject}}</td>
                            </tr>
                            <tr>
                                <th>Mesaj</th>
                                <td>{{$message->message}}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>


                    <form role="form" action="{{route("adminmessageupdate",["id"=>$message->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Not</label>
                            <textarea class="form-control" name="note" placeholder="Notunuzu yazın"
                                      rows="5">{{$message->note}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
