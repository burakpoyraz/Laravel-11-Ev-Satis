@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("header_js")
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">İLAN İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    İLAN GÜNCELLE
                </div>
                <div class="panel-body">
                    <form role="form"
                          action="{{route("adminemlakupdate",["id"=>$emlak->id,"ozellik_id"=>$ozellik->id])}}"
                          method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" name="title" type="text" value="{{$emlak->title}}">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="categoryid" required>
                                <option value="" disabled selected>Kategori seçiniz</option>
                                @foreach($categories as $rs)
                                    <option value="{{$rs->id}}" data-parentid="{{$rs->parentid}}"  @if($emlak->categoryid == $rs->id) selected @endif>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                                @endforeach
                            </select>
                        </div>


                        <!--  KONUT İŞYERİ BİNA DEVREMÜLK İÇİN -->
                        <div class="konut-alanlari" style="display: none;">


                            <div class="form-group">
                                <label>Oda Sayısı</label>
                                <input class="form-control" name="oda_sayisi" type="text"
                                       value="{{$ozellik->oda_sayisi}}">
                            </div>

                            <div class="form-group">
                                <label>Binanın Kat Sayısı</label>
                                <input class="form-control" name="binanin_kat_sayisi" type="number"
                                       value="{{$ozellik->binanin_kat_sayisi}}">
                            </div>

                            <div class="form-group">
                                <label>Binanın Yaşı</label>
                                <input class="form-control" name="binanin_yasi" type="number"
                                       value="{{$ozellik->binanin_yasi}}">
                            </div>

                            <div class="form-group">
                                <label>isinma_tipi</label>

                                <select class="form-control" name="isinma_tipi">
                                    <option value="" disabled selected>Isınma Tipini Seçiniz</option>
                                    @foreach($isinma_tipleri as $tipi)
                                        <option value="{{$tipi}}" {{$ozellik->isinma_tipi==$tipi?"selected":""}}>{{$tipi}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>


                        <!--ARSA-->
                        <div class="arsa-alanlari" style="display: none;">


                            <div class="form-group">
                                <label>Ada</label>
                                <input class="form-control" name="ada" type="number" value="{{$ozellik->ada}}">
                            </div>

                            <div class="form-group">
                                <label>Parsel</label>
                                <input class="form-control" name="parsel" type="number" value="{{$ozellik->parsel}}">
                            </div>
                        </div>

                        <!-- TURİSTİK TESİS -->
                        <div class="turistik-tesis-alanlari" style="display: none;">

                            <div class="form-group">
                                <label>kapali_alan_metrekare</label>
                                <input class="form-control" name="kapali_alan_metrekare" type="number"
                                       value="{{$ozellik->kapali_alan_metrekare}}">
                            </div>

                            <div class="form-group">
                                <label>acik_alan_metrekare</label>
                                <input class="form-control" name="acik_alan_metrekare" type="number"
                                       value="{{$ozellik->acik_alan_metrekare}}">
                            </div>

                            <div class="form-group">
                                <label>oda_sayisi</label>
                                <input class="form-control" name="oda_sayisi_turistik" type="text"
                                       value="{{$ozellik->oda_sayisi}}">
                            </div>

                            <div class="form-group">
                                <label>Binanın Kat Sayısı</label>
                                <input class="form-control" name="binanin_kat_sayisi_turistik" type="number"
                                       value="{{$ozellik->binanin_kat_sayisi}}">
                            </div>

                            <div class="form-group">
                                <label>Binanın Yaşı</label>
                                <input class="form-control" name="binanin_yasi_turistik" type="number"
                                       value="{{$ozellik->binanin_yasi}}">
                            </div>

                            <div class="form-group">
                                <label>Yatak Sayısı</label>
                                <input class="form-control" name="yatak_Sayisi" type="number"
                                       value="{{$ozellik->yatak_Sayisi}}">
                            </div>


                        </div>

                        <div class="form-group">
                            <label>Metrekare Toplam Alan</label>
                            <input class="form-control" name="metrekare_toplam_alan" type="number"
                                   value="{{$emlak->metrekare_toplam_alan}}">
                        </div>

                        <div class="form-group">
                            <label>Fiyatı</label>
                            <input class="form-control" name="fiyati" type="number" value="{{$emlak->fiyati}}">
                        </div>

                        <div class="form-group">
                            <label>Resim</label>
                            <input class="form-control" name="image" type="file"
                                   value="{{$emlak->image}}">

                            @if($emlak->image)
                                <img src="{{\Illuminate\Support\Facades\Storage::url($emlak->image)}}" height="85" alt="">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Adres</label>
                            <input class="form-control" name="address" type="text" value="{{$emlak->address}}">
                        </div>

                        <div class="form-group">
                            <label>Şehir</label>
                            <select class="form-control" name="city" required>
                                <option value="" disabled selected>Şehir seçiniz</option>
                                @foreach($iller as $il)
                                    <option value="{{$il}}" {{$il==$emlak->city? "selected":""}}>{{$il}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Detay</label>

                            <textarea id="summernote" name="detail">{{$emlak->detail}}</textarea>

                        </div>

                        <div class="form-group">
                            <label>Krediye Uygunluk</label>

                            <select class="form-control" name="krediye_uygunluk">
                                <option value="" disabled selected>Krediye uygunluk seçiniz</option>
                                <option value="Evet" {{$emlak->krediye_uygunluk=="Evet"?"selected":""}}>Evet</option>
                                <option value="Hayır" {{$emlak->krediye_uygunluk=="Hayır"?"selected":""}}>Hayır</option>
                            </select>

                        </div>


                        <div class="form-group">
                            <label>Tapu Durumu</label>
                            <select class="form-control" name="tapu_durumu">
                                <option value="" disabled selected>Tapu durumu seçiniz</option>
                                <option
                                    value="Kat Mülkiyetli" {{ $emlak->tapu_durumu == 'Kat Mülkiyetli' ? 'selected' : '' }}>
                                    Kat Mülkiyetli
                                </option>
                                <option
                                    value="Kat İrtifaklı" {{ $emlak->tapu_durumu == 'Kat İrtifaklı' ? 'selected' : '' }}>
                                    Kat İrtifaklı
                                </option>
                                <option
                                    value="Hisseli Tapu" {{ $emlak->tapu_durumu == 'Hisseli Tapu' ? 'selected' : '' }}>
                                    Hisseli Tapu
                                </option>
                                <option
                                    value="Müstakil Tapulu" {{ $emlak->tapu_durumu == 'Müstakil Tapulu' ? 'selected' : '' }}>
                                    Müstakil Tapulu
                                </option>
                                <option
                                    value="Arsa Tapulu" {{ $emlak->tapu_durumu == 'Arsa Tapulu' ? 'selected' : '' }}>
                                    Arsa Tapulu
                                </option>
                                <option
                                    value="Kooperatif Hisseli Tapu" {{ $emlak->tapu_durumu == 'Kooperatif Hisseli Tapu' ? 'selected' : '' }}>
                                    Kooperatif Hisseli Tapu
                                </option>
                                <option
                                    value="Yurt Dışı Tapulu" {{ $emlak->tapu_durumu == 'Yurt Dışı Tapulu' ? 'selected' : '' }}>
                                    Yurt Dışı Tapulu
                                </option>
                                <option
                                    value="Tapu Kaydı Yok" {{ $emlak->tapu_durumu == 'Tapu Kaydı Yok' ? 'selected' : '' }}>
                                    Tapu Kaydı Yok
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>keywords</label>
                            <input class="form-control" name="keywords" type="text" value="{{$emlak->keywords}}">
                        </div>

                        <div class="form-group">
                            <label>description</label>
                            <input class="form-control" name="description" type="text"
                                   value="{{$emlak->description}}">
                        </div>

                        <div class="form-group">
                            <label>slug</label>
                            <input class="form-control" name="slug" type="text" value="{{$emlak->slug}}">
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="True" {{$emlak->status== "True"?"selected":""}}>Aktif</option>
                                <option value="False"{{$emlak->status== "False"?"selected":""}}>Pasif</option>
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
