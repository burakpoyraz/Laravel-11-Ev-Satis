<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield("title")</title>

    <link href="{{asset("assets")}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset("assets")}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset("assets")}}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset("assets")}}/css/price-range.css" rel="stylesheet">
    <link href="{{asset("assets")}}/css/animate.css" rel="stylesheet">
    <link href="{{asset("assets")}}/css/main.css" rel="stylesheet">
    <link href="{{asset("assets")}}/css/responsive.css" rel="stylesheet">
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
            <h1 class="page-head-line">SORU DETAYI</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                   CEVAP YAZ
                </div>
                <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Emlak Adı</th>
                                <td><a href="{{route("ilan",["id"=>$review->emlak->id,"slug"=>$review->emlak->slug])}}">{{$review->emlak->title}}</a></td>
                            </tr>
                            <tr>
                                <th>Soruyu Soran</th>
                                <td>{{$review->user->name}}</td>
                            </tr>
                            <tr>
                                <th>Başlık</th>
                                <td>{{$review->subject}}</td>
                            </tr>
                            <tr>
                                <th>Soru Detay</th>
                                <td>{{$review->question}}</td>
                            </tr>
                            <tr>
                                <th>Gönderim Tarihi</th>
                                <td>{{ \Carbon\Carbon::parse($review->created_at)->format('d.m.Y  |  H:i') }}</td>
                            </tr>
                            </thead>

                        </table>


                        <form role="form" action="{{route("storeanswerquestion",["id"=>$review->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label>Cevap</label>
                                <textarea class="form-control" name="answer" type="text" value=""></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Gönder</button>

                        </form>

                </div>


            </div>


        </div>
    </div>
    <!-- /. ROW  -->
</body>
</html>



