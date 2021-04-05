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

            {{ BsForm::patch(route('admins.update',$item->id),['id'=>'edit-admin-form','class'=>'validate-form kt-form']) }}
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="row">
                            <div class="col-6">
                                {{ BsForm::text('name')->attribute('class','form-control validate[required]')->label(__("Name"))->value($item->name) }}
                            </div>
                            <div class="col-6">
                                {{ BsForm::email('email')->attribute('class','form-control validate[required]')->label(__("Email"))->value($item->email) }}
                            </div>
                            <div class="col-6">
                                {{ BsForm::password('password')->attribute('class','form-control')->attribute('id','password')->label(__("Password")) }}
                            </div>
                            <div class="col-6">
                                {{ BsForm::password('confirm_password')->attribute('class','form-control validate[equals[password]]')->label(__("Confirm password")) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions row">
                        {{ BsForm::submit(__("Submit"))->attribute('class','btn btn-primary mx-1') }}
                        <div class="form-group mx-1">
                            <a href="{{route("admins.index")}}" class="btn btn-secondary">{{__("Back")}}</a>
                        </div>
                    </div>
                </div>
            {{ BsForm::close() }}

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
