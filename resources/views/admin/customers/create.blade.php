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
                            {{__("Add customer")}}
                        </h3>
                    </div>
                </div>
            @include('layouts.partials.flash-message')
            <!--begin::Form-->

                {!! Form::open()->method('post')->route('customers.store')->id('add-customer-form')->attrs(['class'=>'validate-form kt-form']) !!}
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="row">
                                <div class="col-6">
                                    {!! Form::text('first_name',__("First name"))->attrs(['class'=>'form-control validate[required]']) !!}
                                </div>
                                <div class="col-6">
                                    {!! Form::text('last_name',__("Last name"))->attrs(['class'=>'form-control validate[required]']) !!}
                                </div>
                                <div class="col-6">
                                    {!! Form::text('email',__("Email"))->attrs(['class'=>'form-control'])->type('email') !!}
                                </div>
                                <div class="col-6">
                                    {!! Form::tel('phone',__("Phone"))->attrs(['class'=>'form-control'])!!}
                                </div>
                                <div class="col-6">
                                    {!!Form::select('shop_id',__("Shop"))->options($shops->prepend('Select option', ''))!!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions row">
                            {!! Form::submit(__("Submit"))->attrs(['class'=>'btn btn-primary mx-1']) !!}
                            <a href="{{route("customers.index")}}" class="btn btn-secondary mx-2">{{__("Back")}}</a>

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
