<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('app-assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('app-assets/js/pages/dashboard.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->

{{--jquery validation engine--}}
<script src="{{ asset('assets/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>
@if(app()->getLocale()=="ar")
    <script src="{{ asset('assets/js/languages/jquery.validationEngine-ar.js')}}" type="text/javascript"
            charset="utf-8">
    </script>
@else
    <script src="{{ asset('assets/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript"
            charset="utf-8">
    </script>
@endif

<script src="{{ asset('assets/js/main.js')}}" type="text/javascript" charset="utf-8"></script>

@if(in_array($controller,array('CustomerController','ShopController')) && in_array($action,array('create','edit')))
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
    <script>
        new Vue({
            el: '#app'
        })
    </script>
@endif
<script type="text/javascript">
        @if( \Config::get('app.env') === "development" || \Config::get('app.env') ==="local")
    let BASE_URL = "{{ url('/') }}";
        @else
    let BASE_URL = "{{ secure_url('/') }}";
        @endif
    let backend_lang = "{{app()->getLocale()}}";
    let browse_txt = "{{__("Browse…")}}";
    let required_img_txt = "{{__("Required Image")}}";
</script>
@toastr_js
