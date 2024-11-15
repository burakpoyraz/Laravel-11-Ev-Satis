@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">İLAN İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    İLAN EKLE
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route("adminemlakstore")}}" method="post">
                        @csrf


                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" name="title" type="text">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="categoryid">
                                <option value="0">Ana Kategori</option>
                                @foreach($categories as $rs)
                                    <option value="{{$rs->id}}">{{$rs->title}}</option>
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
                                <input class="form-control" name="binanin_kat_sayisi" type="text">
                            </div>

                            <div class="form-group">
                                <label>Binanın Yaşı</label>
                                <input class="form-control" name="binanin_yasi" type="text">
                            </div>

                            <div class="form-group">
                                <label>isinma_tipi</label>
                                <input class="form-control" name="isinma_tipi" type="text">
                            </div>
                        </div>



                          <!--ARSA-->
                        <div class="arsa-alanlari" style="display: none;">
                            <div class="form-group">
                                <label>Tapu Durumu</label>
                                <input class="form-control" name="tapu_durumu" type="text">
                            </div>

                            <div class="form-group">
                                <label>Ada</label>
                                <input class="form-control" name="ada" type="text">
                            </div>

                            <div class="form-group">
                                <label>Parsel</label>
                                <input class="form-control" name="parsel" type="text">
                            </div>
                        </div>

                        <!-- TURİSTİK TESİS -->
                        <div class="turistik-tesis-alanlari" style="display: none;">
                            <div class="form-group">
                                <label>Tapu Durumu</label>
                                <input class="form-control" name="kapali_alan_metrekare" type="text">
                            </div>

                            <div class="form-group">
                                <label>Ada</label>
                                <input class="form-control" name="acik_alan_metrekare" type="text">
                            </div>

                            <div class="form-group">
                                <label>Parsel</label>
                                <input class="form-control" name="oda_sayisi_turistik" type="text">
                            </div>

                            <div class="form-group">
                                <label>Binanın Kat Sayısı</label>
                                <input class="form-control" name="binanin_kat_sayisi_turistik" type="text">
                            </div>

                            <div class="form-group">
                                <label>Binanın Yaşı</label>
                                <input class="form-control" name="binanin_yasi_turistik" type="text">
                            </div>

                            <div class="form-group">
                                <label>Yatak Sayısı</label>
                                <input class="form-control" name="yatak_Sayisi" type="text">
                            </div>


                        </div>

                        <div class="form-group">
                            <label>Metrekare Toplam Alan</label>
                            <input class="form-control" name="metrekare_toplam_alan" type="text">
                        </div>

                        <div class="form-group">
                            <label>Fiyatı</label>
                            <input class="form-control" name="fiyati" type="text">
                        </div>

                        <div class="form-group">
                            <label>Resim</label>
                            <input class="form-control" name="description" type="text">
                        </div>

                        <div class="form-group">
                            <label>Adres</label>
                            <input class="form-control" name="address" type="text">
                        </div>

                        <div class="form-group">
                            <label>Şehir</label>
                            <input class="form-control" name="city" type="text">
                        </div>

                        <div class="form-group">
                            <label>Detay</label>
                            <input class="form-control" name="detail" type="text">
                        </div>

                        <div class="form-group">
                            <label>Krediye Uygunluk</label>
                            <input class="form-control" name="krediye_uygunluk" type="text">
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
            let kategoriId = this.value;

            console.log(kategoriId)
            document.querySelector('.konut-alanlari').style.display = 'none';
            document.querySelector('.arsa-alanlari').style.display = 'none';
            document.querySelector('.turistik-tesis-alanlari').style.display = 'none';


            switch (kategoriId) {
                case '15': // Konut
                case '16': //İşyeri
                case '19': //Bina
                case '20': //Devremülk
                    document.querySelector('.konut-alanlari').style.display = 'block';
                    break;
                case '17': // Arsa
                    document.querySelector('.arsa-alanlari').style.display = 'block';
                    break;
                case '18': // Turistik Tesis
                    document.querySelector('.turistik-tesis-alanlari').style.display = 'block';
                    break;
                    }
        });
    </script>

@endsection
