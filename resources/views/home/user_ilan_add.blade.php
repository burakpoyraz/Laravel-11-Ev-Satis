@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title","Hesap Ayarları")
@section("description")
    {{$setting->description}}
@endsection

@section("keywords")
    {{$setting->keywords}}
@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">

                @include("home._user_menu")

                <div class="col-sm-9">

                    <h2 class="title text-center">İlanlarım</h2>

                    @if (session()->has("message"))
                        <div class="alert alert-danger">
                            {{session("message")}}
                        </div>
                    @endif
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            İLAN EKLE
                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{route("homeemlakstore")}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input class="form-control" name="title" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="categoryid" required>
                                        <option value="" disabled selected>Kategori seçiniz</option>
                                        @foreach($categories as $rs)

                                            <option value="{{$rs->id}}"
                                                    data-parentid="{{$rs->parentid}}">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <!--  KONUT İŞYERİ BİNA DEVREMÜLK İÇİN -->
                                <div class="konut-alanlari" style="display: none;">

                                    <div class="form-group">
                                        <label>Oda Sayısı</label>
                                        <input class="form-control" name="oda_sayisi" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label>Binanın Kat Sayısı</label>
                                        <input class="form-control" name="binanin_kat_sayisi" type="number">
                                    </div>
                                    <div class="form-group">
                                        <label>Bulunduğu Kat</label>
                                        <input class="form-control" name="bulundugu_kat" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>Binanın Yaşı</label>
                                        <input class="form-control" name="binanin_yasi" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>isinma_tipi</label>
                                        <select class="form-control" name="isinma_tipi">
                                            <option value="" disabled selected>Isınma Tipini Seçiniz</option>
                                            @foreach($isinma_tipleri as $tipi)
                                                <option value="{{$tipi}}">{{$tipi}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <!--ARSA-->
                                <div class="arsa-alanlari" style="display: none;">


                                    <div class="form-group">
                                        <label>Ada</label>
                                        <input class="form-control" name="ada" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>Parsel</label>
                                        <input class="form-control" name="parsel" type="number">
                                    </div>
                                </div>

                                <!-- TURİSTİK TESİS -->
                                <div class="turistik-tesis-alanlari" style="display: none;">
                                    <div class="form-group">
                                        <label>Kapalı Alan Metrekare</label>
                                        <input class="form-control" name="kapali_alan_metrekare" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>Açık Alan Metrekare</label>
                                        <input class="form-control" name="acik_alan_metrekare" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>Oda Sayisi Turistik</label>
                                        <input class="form-control" name="oda_sayisi_turistik" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label>Binanın Kat Sayısı</label>
                                        <input class="form-control" name="binanin_kat_sayisi_turistik" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>Binanın Yaşı</label>
                                        <input class="form-control" name="binanin_yasi_turistik" type="number">
                                    </div>

                                    <div class="form-group">
                                        <label>Yatak Sayısı</label>
                                        <input class="form-control" name="yatak_Sayisi" type="number">
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label>Metrekare Toplam Alan</label>
                                    <input class="form-control" name="metrekare_toplam_alan" type="number">
                                </div>

                                <div class="form-group">
                                    <label>Fiyatı</label>
                                    <input class="form-control" name="fiyati" type="number">
                                </div>

                                <div class="form-group">
                                    <label>Resim</label>
                                    <input class="form-control" name="image" type="file">
                                </div>

                                <div class="form-group">
                                    <label>Adres</label>
                                    <input class="form-control" name="address" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Şehir</label>
                                    <select class="form-control" name="city" required>
                                        <option value="" disabled selected>Şehir seçiniz</option>
                                        @foreach($iller as $il)
                                            <option value="{{$il}}">{{$il}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Detay</label>

                                    <textarea id="summernote" name="detail"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Krediye Uygunluk</label>
                                    <select class="form-control" name="krediye_uygunluk">
                                        <option value="" disabled selected>Krediye uygunluk seçiniz</option>
                                        <option value="Evet">Evet</option>
                                        <option value="Hayır">Hayır</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tapu Durumu</label>
                                    <select class="form-control" name="tapu_durumu" required>
                                        <option value="" disabled selected>Tapu durumu seçiniz</option>
                                        <option value="Kat Mülkiyetli">Kat Mülkiyetli</option>
                                        <option value="Kat İrtifaklı">Kat İrtifaklı</option>
                                        <option value="Hisseli Tapu">Hisseli Tapu</option>
                                        <option value="Müstakil Tapulu">Müstakil Tapulu</option>
                                        <option value="Arsa Tapulu">Arsa Tapulu</option>
                                        <option value="Kooperatif Hisseli Tapu">Kooperatif Hisseli Tapu</option>
                                        <option value="Yurt Dışı Tapulu">Yurt Dışı Tapulu</option>
                                        <option value="Tapu Kaydı Yok">Tapu Kaydı Yok</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>keywords</label>
                                    <input class="form-control" name="keywords" type="text">
                                </div>

                                <div class="form-group">
                                    <label>description</label>
                                    <input class="form-control" name="description" type="text">
                                </div>

                                <div class="form-group">
                                    <label>slug</label>
                                    <input class="form-control" name="slug" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Durum</label>
                                    <select class="form-control" name="status">
                                        <option value="True">Aktif</option>
                                        <option value="False">Pasif</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ekle</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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

            if (categoryId == 3) {
                document.querySelector('.arsa-alanlari').style.display = 'block';
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>

@endsection
