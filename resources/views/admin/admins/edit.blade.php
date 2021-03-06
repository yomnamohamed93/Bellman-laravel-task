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
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{__("Edit administrator")}}
                        </h3>
                    </div>
                </div>
            @include('layouts.partials.flash-message')
            <!--begin::Form-->

            {!! Form::open()->route('admins.update',[$item->id])->id('edit-admin-form')->attrs(['class'=>'validate-form kt-form']) !!}
            @method('PATCH')
            <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="row">
                            <div class="col-6">
                                {!! Form::text('name')->attrs(['class'=>'form-control validate[required]'])->label(__("Name"))->value($item->name) !!}
                            </div>
                            <div class="col-6">
                                {!! Form::text('email')->type('email')->attrs(['class'=>'form-control validate[required]'])->label(__("Email"))->value($item->email) !!}
                            </div>
                            <div class="col-6">
                                {!! Form::text('password')->type('password')->attrs(['class'=>'form-control','id','password'])->label(__("Password")) !!}
                            </div>
                            <div class="col-6">
                                {!! Form::text('confirm_password')->type('password')->attrs(['class'=>'form-control confirm-password]'])->label(__("Confirm password")) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions row">
                        {!! Form::submit(__("Submit")) !!}
                        <a href="{{route("admins.index")}}" class="btn btn-secondary mx-2">{{__("Back")}}</a>
                    </div>
                </div>
            {!! Form::close() !!}

            <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>

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
