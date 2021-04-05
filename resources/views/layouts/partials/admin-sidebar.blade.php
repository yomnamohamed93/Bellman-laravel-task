<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class="nav-item @if($controller=='AdminDashboardController') active @endif">
            <a href="{{route('admin.dashboard')}}"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Dashboard")}}</span></a>
        </li>
        @if(has_access('CategoriesController','index') || has_access('CategoriesController','add') )
        <li class="nav-item has-sub @if(strpos(request()->url(),'categories')!== false)) open @endif">
            <a href="{{route('categories.index')}}"><i class="icon-sitemap"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Categories")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('CategoriesController','index'))
                    <li class="is-shown @if($controller=='CategoriesController' && in_array($action,array('index'))) active @endif"><a href="{{route('categories.index')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Categories")}}</a></li>
                @endif
                @if(has_access('CategoriesController','add'))
                    <li class="is-shown @if($controller=='CategoriesController' && in_array($action,array('create'))) active @endif"><a href="{{route('categories.create')}}" data-i18n="nav.dash.main" class="menu-item">{{__("New Category")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if(has_access('CitiesController','index') || has_access('CitiesController','add') )
        <li class="nav-item has-sub @if(strpos(request()->url(),'cities')!== false)) open @endif">
            <a href="{{route('cities.index')}}"><i class="icon-map-marker"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Cities")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('CitiesController','index'))
                     <li class="is-shown @if($controller=='CitiesController' && in_array($action,array('index'))) active @endif"><a href="{{route('cities.index')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Cities")}}</a></li>
                @endif
                @if(has_access('CitiesController','add'))
                    <li class="is-shown @if($controller=='CitiesController' && in_array($action,array('create'))) active @endif"><a href="{{route('cities.create')}}" data-i18n="nav.dash.main" class="menu-item">{{__("New City")}}</a></li>
                @endif
                 </ul>
        </li>
    @endif
    @if(has_access('RegionsController','index') || has_access('RegionsController','add') )
        <li class="nav-item has-sub @if(strpos(request()->url(),'regions')!== false)) open @endif">
            <a href="{{route('districts.index')}}"><i class="icon-map-signs"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Districts")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('DistrictsController','index'))
                    <li class="is-shown @if($controller=='DistrictsController' && in_array($action,array('index'))) active @endif"><a href="{{route('regions')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Districts")}}</a></li>
                @endif
                @if(has_access('DistrictsController','add'))
                    <li class="is-shown @if($controller=='DistrictsController' && in_array($action,array('create'))) active @endif"><a href="{{route('districts.create')}}" data-i18n="nav.dash.main" class="menu-item">{{__("New District")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if(has_access('RequestsController','coupons') || has_access('RequestsController','providerRegistration') )
        <li class="nav-item has-sub @if(strpos(request()->url(),'requests')!== false)) open @endif">
            <a href="{{route('admin.providerRegistrationRequests')}}"><i class="icon-question-circle-o"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Requests")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('RequestsController','providerRegistration') )
                    <li class="is-shown @if($controller=='RequestsController' && in_array($action,array('providerRegistration'))) active @endif"><a href="{{route('admin.providerRegistrationRequests')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Registration Requests")}}</a></li>
                @endif
                @if(has_access('RequestsController','coupons') )
                    <li class="is-shown @if($controller=='RequestsController' && in_array($action,array('coupons'))) active @endif"><a href="{{route('admin.couponsRequests')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Coupons Requests")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if(has_access('ServiceProvidersController','index') || has_access('ServiceProvidersController','blackList'))
        <li class="nav-item has-sub @if($controller=='ServiceProvidersController' && in_array($action,array('index'))) open @endif">
            <a href="{{route('admin.ServiceProvidersList')}}"><i class="icon-users2"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Service Providers")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('ServiceProvidersController','index'))
                    <li class="is-shown @if($controller=='ServiceProvidersController' && in_array($action,array('index'))) active @endif"><a href="{{route('admin.ServiceProvidersList')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Service Providers")}}</a></li>
                @endif
                @if(has_access('ServiceProvidersController','blackList'))
                    <li class="is-shown @if($controller=='ServiceProvidersController' && in_array($action,array('blackList'))) active @endif"><a href="{{route('admin.ServiceProvidersBlackList')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Black List")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if(has_access('UsersController','index') || has_access('UsersController','blackList'))
        <li class="nav-item has-sub @if($controller=='UsersController' && in_array($action,array('index','blackList'))) open @endif">
            <a href="{{route('admin.customersList')}}"><i class="icon-users3"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Customers")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('UsersController','index'))
                    <li class="is-shown @if($controller=='UsersController' && in_array($action,array('index'))) active @endif"><a href="{{route('admin.customersList')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Customers")}}</a></li>
                @endif
                @if(has_access('UsersController','index'))
                    <li class="is-shown @if($controller=='UsersController' && in_array($action,array('blackList'))) active @endif"><a href="{{route('admin.customersBlackList')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Black List")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if($logged_admin->is_super==1)
        <li class="nav-item has-sub @if(strpos(request()->url(),'adminUsers')!== false)) open @endif">
            <a href="{{route('adminUsers.index')}}"><i class="icon-user-tie"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Administrators")}}</span></a>
            <ul class="menu-content" style="">
                <li class="is-shown @if($controller=='AdminUsersController' && in_array($action,array('index'))) active @endif"><a href="{{route('adminUsers.index')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Administrators")}}</a></li>
                <li class="is-shown @if($controller=='AdminUsersController' && in_array($action,array('create'))) active @endif"><a href="{{route('adminUsers.create')}}" data-i18n="nav.dash.main" class="menu-item">{{__("New Administrator")}}</a></li>
            </ul>
        </li>
    @endif
    @if(has_access('AdsController','index') || has_access('AdsController','add'))
        <li class="nav-item has-sub @if(strpos(request()->url(),'ads')!== false)) open @endif">
            <a href="{{route('ads.index')}}"><i class="icon-bullhorn2"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Advertisement")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('AdsController','index'))
                    <li class="is-shown @if($controller=='AdsController' && in_array($action,array('index'))) active @endif"><a href="{{route('sliders')}}" data-i18n="nav.dash.main" class="menu-item">{{__("Advertisement")}}</a></li>
                @endif
                @if(has_access('AdsController','add'))
                    <li class="is-shown @if($controller=='AdsController' && in_array($action,array('create'))) active @endif"><a href="{{route('ads.create')}}" data-i18n="nav.dash.main" class="menu-item">{{__("New Advertising")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if(has_access('ServiceProvidersController','subscriptions'))
        <li class=" @if($controller=='ServiceProvidersController' && in_array($action,array('subscriptions'))) active @endif nav-item"><a href="{{route('admin.providersSubscriptions')}}"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Subscriptions")}}</span></a></li>
    @endif
    @if(has_access('NotificationsController','sendNotifications'))
        <li class=" @if($controller=='NotificationsController' && in_array($action,array('showNotificationForm'))) active @endif nav-item"><a href="{{route('admin.notifications')}}"><i class="icon-bell3"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Notifications")}}</span></a></li>
    @endif
    @if(has_access('MessagesController','index'))
        <li class=" @if($controller=='MessagesController' && in_array($action,array('index'))) active @endif nav-item"><a href="{{route('admin.messages')}}"><i class="ficon icon-mail6"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Messages")}}</span></a></li>
    @endif
    @if(has_access('SettingController','updateSettings'))
        <li class="@if($controller=='SettingController' && in_array($action,array('showSettingsForm'))) active @endif nav-item"><a href="{{route('admin.settings')}}"><i class="icon-cog2"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Settings")}}</span></a></li>
    @endif
    @if(has_access('ReportsController','customers') || has_access('ReportsController','serviceProviders') || has_access('ReportsController','offers') || has_access('ReportsController','sales') )
        <li class="nav-item has-sub @if(strpos(request()->url(),'reports')!== false)) open @endif">
            <a href="{{route('admin.ServiceProvidersReport')}}"><i class="icon-bar-chart"></i><span data-i18n="nav.dash.main" class="menu-title">{{__("Reports")}}</span></a>
            <ul class="menu-content" style="">
                @if(has_access('ReportsController','serviceProviders') )
                    <li class="is-shown @if($controller=='ReportsController' && in_array($action,array('serviceProviders'))) active @endif"><a href="{{route('admin.ServiceProvidersReport')}}" data-i18n="nav.dash.main" class="menu-item"><i class="icon-users2"></i>{{__("Service Providers Reports")}}</a></li>
                @endif
                @if(has_access('ReportsController','offers') )
                    <li class="is-shown @if($controller=='ReportsController' && in_array($action,array('offers'))) active @endif"><a href="{{route('admin.offersReport')}}" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ticket2"></i>{{__("Sold Coupons Reports")}}</a></li>
                @endif
                @if(has_access('ReportsController','customers') )
                    <li class="is-shown @if($controller=='ReportsController' && in_array($action,array('customers'))) active @endif"><a href="{{route('admin.customersReport')}}" data-i18n="nav.dash.main" class="menu-item"><i class="icon-users3"></i>{{__("Customers Reports")}}</a></li>
                @endif
                @if(has_access('ReportsController','sales') )
                    <li class="is-shown @if($controller=='ReportsController' && in_array($action,array('sales'))) active @endif"><a href="{{route('admin.salesReport')}}" data-i18n="nav.dash.main" class="menu-item"><i class="icon-money"></i>{{__("Sales Reports")}}</a></li>
                @endif
            </ul>
        </li>
    @endif
</ul>

