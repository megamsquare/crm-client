<ul class="nav navbar-nav margin-bottom-35">
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
        <li class="@yield('adminApp')">
        <a href="/admin/roles">
            <i class="icon-note "></i> Roles </a>
    </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_RESOURCES))
    <li class="@yield('adminResource')">
        <a href="/admin/resources">
            <i class="icon-list"></i> Resources </a>
    </li>
    @endif
        @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_MENU_INDEX))
    <li class="@yield('adminMenu')">
        <a href="/admin/menu">
            <i class="icon-list"></i> Menus </a>
    </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_REFRESHRESOURCES))
        <li class="@yield('adminRefreshResources')">
            <a href="/admin/refreshResources" onclick="alert('Are you sure you want to refresh resources? You will be logged out automatically.');">
                <i class="icon-list"></i> Refresh Resources
            </a>
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
                <i class="fa fa-building"></i> Departments </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_UNIT_INDEX))
        <li class="@yield('adminUnits')">
            <a href="/admin/units">
                <i class="icon-hourglass"></i> Units </a>
        </li>
    @endif
</ul>
