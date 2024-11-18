<ul>
@foreach($children as $subcategory)


        <li><a href="#">{{$subcategory->title}} </a></li>
        @if(count($subcategory->children))
            @include("home.categorytree",["children"=>$subcategory->children])
        @endif

@endforeach
</ul>
