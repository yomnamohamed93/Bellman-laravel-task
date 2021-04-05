<!doctype html>
<html dir="{{app()->getLocale()=="ar"?'rtl':'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('header')
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{route('admin.dashboard')}}">
            <img alt="Logo" src="{{asset('app-assets/media/logos/logo-light.png')}}"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        @yield('sidebar')

        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @yield('navbar')
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-subheader__main">
                            <div class="kt-subheader__breadcrumbs">
                                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                @if ($controller_name=="Dashboard")
                                    <a href="{{route("admin.dashboard")}}" class="kt-subheader__breadcrumbs-link">
                                        {{__($controller_name)}} </a>
                                @else
                                    <a href="{{route(lcfirst($controller_name).".index")}}"
                                       class="kt-subheader__breadcrumbs-link text-capitalize">
                                        {{ str_replace('_',' ',__($controller_name)) }} </a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link">{{__($action)}} </a>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    @yield('content')
                </div>
            </div>
            @yield('footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
</div>
@yield('scripts')
</body>
</html>
