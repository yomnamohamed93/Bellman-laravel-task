<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">{{__('Hi')}},</span>
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">{{auth()->guard('admin')->user()->name}}</span>
                    <img class="kt-hidden" alt="Pic" src="{{asset('app-assets/media/users/300_25.jpg')}}"/>

                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                </div>
            </div>
            <div
                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                     style="background-image: url({{asset('app-assets/media/misc/bg-1.jpg')}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('app-assets/media/users/300_25.jpg')}}"/>
                    </div>
                    <div class="kt-user-card__name">
                        {{auth()->guard('admin')->user()->name}}
                    </div>
                </div>

                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <div class="kt-notification__custom kt-space-between">
                        <a href="{{route('admin.logout')}}"
                           class="btn btn-label btn-label-brand btn-sm btn-bold">
                            <i class="fas fa-sign-out-alt mr-2"></i> {{__('Sign out')}}
                        </a>
                        <form style="display: none;" action="{{ route('admin.logout') }}" method="post" id="logoutForm">
                            @csrf
                        </form>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>
    </div>

</div>

