<footer id="footer"><!--Footer-->


    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>{{$setting->company ?? "---"}}</h2>
                            <p><strong>Adres:</strong><br />{{$setting->address ?? "---"}}</p>
                            <p><strong>Telefon:</strong> {{$setting->phone ?? "---"}}</p>
                            <p><strong>Fax:</strong> {{$setting->fax ?? "---"}}</p>
                            <p><strong>Email:</strong> {{$setting->email ?? "---"}}</p>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © {{ date('Y') }} {{$setting->company ?? "---"}} All rights reserved.</p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{asset("assets")}}/js/jquery.js"></script>
<script src="{{asset("assets")}}/js/jquery.ui.core.js"></script>
<script src="{{asset("assets")}}/js/jquery.ui.widget.js"></script>
<script src="{{asset("assets")}}/js/jquery.ui.accordion.js"></script>
<script src="{{asset("assets")}}/js/bootstrap.min.js"></script>
<script src="{{asset("assets")}}/js/jquery.scrollUp.min.js"></script>
<script src="{{asset("assets")}}/js/price-range.js"></script>
<script src="{{asset("assets")}}/js/jquery.prettyPhoto.js"></script>
<script src="{{asset("assets")}}/js/main.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<!-- Steps JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery-steps@1.1.0/build/jquery.steps.min.js"></script>
