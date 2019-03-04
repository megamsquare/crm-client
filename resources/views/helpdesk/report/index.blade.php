@extends('shared.layout')
@section('title', 'Ticket Report')
@section('navSelectedHELPDESK','active open selected')
@section('helpdeskReportTicket','active')
@section("content")
@section('styles')
    @parent
    <link href='{{asset('assets/global/plugins/select2/css/select2.min.css')}}' rel="stylesheet" type="text/css" />
    <link href='{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}' rel="stylesheet" type="text/css" />
@endsection
<div style="min-height: 440px;" class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Help Desk</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/crm">Help Desk</a>
            </li>
            <li class="active">Ticket Report </li>
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
                    @include('shared.helpdesk.leftnav')
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content-col">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body">
                                <h4>Search Report</h4>
                                <form action="/helpdesk/report" method="get" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <select id="hp_type" class="form-control" name="hp_type">
                                                <option value="0">All Open Tickets</option>
                                                <option value="1">All Close Tickets</option>
                                                <option value="2">All Request For Close Tickets</option>
                                            </select>
                                        </div>
                                        {{--<div class="form-group col-md-3">--}}
                                            {{--<input type="text" id="start_created_date" name="start_created_date" readonly class="form-control date-picker" placeholder="Click Start Date">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group col-md-3">--}}
                                            {{--<input type="text" id="end_created_date" name="end_created_date" readonly class="form-control date-picker" placeholder="Click End Date">--}}
                                        {{--</div>--}}
                                        <div class="form-group col-md-2">
                                            <input name="submit" value="Search" class="btn btn-primary" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet-body light bordered">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-default green-haze">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <div class="list-head-title-container">
                                                <h3 class="list-title uppercase">Ticket List</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-list-container list-default">
                                    <ul>
                                        @if(!empty($viewData['items']))
                                            <?php
                                            krsort($viewData['items']);
                                            //dd($viewData['items']);
                                            ?>
                                            @foreach($viewData['items'] as $feed)
                                                <li class="mt-list-item">
                                                    <div class="list-icon-container">
                                                        <a href="feeds/unfollow/{{ $feed['crmFeeds']['id'] }}" onclick="return confirm('Are you sure you want to unfollow this Ticket?');">
                                                            <i class="icon-close"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        @if($feed['crmFeeds']['status'] == '1')
                                                            <form action="/helpdesk/ticketreport/changestatus" method="post" >
                                                                <input type="hidden" value="{{$feed['crmFeeds']['id'] }}" id="helpdesk_id" name="helpdesk_id">
                                                                <input type="hidden" name="status" value="0">
                                                                <input onclick="return confirm('Are you sure you want to Open this Ticket?')" class="btn btn-circle green btn-outline" type="submit" value="OPEN Ticket">
                                                            </form>
                                                        @elseif($feed['crmFeeds']['status'] == '2')
                                                            <a href="javascript:;" class="btn btn-circle purple disabled"> CLOSE Ticket Requested </a>
                                                        @elseif($feed['crmFeeds']['status'] == '0')
                                                            <form action="/helpdesk/ticketreport/changestatus" method="post" >
                                                                <input type="hidden" value="{{$feed['crmFeeds']['id'] }}" id="helpdesk_id" name="helpdesk_id">
                                                                <input type="hidden" name="status" value="2">
                                                                <input onclick="return confirm('Are you sure you want to request for Close of this Ticket?')" class="btn btn-circle red btn-outline" type="submit" value="CLOSE Ticket">
                                                            </form>
                                                        @endif
                                                    </div>
                                                    <div class="list-datetime"> {{$feed['crmFeeds']['created_date']}} </div>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase bold">
                                                            <a href="ticketreport/chat/{{ $feed['crmFeeds']['id'] }}">{{str_limit($feed['crmFeeds']['title'],50)}}</a>
                                                        </h3>
                                                        <p><?php echo str_limit($feed['crmFeeds']['content'],90); ?>...</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
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
