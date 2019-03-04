<ul class="nav navbar-nav margin-bottom-35">
    <li class="@yield('crmHome')">
        <a href="/crm">
            <i class="icon-home"></i> Home </a>
    </li>
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ACCOUNTS_GETALLCUSTOMER))
        <li class="@yield('crmAccount')">
            <a href="/crm/account/client">
                <i class="icon-list"></i> Clients </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ACCOUNTS_GETALLLEAD))
        <li class="@yield('crmAccountLead')">
            <a href="/crm/account/prospect">
                <i class="icon-list"></i> Prospects </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_VISITCALLS_GETVISIT))
        <li class="@yield('crmVisit')">
            <a href="/crm/visits">
                <i class="fa fa-bus"></i> Visit </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_VISITCALLS_GETCALLS))
        <li class="@yield('crmCalls')">
            <a href="/crm/calls">
                <i class="fa fa-phone"></i> Calls </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_CALENDAR_INDEX))
        <li class="@yield('crmCalendar')">
            <a href="/crm/calendar">
                <i class="icon-calendar "></i> Calendar </a>
        </li>
    @endif

    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_FEEDS_INDEX))
        <li class="@yield('crmFeeds')">
            <a href="/crm/feeds">
                <i class="icon-list"></i> Feeds </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_NOTES_INDEX))
        <li class="@yield('crmNotes')">
            <a href="/crm/notes">
                <i class="icon-book-open"></i> Notes </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_MESSAGE_INDEX))
        <li class="@yield('crmMessages')">
            <a href="/crm/message">
                <i class="icon-anchor"></i> Message </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_DOCUMENTS_INDEX))
        <li class="@yield('crmDocuments')">
            <a href="/crm/documents">
                <i class="icon-folder"></i> Documents </a>
        </li>
    @endif
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_TRANSACTIONS_GETALL))
        <li class="@yield('crmTransaction')">
            <a href="/crm/transaction">
                <i class="icon-list"></i> Transactions </a>
        </li>
    @endif

</ul>
