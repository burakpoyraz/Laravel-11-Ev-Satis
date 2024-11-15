@extends("layouts.admin")

@section("title","Admin Paneli - Kategoriler    ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">İLAN İŞLEMLERİ</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    İLAN GÜNCELLE
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route("adminemlakupdate",["id"=>$emlak->id,"ozellik_id"=>$ozellik->id])}}" method="post">
                        @csrf


                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" name="title" type="text" value={{$emlak->title}}>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="categoryid">
                                <option value="0" @if($emlak->categoryid == 0) selected @endif>Ana Kategori</option>
                                @foreach($categories as $rs)
                                    <option value="{{ $rs->id }}" @if($emlak->categoryid == $rs->id) selected @endif>{{$rs->title}}</option>
                                @endforeach
                            </select>
                        </div>




                        <!--  KONUT İŞYERİ BİNA DEVREMÜLK İÇİN -->
                        <div class="konut-alanlari" style="display: none;">


                            <div class="form-group">
                                <label>Oda Sayısı</label>
                                <input class="form-control" name="oda_sayisi" type="text" value={{$ozellik->oda_sayisi}}>
                            </div>
                            KONUT İŞYERİ VB....
                            <div class="form-group">
                                <label>Binanın Kat Sayısı</label>
                                <input class="form-control" name="binanin_kat_sayisi" type="text" value={{$ozellik->binanin_kat_sayisi}}>
                            </div>

                            <div class="form-group">
                                <label>Binanın Yaşı</label>
                                <input class="form-control" name="binanin_yasi" type="text" value={{$ozellik->binanin_yasi}}>
                            </div>

                            <div class="form-group">
                                <label>isinma_tipi</label>
                                <input class="form-control" name="isinma_tipi" type="text" value={{$ozellik->isinma_tipi}}>
                            </div>
                        </div>



                          <!--ARSA-->
                        <div class="arsa-alanlari" style="display: none;">
                            ARSAAAAAAAAA
                            <div class="form-group">
                                <label>Tapu Durumu</label>
                                <input class="form-control" name="tapu_durumu" type="text" value={{$ozellik->tapu_durumu}}>
                            </div>

                            <div class="form-group">
                                <label>Ada</label>
                                <input class="form-control" name="ada" type="text" value={{$ozellik->ada}}>
                            </div>

                            <div class="form-group">
                                <label>Parsel</label>
                                <input class="form-control" name="parsel" type="text" value={{$ozellik->parsel}}>
                            </div>
                        </div>

                        <!-- TURİSTİK TESİS -->
                        <div class="turistik-tesis-alanlari" style="display: none;">

                            TURİSTİKKKKKKK
                            <div class="form-group">
                                <label>kapali_alan_metrekare</label>
                                <input class="form-control" name="kapali_alan_metrekare" type="text" value={{$ozellik->kapali_alan_metrekare}}>
                            </div>

                            <div class="form-group">
                                <label>acik_alan_metrekare</label>
                                <input class="form-control" name="acik_alan_metrekare" type="text" value={{$ozellik->acik_alan_metrekare}}>
                            </div>

                            <div class="form-group">
                                <label>oda_sayisi</label>
                                <input class="form-control" name="oda_sayisi_turistik" type="text" value={{$ozellik->oda_sayisi}}>
                            </div>

                            <div class="form-group">
                                <label>Binanın Kat Sayısı</label>
                                <input class="form-control" name="binanin_kat_sayisi_turistik" type="text" value={{$ozellik->binanin_kat_sayisi}}>
                            </div>

                            <div class="form-group">
                                <label>Binanın Yaşı</label>
                                <input class="form-control" name="binanin_yasi_turistik" type="text" value={{$ozellik->binanin_yasi}}>
                            </div>

                            <div class="form-group">
                                <label>Yatak Sayısı</label>
                                <input class="form-control" name="yatak_Sayisi" type="text" value={{$ozellik->yatak_Sayisi}}>
                            </div>


                        </div>

                        <div class="form-group">
                            <label>Metrekare Toplam Alan</label>
                            <input class="form-control" name="metrekare_toplam_alan" type="text" value={{$emlak->metrekare_toplam_alan}}>
                        </div>

                        <div class="form-group">
                            <label>Fiyatı</label>
                            <input class="form-control" name="fiyati" type="text" value={{$emlak->fiyati}}>
                        </div>

                        <div class="form-group">
                            <label>Resim</label>
                            <input class="form-control" name="description" type="text" value={{$emlak->description}}>
                        </div>

                        <div class="form-group">
                            <label>Adres</label>
                            <input class="form-control" name="address" type="text" value={{$emlak->address}}>
                        </div>

                        <div class="form-group">
                            <label>Şehir</label>
                            <input class="form-control" name="city" type="text" value={{$emlak->city}}>
                        </div>

                        <div class="form-group">
                            <label>Detay</label>
                            <input class="form-control" name="detail" type="text" value={{$emlak->detail}}>
                        </div>

                        <div class="form-group">
                            <label>Krediye Uygunluk</label>
                            <input class="form-control" name="krediye_uygunluk" type="text" value={{$emlak->krediye_uygunluk}}>
                        </div>

                        <div class="form-group">
                            <label>keywords</label>
                            <input class="form-control" name="keywords" type="text" value={{$emlak->keywords}}>
                        </div>

                        <div class="form-group">
                            <label>description</label>
                            <input class="form-control" name="description" type="text" value={{$emlak->description}}>
                        </div>

                        <div class="form-group">
                            <label>slug</label>
                            <input class="form-control" name="slug" type="text" value={{$emlak->slug}}>
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

        document.addEventListener('DOMContentLoaded', function(){

            let categoryId = document.querySelector('select[name="categoryid"]').value;

            console.log(categoryId);
            handleCategoryChange(categoryId);
        });


        function handleCategoryChange(kategoriId) {
            console.log(kategoriId);

            document.querySelector('.konut-alanlari').style.display = 'none';
            document.querySelector('.arsa-alanlari').style.display = 'none';
            document.querySelector('.turistik-tesis-alanlari').style.display = 'none';

            switch (kategoriId) {
                case '15': // Konut
                case '16': // İşyeri
                case '19': // Bina
                case '20': // Devremülk
                    document.querySelector('.konut-alanlari').style.display = 'block';
                    break;
                case '17': // Arsa
                    document.querySelector('.arsa-alanlari').style.display = 'block';
                    break;
                case '21': // Turistik Tesis
                    document.querySelector('.turistik-tesis-alanlari').style.display = 'block';
                    break;
            }
        }
        document.querySelector('select[name="categoryid"]').addEventListener('change', function() {
            let kategoriId = this.value;
            console.log(kategoriId);
            handleCategoryChange(kategoriId);
        });

    </script>

@endsection
