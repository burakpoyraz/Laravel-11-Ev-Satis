@extends("layouts.admin")

@section("title","Admin Paneli - SSS    ")

@section("header_js")
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery-steps@1.1.0/build/jquery.steps.min.js"></script>

@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">SIKÇA SORULAN SORULAR İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    SSS EKLE
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route("adminfaqstore")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Soru</label>
                            <input class="form-control" name="question" type="text">
                        </div>
                        <div class="form-group">
                            <label>Cevap</label>
                            <textarea id="summernote" class="form-control" name="answer" type="text"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Pozisyon</label>
                            <input class="form-control" name="position" type="number">
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="True">Aktif</option>
                                <option value="False">Pasif</option>
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

@section("footer_js")

    <script>

        document.querySelector('select[name="categoryid"]').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];
            let categoryId = this.value;
            let parentId = selectedOption.getAttribute('data-parentid'); // parentid'yi alın.

            console.log('Kategori ID:', categoryId);
            console.log('Parent ID:', parentId);

            document.querySelector('.konut-alanlari').style.display = 'none';
            document.querySelector('.arsa-alanlari').style.display = 'none';
            document.querySelector('.turistik-tesis-alanlari').style.display = 'none';


            switch (parentId) {
                case '1': // Konut
                case '2': //İşyeri
                case '4': //Bina
                case '5': //Devremülk
                    document.querySelector('.konut-alanlari').style.display = 'block';
                    break;
                case '3': // Arsa
                    document.querySelector('.arsa-alanlari').style.display = 'block';
                    break;
                case '6': // Turistik Tesis
                    document.querySelector('.turistik-tesis-alanlari').style.display = 'block';
                    break;
                    }

                    if (categoryId==3){
                        document.querySelector('.arsa-alanlari').style.display = 'block';
                    }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection
