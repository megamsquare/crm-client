@extends('shared.layout')
@section('title', 'Dashboard')
@section('navSelectedHome','active open selected')
@section("content")
<section class="page-content">
    <!-- BEGIN PAGE BASE CONTENT -->
    <?php
    $linkShown = false;
    ?>
    <div class="row">
        @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ACCOUNTS_INDEX) ||
                \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_CALENDAR_INDEX) ||
                \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_COMPANY_INDEX) ||
                \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_DEPARTMENT_INDEX) ||
               \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_FEEDS_INDEX) ||
               \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_UNIT_INDEX))
            <?php $linkShown = true;?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-users fa-icon-medium"></i>
                </div>
                <div class="details">
                   <a href="/crm"> <div class="number"> CRM </div>
                    <div class="desc"> A link to CRM application  </div></a>
                </div>
                <a class="more" href="/crm"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        @endif
            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_INDEX) ||
                   \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_HELPDESK_TICKETREPORT))
                <?php $linkShown = true;?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="details">
                   <a href="/helpdesk"> <div class="number"> Help Desk </div>
                    <div class="desc"> An application for complaints. </div></a>
                </div>
                <a class="more" href="/helpdesk"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
            @endif
            @if(\App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_USERS_INDEX) ||
                        \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_ROLES) ||
                        \App\Services\RoleResourceService::canAccessRoute(\App\Services\RouteAppService::CRM_ROLERESOURCE_RESOURCES))
                <?php $linkShown = true;?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-group fa-icon-medium"></i>
                </div>
                <div class="details">
                   <a href="/admin">
                       <div class="number"> Administrator </div>
                    <div class="desc"> Admin management page </div></a>
                </div>
                <a class="more" href="/admin"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
                @endif
        @if($linkShown == false)
           <section class="jumbotron">
               <div class="col-md-1">
                   <i class="fa fa-cloud fa-5x margin-top-40"></i>
               </div>
               <div class="col-md-9">
                  <h2>Sorry!!! We couldn't find a page you can access. Please contact your unit head to assign a role to your account.</h2>
               </div>
               <div class="clearfix"></div>
           </section>
            @endif
    </div>
    <!-- END PAGE BASE CONTENT -->
</section>
@endsection
