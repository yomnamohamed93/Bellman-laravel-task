
@extends('layouts.admin-login')
@section('header')
    @include('layouts.partials.login-header')
@endsection
@section('content')
 	<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('app-assets/media/bg/bg-1.jpg')}});">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img width="80" src="{{asset('assets/images/logo.png')}}">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">{{__("Admin Login")}}</h3>
                                </div>
                                @include('layouts.partials.flash-message')

								<form class="kt-form validate-form" method="POST"  action="{{ route('admin.login') }}">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <div class="input-group">
										<input class="form-control validate[required] email-validate" type="text" placeholder="{{__("Email Address")}}" name="email" value="{{ old('email') }}">
									</div>
									<div class="input-group">
										<input class="form-control validate[required] password-input" type="password" name="password" placeholder="{{__('Enter Password')}}" >
									</div>
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember_me"> {{__("Remember me")}}
												<span></span>
											</label>
										</div>

                                    </div>
                                    <div class="kt-login__actions">
										<button id="kt_login_signin_submit" type="submit" class="btn btn-pill kt-login__btn-primary">{{__("Login")}}</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('footer')
    @include('layouts.partials.login-footer')
@endsection

