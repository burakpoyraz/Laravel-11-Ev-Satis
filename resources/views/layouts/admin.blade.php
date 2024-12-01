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







    @yield("css")
    @yield("header_js")
</head>
<body>
<div id="wrapper">
    @include("admin._header")
    @include("admin._sidebar")
    <div id="page-wrapper">
        <div id="page-inner">


            @yield("content")


        </div>
    </div>


</div>
@include("admin._footer")

@yield("footer_js")


</body>


</html>
