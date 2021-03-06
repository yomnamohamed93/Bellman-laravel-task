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
                            {{__("Edit shop")}}
                        </h3>
                    </div>
                </div>
            @include('layouts.partials.flash-message')
            <!--begin::Form-->

            {!! Form::open()->route('shops.update',[$item->id])->attrs(['class'=>'validate-form kt-form'])->multipart() !!}
            @method('PATCH')
            <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="row">
                            <div class="col-6">
                                {!! Form::text('name')->attrs(['class'=>'form-control validate[required]'])->label(__("Name"))->value($item->name) !!}
                            </div>
                            <div class="col-6">
                                {!! Form::text('email')->type('email')->attrs(['class'=>'form-control'])->label(__("Email"))->value($item->email) !!}
                            </div>
                            <div class="col-12">
                                {!! Form::urlInput('website',__("Website"))->attrs(['class'=>'form-control]'])->value($item->website) !!}
                            </div>
                            <div class="form-group col-12">
                                <label for="slider-image">{{__("Logo")}}</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="logo" readonly placeholder="{{__("Browse???")}}" class="custom-file-input" id="slider-image">
                                        <label class="custom-file-label" for="inputGroupFile01">{{__("Browse???")}}</label>
                                    </div>
                                </div>
                                <div class="invalid-field ml-4">Image dimentions should be at least 100??100</div>

                                <div class="text-center">
                                    <img width="50%" class="uploaded-img mt-2" src="{{$item->getLogoPathAttribute()}}" id='logo-img-upload'/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions row">
                        {!! Form::submit(__("Submit")) !!}
                        <a href="{{route("shops.index")}}" class="btn btn-secondary mx-2">{{__("Back")}}</a>
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
