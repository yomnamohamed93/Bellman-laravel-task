<head>

    <base href="">
    <meta charset="utf-8"/>
    <title>{{config('app.name')}}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link rel="stylesheet" href="{{asset('/app-assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}">

    <!--end::Page Vendors Styles -->


    @if(app()->getLocale()=="ar")
        <link rel="stylesheet" href="{{asset('/app-assets/plugins/global/plugins.bundle.rtl.css')}}">
        <link rel="stylesheet" href="{{asset('/app-assets/css/style.bundle.rtl.css')}}">
    @else
    <!--begin::Global Theme Styles(used by all pages) -->
        <link rel="stylesheet" href="{{asset('/app-assets/plugins/global/plugins.bundle.css')}}">
        <link rel="stylesheet" href="{{asset('/app-assets/css/style.bundle.css')}}">
    @endif

    <link href="{{asset('app-assets/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('app-assets/css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}"/>


    <link rel="stylesheet" href="{{asset('assets/css/validationEngine.jquery.css')}}" type="text/css"/>

    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" type="text/css"/>
    @if(app()->getLocale()=="ar")
        <link rel="stylesheet" href="{{asset('assets/css/main-rtl.css')}}" type="text/css"/>
    @endif
    <style>
        .disabled {
            opacity: 0.65;
        }
    </style>

</head>
