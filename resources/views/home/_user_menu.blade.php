@php

    $parentCategories=\App\Http\Controllers\HomeController::categoryList()

@endphp

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>HESAP AYARLARI</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route("userhome")}}">Hesabım</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route("homeemlaks")}}">İlanlarım</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route("homefavorite")}}">Favori İlanlarım</a></h4>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route("getquestions")}}">Sorularım</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Cevaplarım</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Sepetim</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Mesajlarım</a></h4>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route("logout")}}">Çıkış</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
