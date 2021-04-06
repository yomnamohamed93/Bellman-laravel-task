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
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="fa fa-shopping-cart"></i>
            </span>
                <h3 class="kt-portlet__head-title">
                     {{__($controller_name)}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        <a href="{{route("shops.create")}}" class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i>{{__("Add New")}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @include('layouts.partials.flash-message')
            <table class="table table-striped- table-bordered table-hover table-checkable" id="admins_datatable">
                <thead>
                <tr>
                    <th>{{__("Logo")}}</th>
                    <th>{{__("ID")}}</th>
                    <th>{{__("Name")}}</th>
                    <th>{{__("Email")}}</th>
                    <th>{{__("Website")}}</th>
                    <th>{{__("Creation date")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><img src="{{$item->getLogoPathAttribute()}}" width="60"></td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email??"---"}}</td>
                        <td>{{$item->website??"---"}}</td>
                        <td>{{$item->getFormattedCreationDate()}}</td>
                        <td>
                            <div class="row mx-auto">
                                <a href="{{route("shops.edit",$item->id)}}" class="text-info mx-2" style="">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form class="delete_form" action="{{route("shops.destroy",$item->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="delete_btn btn btn-sm text-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $items->links() }}
            </div>
        </div>
    </div>


    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="delete_msg" value="{{__("Are you sure you want to delete this item?")}}">



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
