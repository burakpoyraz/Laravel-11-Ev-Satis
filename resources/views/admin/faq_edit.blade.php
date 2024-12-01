@extends("layouts.admin")

@section("title","Admin Paneli - SSS    ")

@section("header_js")
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">SIKÇA SORULAN SORULAR İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    SSS GÜNCELLE
                </div>
                <div class="panel-body">
                    <form role="form"
                          action="{{route("adminfaqupdate",["id"=>$data->id])}}"
                          method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label>Soru</label>
                            <input class="form-control" name="question" type="text" value="{{$data->question}}">
                        </div>
                        <div class="form-group">
                            <label>Cevap</label>
                            <textarea id="summernote" ass="form-control" name="answer">{{ $data->answer}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Pozisyon</label>
                            <input class="form-control" name="position" type="number" value="{{$data->position}}">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="True" {{$data->status== "True"?"selected":""}}>Aktif</option>
                                <option value="False"{{$data->status== "False"?"selected":""}}>Pasif</option>
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

            handleCategoryChange(parentId,categoryId);
        });


        function handleCategoryChange(parentid,categoryId) {
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
            if (categoryId==3){ //Arsa anakategori ve child
                document.querySelector('.arsa-alanlari').style.display = 'block';
            }
        }

        document.querySelector('select[name="categoryid"]').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];
            let categoryId = this.value;
            let parentId = selectedOption.getAttribute('data-parentid'); // parentid'yi al

            console.log('Kategori ID:', categoryId);
            console.log('Parent ID:', parentId);
            handleCategoryChange(parentId,categoryId);
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection
