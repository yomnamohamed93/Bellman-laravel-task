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
                            {{__("Edit user")}}
                        </h3>
                    </div>
                </div>
            @include('layouts.partials.flash-message')
            <!--begin::Form-->
                <form id="edit-user-form" class="validate-form kt-form" method="POST"
                      action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    {{ method_field('PATCH') }}

                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="row">
                                <div class="col-6">
                                    {{ BsForm::text('first_name')->attribute('class','form-control validate[required]')->label(__("First Name"))->value($user->first_name) }}
                                </div>
                                <div class="col-6">
                                    {{ BsForm::text('last_name')->attribute('class','form-control validate[required]')->label(__("Last Name"))->value($user->last_name) }}
                                </div>
                                <div class="col-6">
                                    {{ BsForm::email('email')->attribute('class','form-control validate[required]')->attribute('data-item-id',$user->id)->attribute('id','user-email')->label(__("Email"))->value($user->email) }}
                                    <div class="" id="email-hint-result"
                                         style="color:red;display:none;margin:-15px 15px 15px;">{{__("Email already exists")}}
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{ BsForm::text('phone')->attribute('class','form-control validate[required]')->attribute('data-item-id',$user->id)->attribute('id','user-phone')->label(__("Phone"))->value($user->phone) }}
                                    <div class="" id="phone-hint-result"
                                         style="color:red;display:none;margin:-15px 15px 15px;">{{__("Phone number already exists")}}
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="category-image">{{__("Image")}}</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" readonly
                                                   placeholder="{{__("Browse…")}}" class="custom-file-input"
                                                   id="user-avatar">
                                            <label class="custom-file-label"
                                                   for="inputGroupFile01">{{__("Browse…")}}</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2" id="img-hint-result"
                                         style="color:red;display:none;margin:3px 10px;">{{__("Required Image")}}</div>
                                    <div class="text-center image-container">
                                        <img width="50%" class="uploaded-img mt-2" src="{{ $user->avatar_url }}"
                                             id='user-img-upload'/>
                                        @if($user->avatar)
                                            <div class="col-lg-2">
                                                <button type="button" class="btn font-weight-bold btn-danger btn-icon"
                                                        data-toggle="modal" data-target="#deleteImageModal">
                                                    <i class="la la-remove"></i>
                                                </button>

                                            </div>
                                        @endif
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

    <!-- Modal-->
    <div class="modal fade" id="deleteImageModal" data-backdrop="static"
         tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">{{ __('delete Image') }}</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__("Are you sure you want to delete this image?")}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button"
                            class="btn btn-danger font-weight-bold remove-image"
                            data-url="{{ route('users.deleteImage', $user) }}"
                            data-method="get">{{ __('Delete Image') }}
                    </button>
                </div>
            </div>
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
