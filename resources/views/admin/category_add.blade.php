@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">KATEGORİ İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    KATEGORİ EKLE
                </div>
                <div class="panel-body">
                    <form  role="form" action="{{route("categorystore")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Parent</label>
                            <select class="form-control" name="parentid" required>
                                <option value="" disabled selected>Kategori Seçiniz</option>
                                @foreach($categories as $rs)
                                <option value="{{$rs->id}}">{{$rs->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Adı</label>
                            <input class="form-control" name="title" type="text">
                        </div>


                        <div class="form-group">
                            <label>Keywords</label>
                            <input class="form-control" name="keywords" type="text">
                        </div>


                        <div class="form-group">
                            <label>Açıklama</label>
                            <input class="form-control" name="description" type="text">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" name="slug" type="text">
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Ekle</button>

                    </form>
                </div>
            </div>



        </div>
    </div>
    <!-- /. ROW  -->

@endsection
