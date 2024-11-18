<div id="footer-sec">
    &copy; 2014 YourCompdsany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
</div>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<!-- BOOTSTRAP SCRIPTS -->
<script type="text/javascript"  src="{{asset("assets/admin")}}/assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script type="text/javascript"  src="{{asset("assets/admin")}}/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script type="text/javascript"  src="{{asset("assets/admin")}}/assets/js/custom.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>

