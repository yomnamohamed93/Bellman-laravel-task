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
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <!-- ============================================================== -->
            <!-- Welcome back  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card  bg-light no-card-border">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h3 class="kt-portlet__head-title">Welcome back!</h3>
                                    <span>{{date('l jS \of F Y')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
