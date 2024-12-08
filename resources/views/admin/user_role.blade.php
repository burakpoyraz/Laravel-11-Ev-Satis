<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield("title")</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset("assets/admin")}}/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset("assets/admin")}}/assets/css/font-awesome.css" rel="stylesheet"/>
    <!--CUSTOM BASIC STYLES-->
    <link href="{{asset("assets/admin")}}/assets/css/basic.css" rel="stylesheet"/>
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset("assets/admin")}}/assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- BOOTSTRAP ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap (Eğer kullanıyorsanız) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Summernote CSS ve JS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <!-- Steps JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-steps@1.1.0/build/jquery.steps.min.js"></script>

</head>
<body>
<div class="row">
    <div class="col-md-12">
            <h1 class="page-head-line">KULLANICI İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    ROL DÜZENLE
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
                                <th rowspan="5" style="width: 100px;">
                                    @if($data->profile_photo_path)
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($data->profile_photo_path)}}"
                                             alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 300px; max-height: 300px;">
                                    @endif
                                </th>
                                <th>Id</th>
                                <td>{{$data->id}}</td>
                            </tr>
                            <tr>
                                <th>İsim</th>
                                <td>{{$data->name}}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{$data->email}}</td>
                            </tr>
                            <tr>
                                <th>Roller</th>
                                <td>
                                    <table>
                                        @foreach($data->roles as $rol)
                                        <tr>

                                                <td>
                                                    {{$rol->name}}
                                                </td>
                                            <td>
                                                | <a href="{{route("userrolesdelete",["userid"=>$data->id,"roleid"=>$rol->id])}}"
                                                     onclick="return confirm('Bu rolü silmek istediğinize emin misiniz?')" class="text-danger">
                                                    <i
                                                        class="bi bi-trash "></i> </a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </table>


                                </td>
                            </tr>
                            <tr>
                                <th>Rol Ekle</th>
                                <td>
                                    <form role="form" action="{{route("userrolesstore",["id"=>$data->id])}}"
                                          method="post">
                                        @csrf

                                            <select class="form-control" name="roleid" required>
                                                <option value="" disabled selected>Rol Seçiniz</option>
                                                @foreach($roldatalist as $rol)
                                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                                @endforeach
                                            </select>

                                        <button type="submit" class="btn btn-info">Ekle</button>
                                    </form>


                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>
</html>
