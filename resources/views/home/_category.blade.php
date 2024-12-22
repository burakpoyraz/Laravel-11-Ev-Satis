@php

    $parentCategories=\App\Http\Controllers\HomeController::categoryList();
    $iller=\App\Http\Controllers\HomeController::getiller()

@endphp

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>KATEGORİLER</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach($parentCategories as $rs)
                @if(count($rs->children))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#{{Str::slug($rs->title)}}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{$rs->title}}
                                </a>
                            </h4>
                        </div>

                        <div id="{{Str::slug($rs->title)}}" class="panel-collapse collapse">
                            <div class="panel-body">

                                @include("home._categorytree",["children"=>$rs->children])

                            </div>
                        </div>
                    </div>
                @else

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a
                                        href="{{route("categoryilanlar",["id"=>$rs->id,"slug"=>$rs->slug])}}">{{$rs->title}}</a>
                            </h4>
                        </div>
                    </div>
                @endif

            @endforeach

        </div><!--/category-products-->


        <h2>FİLTRELER</h2>
        <form method="GET" action="{{route("filter")}}">

            <div class="form-group">
                <label for="min_price">Minimum Fiyat</label>
                <input type="number" name="min_price" id="min_price" class="form-control">
            </div>

            <div class="form-group">
                <label for="max_price">Maksimum Fiyat</label>
                <input type="number" name="max_price" id="max_price" class="form-control">
            </div>

            <div class="form-group">
                <label for="city">Şehir</label>
                <select name="city" id="city" class="form-control">
                    <option value="">Tüm Şehirler</option>
                    @foreach($iller as $il)
                    <option value="{{$il}}">{{$il}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="min_size">Minimum Metrekare</label>
                <input type="number" name="min_size" id="min_size" class="form-control">
            </div>

            <div class="form-group">
                <label for="max_size">Maksimum Metrekare</label>
                <input type="number" name="max_size" id="max_size" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Filtrele</button>
        </form>

    </div>
</div>
