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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<!-- Steps JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery-steps@1.1.0/build/jquery.steps.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>

