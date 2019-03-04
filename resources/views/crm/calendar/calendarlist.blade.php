@extends('shared.layout')
@section('title', 'Calender List')
@section('navSelectedCRM','active open selected')
@section('crmCalendar','active')
@section("content")
<div style="min-height: 440px;" class="page-content">
    <!-- BEGIN BREADCRUMBS -->

    <div class="breadcrumbs">
        <h1>C.R.M.</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">C.R.M.</a>
            </li>
            <li class="active">Calendar</li>
        </ol>
        <!-- Sidebar Toggle Button -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
        </button>
        <!-- Sidebar Toggle Button -->
    </div>
    <!-- END BREADCRUMBS -->
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
        <div class="page-content-row">
            <!-- BEGIN PAGE SIDEBAR -->
            <div class="page-sidebar">
                <nav class="navbar" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    @include('shared.crm.leftnav')
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content-col">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit bordered calendar">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <!-- BEGIN DRAGGABLE EVENTS PORTLET-->
                                        <h3 class="event-form-title margin-bottom-20">Draggable Events</h3>
                                        <div id="external-events">
                                            <form class="inline-form">
                                                <input type="text" value="" class="form-control" placeholder="Event Title..." id="event_title" />
                                                <br/>
                                                <a href="javascript:;" id="event_add" class="btn green"> Add Event </a>
                                            </form>
                                            <hr/>
                                            <div id="event_box" class="margin-bottom-10"></div>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" for="drop-remove"> remove after drop
                                                <input type="checkbox" class="group-checkable" id="drop-remove" />
                                                <span></span>
                                            </label>
                                            <hr class="visible-xs" /> </div>
                                        <!-- END DRAGGABLE EVENTS PORTLET-->
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div id="calendar" class="has-toolbar"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('assets/pages/scripts/form-wizard.min.js')}}' type="text/javascript"></script>
@endsection
