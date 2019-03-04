@extends('shared.layout')
@section('title', 'Ticket')
@section('navSelectedHELPDESK','active open selected')
@section('helpdeskReport','active')
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
                                    ksort($viewData['items']);
                                    //dd($viewData['items']); 
                                    ?>
                                    @foreach($viewData['items'] as $feed)
                                    <li class="mt-list-item">
                                        <div class="list-icon-container">
                                            <a href="feeds/unfollow/{{ $feed['id'] }}" onclick="return confirm('Are you sure you want to unfollow this Ticket?');">
                                                <i class="icon-close"></i>
                                            </a>
                                        </div>
                                        <div class="col-xs-2">
                                        @if($feed['status'] == '1')
                                          <form action="/helpdesk/ticketreport/changestatus" method="post" >
                                            <input type="hidden" value="{{$feed['id'] }}" id="helpdesk_id" name="helpdesk_id">
                                            <input type="hidden" name="status" value="0">
                                            <input onclick="return confirm('Are you sure you want to Open this Ticket?')" class="btn btn-circle green btn-outline" type="submit" value="OPEN Ticket">
                                          </form>
                                        @elseif($feed['status'] == '2')
                                          <a href="javascript:;" class="btn btn-circle purple disabled"> CLOSE Ticket Requested </a>
                                        @elseif($feed['status'] == '0')
                                        <form action="/helpdesk/ticketreport/changestatus" method="post" >
                                          <input type="hidden" value="{{$feed['id'] }}" id="helpdesk_id" name="helpdesk_id">
                                          <input type="hidden" name="status" value="2">
                                          <input onclick="return confirm('Are you sure you want to request for Close of this Ticket?')" class="btn btn-circle red btn-outline" type="submit" value="CLOSE Ticket">
                                        </form>
                                        @endif
                                        </div>
                                        <div class="list-datetime"> {{$feed['created_date']}} </div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase bold">
                                                <a href="ticketreport/chat/{{ $feed['id'] }}">{{str_limit($feed['title'],50)}}</a>
                                            </h3>
                                            <p><?php echo str_limit($feed['content'],90); ?></p>
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
