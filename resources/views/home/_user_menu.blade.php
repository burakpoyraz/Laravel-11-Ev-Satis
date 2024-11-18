@php

    $parentCategories=\App\Http\Controllers\HomeController::categoryList()

@endphp

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>HESAP AYARLARI</h2>
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
                            <h4 class="panel-title"><a href="#">{{$rs->title}}</a></h4>
                        </div>
                    </div>
                @endif

                    @endforeach

        </div><!--/category-products-->
    </div>
</div>
