@extends("layouts.admin")

@section("title","Admin Paneli - Ayarlar    ")
@section("header_js")


@endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">AYARLAR</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    AYARLARI DÜZENLE
                </div>
                <div class="panel-body">
                    <form role="form"
                          action="{{route("adminsettingupdate")}}"
                          method="post" enctype="multipart/form-data">
                        @csrf

                        <div id="exTab1" class="container">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#1a" data-toggle="tab">Genel Ayarlar</a>
                                </li>
                                <li><a href="#2a" data-toggle="tab">SMTP</a>
                                </li>
                                <li><a href="#3a" data-toggle="tab">Sosyal Medya</a>
                                </li>
                                <li><a href="#4a" data-toggle="tab">Hakkımızda</a>
                                </li>
                                <li><a href="#5a" data-toggle="tab">Referanslar</a>
                                </li>
                                <li><a href="#6a" data-toggle="tab">İletişim</a>
                                </li>
                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="1a">
                                    <!-- GENEL AYARLAR -->
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input class="form-control" name="title" type="text"
                                               value="{{$setting->title}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <input class="form-control" name="description" type="text"
                                               value="{{$setting->description}}">
                                    </div>


                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input class="form-control" name="keywords" type="text"
                                               value="{{$setting->keywords}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Firma Adı</label>
                                        <input class="form-control" name="company" type="text"
                                               value="{{$setting->company}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Adres</label>
                                        <input class="form-control" name="address" type="text"
                                               value="{{$setting->address}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input class="form-control" name="phone" type="text"
                                               value="{{$setting->phone}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input class="form-control" name="fax" type="text" value="{{$setting->fax}}">
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" type="text"
                                               value="{{$setting->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Durum</label>
                                        <select class="form-control" name="status">
                                            <option value="True" {{$setting->status=="True"?"selected":""}}>True</option>
                                            <option value="False" {{$setting->status=="False"?"selected":""}}>False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane" id="2a">
                                    <div class="form-group">
                                        <label>Smtpserver</label>
                                        <input class="form-control" name="smtpserver" type="text"
                                               value="{{$setting->smtpserver}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Smtpemail</label>
                                        <input class="form-control" name="smtpemail" type="text"
                                               value="{{$setting->smtpemail}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Smtppassword</label>
                                        <input class="form-control" name="smtppassword" type="text"
                                               value="{{$setting->smtppassword}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Smtpport</label>
                                        <input class="form-control" name="smtpport" type="text"
                                               value="{{$setting->smtpport}}">
                                    </div>
                                </div>
                                <div class="tab-pane" id="3a">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input class="form-control" name="facebook" type="text"
                                               value="{{$setting->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label>İnstagram</label>
                                        <input class="form-control" name="instagram" type="text"
                                               value="{{$setting->instagram}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input class="form-control" name="twitter" type="text"
                                               value="{{$setting->twitter}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input class="form-control" name="youtube" type="text"
                                               value="{{$setting->youtube}}">
                                    </div>
                                </div>
                                <div class="tab-pane" id="4a">
                                    <div class="form-group">
                                        <label>Hakkımızda</label>
                                        <textarea id="aboutus" name="aboutus">{{$setting->aboutus}}</textarea>
                                    </div>
                                </div>

                                <div class="tab-pane" id="5a">
                                    <div class="form-group">
                                        <label>Referanslar</label>
                                        <textarea id="references" name="references">{{$setting->references}}</textarea>
                                    </div>
                                </div>

                                <div class="tab-pane" id="6a">
                                    <div class="form-group">
                                        <label>İletişim</label>
                                        <textarea id="contact" name="contact">{{$setting->contact}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <button type="submit" class="btn btn-info">Ayarları Güncelle</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- /. ROW  -->

@endsection
@section("footer_js")

    <script>
        $(document).ready(function () {
            $('#aboutus').summernote();
            $('#contact').summernote();
            $('#references').summernote();
        });
    </script>
@endsection
