<ul>
@foreach($children as $subcategory)


        <li><a href="{{route("categoryilanlar",["id"=>$subcategory->id,"slug"=>$subcategory->slug])}}">{{$subcategory->title}} </a></li>
        @if(count($subcategory->children))
            @include("home.categorytree",["children"=>$subcategory->children])
        @endif

@endforeach
</ul>
