<!-- BEGIN HEADER -->
    <nav class="navbar mega-menu" role="navigation">
        <div class="container-fluid">
            <div class="clearfix navbar-fixed-top">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                </button>
                <!-- End Toggle Button -->
                <!-- BEGIN LOGO -->
                <a id="index" class="page-logo" href="">
                    <img src="{{asset('assets/layouts/layout5/img/logo.png')}}" alt="Logo"> </a>
                <!-- END LOGO -->

                <!-- BEGIN TOPBAR ACTIONS -->
                <div class="topbar-actions">
                    <!-- BEGIN GROUP NOTIFICATION -->
                  {{--  <div class="btn-group-notification btn-group" id="header_notification_bar">
                        <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge">7</span>
                        </button>
                        <ul class="dropdown-menu-v2">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="#">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success md-skip">
                                                                <i class="fa fa-plus"></i>
                                                            </span> New user registered. </span>
                                            <span class="time">just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Server #12 overloaded. </span>
                                            <span class="time">3 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning md-skip">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> Server #2 not responding. </span>
                                            <span class="time">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info md-skip">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> Application error. </span>
                                            <span class="time">14 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Database overloaded 68%. </span>
                                            <span class="time">2 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> A user IP blocked. </span>
                                            <span class="time">3 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning md-skip">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> Storage Server #4 not responding dfdfdfd. </span>
                                            <span class="time">4 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info md-skip">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> System Error. </span>
                                            <span class="time">5 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger md-skip">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Storage server failed. </span>
                                            <span class="time">9 days</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>--}}
                    <!-- END GROUP NOTIFICATION -->
                    <!-- BEGIN USER PROFILE -->
                    <div class="btn-group-img btn-group">
                        <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span>Hi, {{session('userinfo')['firstname'].' '.session('userinfo')['lastname']}}</span>
                            @if(file_exists(public_path().'/assets/layouts/layout5/img/'.session('userinfo')['passport']))
                            <img src="{{asset('/assets/layouts/layout5/img/'.session('userinfo')['passport'])}}" alt="{{session('userinfo')['firstname'].' '.session('userinfo')['lastname']}}">
                                @else
                                <img class="img-responsive img-circle img-thumbnail" src="{{asset('/assets/layouts/layout5/img/defaultImg.png')}}" alt="{{session('userinfo')['firstname'].' '.session('userinfo')['lastname']}}">
                            @endif
                        </button>
                        <ul class="dropdown-menu-v2" role="menu">
                            <li>
                                <a href="/admin/user/profile">
                                    <i class="icon-user"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="/admin/user/profile#change_password">
                                    <i class="icon-lock"></i> Change Password
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-rocket"></i> My Tasks
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="/logout">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END USER PROFILE -->
                </div>
                <!-- END TOPBAR ACTIONS -->
            </div>
            <!-- BEGIN HEADER MENU -->
            <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-fw dropdown-fw-disabled @yield("navSelectedHome")">
                        <a href="/" class="text-uppercase">
                            <i class="icon-home"></i> Home </a>
                    </li>
                @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ACCOUNTS_INDEX) ||
                \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_CALENDAR_INDEX) ||
                \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_COMPANY_INDEX) ||
                \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_DEPARTMENT_INDEX) ||
               \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_FEEDS_INDEX) ||
               \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_UNIT_INDEX))
                    <li class="dropdown dropdown-fw dropdown-fw-disabled @yield("navSelectedCRM")">
                        <a href="/crm">
                            <i class="icon-user"></i> C.R.M. </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="@yield('crmHome')">
                                <a href="/crm">
                                    <i class="icon-home"></i> Home </a>
                            </li>
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ACCOUNTS_INDEX))
                            <li class="@yield('crmAccount')">
                                <a href="/crm/account">
                                    <i class="icon-list"></i> Clients</a>
                            </li>
                            @endif
                                @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_CALENDAR_INDEX))
                                    <li class="@yield('crmCalendar')">
                                <a href="/crm/calendar">
                                    <i class="icon-calendar "></i> Calendar</a>
                            </li>
                            @endif

                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_FEEDS_INDEX))
                            <li class="@yield('crmFeeds')">
                                <a href="/crm/feeds">
                                    <i class="icon-list"></i> Feeds</a>
                            </li>
                            @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_NOTES_INDEX))
                            <li class="@yield('crmNotes')">
                                <a href="/crm/notes">
                                    <i class="icon-book-open"></i> Notes</a>
                            </li>
                            @endif

                        </ul>
                    </li>
                    @endif
                    {{--<li class="dropdown dropdown-fw dropdown-fw-disabled  ">
                        <a href="javascript:;" class="text-uppercase">
                            <i class="icon-puzzle"></i> PMS </a>
                    </li>
                    <li>
                        <a href="user">
                            <i class="icon-users"></i> HRM </a>
                    </li>--}}
                   {{-- <li  class="dropdown dropdown-fw dropdown-fw-disabled @yield("navSelectedFinance")">
                        <a href="/finance">
                            <i class="fa fa-money"></i> Finance </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="@yield('crmBudget')">
                                <a href="/finance/budget">
                                    <i class="icon-envelope-letter"></i> Budget </a>
                            </li>
                            <li class="@yield('crmCostBackAnalysis')">
                                <a href="/finance/castBackAnalysis">
                                    <i class="icon-book-open"></i> Cost back Analysis </a>
                            </li>
                            <li class="@yield('crmCostInventory')">
                                <a href="/finance/inventory">
                                    <i class="icon-list"></i> Inventory </a>
                            </li>
                        </ul>
                    </li>--}}
                    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_INDEX) ||
               \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_TICKETREPORT))
                    <li class="dropdown dropdown-fw dropdown-fw-disabled @yield("navSelectedHELPDESK")">
                        <a href="/helpdesk">
                            <i class="icon-bulb"></i> Help Desk </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="@yield('helpdesk')">
                                <a href="/helpdesk">
                                    <i class="icon-home"></i> Home </a>
                            </li>
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_INDEX))
                            <li class="@yield('helpdeskTicket')">
                                <a href="/helpdesk/ticket">
                                    <i class="icon-list"></i> Ticket </a>
                            </li>
                            @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_TICKETREPORT))
                            <li class="@yield('helpdeskReport')">
                                <a href="/helpdesk/ticketreport">
                                    <i class="icon-note "></i> Ticket Report </a>
                            </li>
                                @endif
                        </ul>
                    </li>
                    @endif
                    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_USERS_INDEX) ||
                        \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_ROLES) ||
                        \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_RESOURCES))

                    <li class="dropdown dropdown-fw dropdown-fw-disabled @yield("navSelectedADMIN")">
                        <a href="/admin">
                            <i class="icon-user"></i> ADMINISTRATOR </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="@yield('admin')">
                                <a href="/admin">
                                    <i class="icon-home"></i> Home </a>
                            </li>
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_USERS_INDEX))
                                <li class="@yield('adminUsers')">
                                    <a href="/admin/user">
                                        <i class="icon-users "></i> Users </a>
                                </li>
                            @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_ROLES))
                            <li class="@yield('crmCalendar')">
                                <a href="/admin/roles">
                                    <i class="icon-calendar "></i> Roles</a>
                            </li>
                            @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_RESOURCES))
                            <li class="@yield('adminResources')">
                                <a href="/admin/resources">
                                    <i class="fa fa-map-marker"></i> Resources </a>
                            </li>
                                @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_COMPANY_INDEX))
                                <li class="@yield('adminCompany')">
                                    <a href="/admin/company">
                                        <i class="fa fa-map-marker"></i> Company </a>
                                </li>
                            @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_DEPARTMENT_INDEX))
                                <li class="@yield('adminDepartments')">
                                    <a href="/admin/departments">
                                        <i class="fa fa-building"></i> Departments</a>
                                </li>
                            @endif
                            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_UNIT_INDEX))
                                <li class="@yield('adminUnits')">
                                    <a href="/admin/units">
                                        <i class="icon-hourglass"></i> Units</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                        @endif
                </ul>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!--/container-->
    </nav>
</header>
<!-- END HEADER -->
