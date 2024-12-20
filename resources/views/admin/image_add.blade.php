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
            <h1 class="page-head-line">GALERİ İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    GALERİ OLUŞTUR ({{$emlak->title}})
                </div>
                <div class="panel-body">
                    @if(@session("")) @endif
                    <form role="form" action="{{route("adminimagestore",["id"=>$emlak->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" name="title" type="text" value="">
                        </div>


                        <div class="form-group">
                            <label>Resim</label>
                            <input class="form-control" name="image[]" type="file" multiple>
                        </div>
                        <button type="submit" class="btn btn-info">Ekle</button>

                    </form>
                    @if(!empty($galeri) && $galeri->count() > 0)
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Adı</th>
                                <th>Resim</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galeri as $rs)
                                <tr>

                                    <td>{{$rs->title}}</td>
                                    <td><img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" height="60"
                                             alt=""></td>
                                    <td class="text-nowrap" style="width: 120px;"><a
                                            href="{{route("adminimagedelete",["id"=>$rs->id,"emlak_id"=>$emlak->id])}}" style="margin-left: 10px"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu resmi silmek istediğinize emin misiniz?')"><i
                                                class="bi bi-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i>
                            Henüz galeri'de resim bulunmamaktadır.
                        </div>
                    @endif
                </div>


            </div>


        </div>
    </div>
    <!-- /. ROW  -->
</body>
</html>


