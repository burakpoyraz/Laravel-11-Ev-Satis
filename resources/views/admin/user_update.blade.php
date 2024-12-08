@php use Illuminate\Support\Facades\Storage; @endphp
@extends("layouts.admin")

@section("title","Admin Paneli - Kullanıcılar")


@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">KULLANICI İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    KULLANICI GÜNCELLE
                </div>
                <div class="panel-body">
                    <form role="form"
                          action="{{route("adminuserupdate",["id"=>$data->id])}}"
                          method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label>İsim</label>
                            <input class="form-control" name="name" type="text" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="text" value="{{$data->email}}">
                        </div>

                        <div class="form-group">
                            <label>Telefon</label>
                            <input class="form-control" name="phone" type="text" value="{{$data->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <input class="form-control" name="address" type="text" value="{{$data->address}}">
                        </div>
                        <div class="form-group">
                            <label>Fotoğraf</label>
                            <input class="form-control" name="profile_photo_path" type="file"
                                   value="{{$data->profile_photo_path}}">

                            @if($data->profile_photo_path)
                                <img src="{{Storage::url($data->profile_photo_path)}}" height="85" alt="">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-info">Güncelle</button>

                    </form>
                </div>
            </div>


        </div>
    </div>
    <!-- /. ROW  -->

@endsection

@section("footer_js")

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Sayfa yüklendiğinde seçili option öğesini al
            let selectedOption = document.querySelector('select[name="categoryid"]').options[
                document.querySelector('select[name="categoryid"]').selectedIndex
                ];

            let categoryId = selectedOption.value;
            let parentId = selectedOption.getAttribute('data-parentid'); // Seçilen option'dan parentId'yi al
            console.log('Parent ID on page load:', parentId);

            handleCategoryChange(parentId, categoryId);
        });


        function handleCategoryChange(parentid, categoryId) {
            console.log(parentid);

            document.querySelector('.konut-alanlari').style.display = 'none';
            document.querySelector('.arsa-alanlari').style.display = 'none';
            document.querySelector('.turistik-tesis-alanlari').style.display = 'none';

            switch (parentid) {
                case '1': // Konut
                case '2': // İşyeri
                case '4': // Bina
                case '5': // Devremülk
                    document.querySelector('.konut-alanlari').style.display = 'block';
                    break;
                case '3': // Arsa
                    document.querySelector('.arsa-alanlari').style.display = 'block';
                    break;
                case '6': // Turistik Tesis
                    document.querySelector('.turistik-tesis-alanlari').style.display = 'block';
                    break;
            }
            if (categoryId == 3) { //Arsa anakategori ve child
                document.querySelector('.arsa-alanlari').style.display = 'block';
            }
        }

        document.querySelector('select[name="categoryid"]').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];
            let categoryId = this.value;
            let parentId = selectedOption.getAttribute('data-parentid'); // parentid'yi al

            console.log('Kategori ID:', categoryId);
            console.log('Parent ID:', parentId);
            handleCategoryChange(parentId, categoryId);
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>

@endsection
