@extends("layouts.home")

@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp

@section("title")
    Hesap Ayarları - {{$setting->title ?? "---"}}
@endsection
@section("description")
    {{$setting->description ?? "---"}}
@endsection

@section("keywords")
    {{$setting->keywords ?? "---"}}
@endsection

@section("content")

    <section>
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <h2 class="title text-center">İLETİŞİM </h2>
                    <div class="col-md-6">

                        <h3 class="">{{$setting->company ?? "---"}}</h3>
                        {!! $setting->contact  ?? "---" !!}
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center">Bize Ulaşın:</h3>
                        <p>Sorularınız, talepleriniz veya işbirliği fırsatlarınız için bizimle iletişime geçebilirsiniz.
                            Aşağıdaki formu doldurarak da mesaj bırakabilirsiniz. En kısa sürede dönüş yapacağız.</p>

                        <div class="shopper-info">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <form action="{{route("sendmessage")}}" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="Adınız Soyadınız" required>
                                <input type="email" name="email" placeholder="Email Adresiniz" required>
                                <input type="text" name="phone" placeholder="Telefon" required>

                                <p>Mesaj Bilgileri</p>
                                <input type="text" name="subject" placeholder="Konu"required>
                                <textarea name="message"
                                          placeholder="Mesajınız..."
                                          rows="5" required></textarea>
                                <button class="btn btn-primary mb-3" type="submit">Gönder</button>
                            </form>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </section>

@endsection
