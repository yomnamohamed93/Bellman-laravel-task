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
                            {{__("Add user")}}
                        </h3>
                    </div>
                </div>
            @include('layouts.partials.flash-message')
            <!--begin::Form-->
                <form id="add-user-form" class="validate-form kt-form" method="POST"
                      action="{{ route('users.store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="row">
                                <div class="col-6">
                                    {{ BsForm::text('first_name')->attribute('class','form-control validate[required]')->label(__("First Name")) }}
                                </div>
                                <div class="col-6">
                                    {{ BsForm::text('last_name')->attribute('class','form-control validate[required]')->label(__("Last Name")) }}
                                </div>
                                <div class="col-6">
                                    {{ BsForm::email('email')->attribute('id','user-email')->attribute('class','form-control validate[required]')->label(__("Email")) }}
                                  <div class="col-xs-2" id="email-hint-result"
                                         style="color:red;display:none;margin:-15px 15px 15px;">{{__("Email already exists")}}
                                  </div>
                                </div>
                                <div class="col-6">
                                    {{ BsForm::text('phone')->attribute('id','user-phone')->attribute('class','form-control validate[required]')->label(__("Phone")) }}
                                    <div class="col-xs-2" id="phone-hint-result"
                                         style="color:red;display:none;margin:-15px 15px 15px;">{{__("Phone number already exists")}}
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{ BsForm::password('password')->attribute('class','form-control validate[required]')->attribute('id','password')->label(__("Password")) }}
                                </div>
                                <div class="col-6">
                                    {{ BsForm::password('confirm_password')->attribute('class','form-control validate[required,equals[password]]')->label(__("Confirm password")) }}
                                </div>
                                <div class="form-group col-6">
                                    <label for="category-image">{{__("Avatar")}}</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" readonly placeholder="{{__("Browse…")}}"
                                                   class="custom-file-input" id="user-avatar">
                                            <label class="custom-file-label"
                                                   for="inputGroupFile01">{{__("Browse…")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2" id="img-hint-result"
                                         style="color:red;display:none;margin:3px 10px;">{{__("Required Image")}}</div>
                                    <div class="text-center">
                                        <img width="50%" class="uploaded-img mt-2" src="" id='category-img-upload'/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
                            <a href="{{route("users.index")}}" class="btn btn-secondary">{{__("Back")}}</a>
                        </div>
                    </div>
                </form>

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
