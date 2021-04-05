<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
 <!--begin::Global Theme Bundle(used by all pages) -->
 <script src="{{asset('app-assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset('app-assets/js/scripts.bundle.js')}}" type="text/javascript"></script>--}}

{{--jquery validation engine--}}
<script src="{{ asset('assets/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>
@if(app()->getLocale()=="ar")
    <script src="{{ asset('assets/js/languages/jquery.validationEngine-ar.js')}}" type="text/javascript" charset="utf-8"></script>
@else
    <script src="{{ asset('assets/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
@endif
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>

<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>
