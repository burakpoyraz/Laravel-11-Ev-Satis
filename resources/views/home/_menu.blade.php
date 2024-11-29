<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{route("home")}}" class="active">Anasayfa</a></li>
                        <li><a href="#">Öne Çıkanlar</a></li>
                        <li><a href="#">Yeni ilanlar</a></li>
                        <li><a href="{{route("aboutus")}}">Hakkımızda</a></li>
                        <li><a href="{{route("references")}}">Referanslar</a></li>
                        <li><a href="{{route("fag")}}">SSS</a></li>
                        <li><a href="{{route("contact")}}">İletişim</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    @livewire('search')
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
