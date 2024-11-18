@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">KATEGORİ İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    KATEGORİ GÜNCELLE
                </div>
                <div class="panel-body">
                    <form  role="form" action="{{route("categoryupdate",["id"=>$category->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Parent</label>
                            <select class="form-control" name="parentid">


                                @foreach($allcategories as $rs)
                                    <option value="{{ $rs->id }}" @if($category->parentid == $rs->id) selected @endif>{{ $rs->title }}</option>
                                @endforeach
                            </select>



                        </div>

                        <div class="form-group">
                            <label>Adı</label>
                            <input class="form-control" name="title" type="text " value="{{$category->title}}">
                        </div>


                        <div class="form-group">
                            <label>Keywords</label>
                            <input class="form-control" name="keywords" type="text" value="{{$category->keywords}}">
                        </div>


                        <div class="form-group">
                            <label>Açıklama</label>
                            <input class="form-control" name="description" type="text" value="{{$category->description}}">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" name="slug" type="text" value="{{$category->slug}}">
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="True" {{$category->status== "True"?"selected":""}}>True</option>
                                <option value="False"{{$category->status== "False"?"selected":""}}>False</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Güncelle</button>

                    </form>
                </div>
            </div>



        </div>
    </div>
    <!-- /. ROW  -->

@endsection
