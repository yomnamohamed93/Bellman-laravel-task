@extends('layouts.master')
@section('header')
    @include('layouts.partials.header')
@endsection
@section('navbar')
    @include('layouts.partials.nav')
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar')
@endsection
@section('content')
        <div class="row">
            <div class="col-lg-12 order-lg-1 order-xl-1">

                <!--begin:: Widgets/Finance Summary-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{__("Employees details")}}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget12">
                            <div class="kt-widget12__content">
                                <div class="kt-widget12__item">
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">{{__("Name")}}</span>
                                        <span class="kt-widget12__value">{{$item->name}}</span>
                                    </div>
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">{{__("Email")}}</span>
                                        <span class="kt-widget12__value">{{$item->email}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget12__item">
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">{{__("Phone number")}}</span>
                                        <span class="kt-widget12__value">{{$item->phone}}</span>
                                    </div>
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">{{__("Working hours")}}</span>
                                        <span class="kt-widget12__value">{{__("From").": ".$item->working_hours_from." - ".__("To").": ".$item->working_hours_to}}</span>
                                    </div>

                                </div>
                                <div class="kt-widget12__item">
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">{{__("Pharmacy")}}</span>
                                        <span class="kt-widget12__value">{{$item->pharmacy->name[app()->getLocale()]}}</span>
                                    </div>
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">{{__("Branch")}}</span>
                                        <span class="kt-widget12__value">{{$item->branch->name[app()->getLocale()]}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Finance Summary-->
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
@section('footer')
    @include('layouts.partials.footer')
@endsection
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->

@section('scripts')
    @include('layouts.partials.scripts')
@endsection
