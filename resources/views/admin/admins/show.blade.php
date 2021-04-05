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
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{__("Dashboard")}}</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('administrators.index')}}">{{__("Administrators")}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{__("Details")}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-horizontal">
                                <div class="form-body">
                                    <div class="card-body info-header-content">
                                        <h4 class="card-title">{{__("Administrator Info")}}</h4>
                                        <div class="row">
                                            <a href="{{route("administrators.edit",$item->id )}}" class='text-info mx-2' style=''>
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form class="delete_form" action="{{ route('administrators.destroy', $item->id)}}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" id="delete_msg" value="{{__("Are you sure you want to delete this item?")}}">
                                                <button class="delete_btn btn btn-sm text-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">{{__("User Name")}}:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static"> {{$item->name}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">{{__("Email Address")}}:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static"> {{$item->email}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">{{__("Avatar")}}:</label>
                                            <div class="col-md-9">
                                                <img width="50%" class="uploaded-img mt-2" src="{{$item->avatar_url}}" id=''/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">{{__("Status")}}:</label>
                                            <div class="col-md-9">
                                                <span class="label label-@if($item->status==1){{'success'}}@else{{'danger'}}@endif">
                                                    @if($item->status==1){{__("Active")}}@else{{__("Inactive")}}@endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="{{route('administrators.index')}}" class="btn btn-dark">{{__("Back")}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
