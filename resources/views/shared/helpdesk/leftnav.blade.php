<ul class="nav navbar-nav margin-bottom-35">
    <li class="@yield('helpdesk')">
        <a href="/helpdesk">
            <i class="icon-home"></i> Home </a>
    </li>
    @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_INDEX))
    <li class="@yield('helpdeskTicket')">
        <a href="/helpdesk/ticket">
            <i class="icon-list"></i> My Ticket </a>
    </li>
    @endif
        @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_TICKETREPORT))
    <li class="@yield('helpdeskReport')">
        <a href="/helpdesk/ticketreport">
            <i class="icon-note "></i> Ticket </a>
    </li>
    @endif
    <li class="@yield('helpdeskReportTicket')">
        <a href="/helpdesk/report">
            <i class="icon-note "></i> Report </a>
    </li>
</ul>
