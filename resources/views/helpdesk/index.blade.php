@extends('shared.layout')
@section('title', 'Helpdesk')
@section('navSelectedHELPDESK','active open selected')
@section('helpdesk','active')
//active
@section("content")
<div style="min-height: 440px;" class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Administrator</h1>
        <div class="clearfix"></div>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Help Desk</a>
            </li>
            <li class="active">Dashboard</li>
        </ol>
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
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-bottom-10">
                        <div class="dashboard-stat blue">
                            <div class="visual">
                                <i class="fa fa-briefcase fa-icon-medium"></i>
                            </div>
                            <div class="details">
                                <a href="javascript:;">
                                <div class="number">{{count($viewData['items'])}} </div>
                                <div class="desc"> Tickets </div>
                                    </a>
                            </div>
                            <a class="more" href="/helpdesk/ticket"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red">
                            <div class="visual">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="details">
                                <a href="/helpdesk/ticketreport">
                                <div class="number"> {{count($viewDataReport['items'])}} </div>
                                <div class="desc"> Ticket Report </div>
                                    </a>
                            </div>
                            <a class="more" href="/helpdesk/ticketreport"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                     </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="icon-globe font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Recent Tickets</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" class="active" data-toggle="tab">&nbsp;</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="portlet-body">
                                <!--BEGIN TABS-->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;">
                                            <div class="scroller" style="height: 339px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                                <ul class="feeds">
                                                    @if(!empty($viewData['items']))
                                                    <?php 
                                                        ksort($viewData['items']);
                                                        //dd($viewData['items']); 
                                                        $i = 0;
                                                    ?>
                                                    @foreach($viewData['items'] as $ticket)
                                                            <?php $i++; ?>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> {{str_limit($ticket['title'],50)}}.
                                                                            <a href="helpdesk/ticket/chat/{{ $ticket['id'] }}">
                                                                                    <span class="label label-sm label-info"> View Details
                                                                                        <i class="fa fa-share"></i>
                                                                                    </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> {{ $ticket['created_date'] }} </div>
                                                            </div>
                                                        </li>
                                                        @if($i == 5)
                                                            @break;
                                                        @endif
                                                @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 173.859px;"></div>
                                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--END TABS-->
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="icon-globe font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Recent Ticket Report</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" class="active" data-toggle="tab">&nbsp;</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="portlet-body">
                                <!--BEGIN TABS-->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;">
                                            <div class="scroller" style="height: 339px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                                <ul class="feeds">
                                                    @if(!empty($viewDataReport['items']))
                                                   <?php $i = 0; ?>
                                                    @foreach($viewDataReport['items'] as $ticket)
                                                           <?php $i++; ?>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> {{str_limit($ticket['title'],50)}}.
                                                                        <a href="helpdesk/ticketreport/chat/{{ $ticket['id'] }}">
                                                                                    <span class="label label-sm label-info"> View Details
                                                                                        <i class="fa fa-share"></i>
                                                                                    </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> {{ $ticket['created_date'] }} </div>
                                                        </div>
                                                    </li>
                                                        @if($i == 5)
                                                            @break;
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 173.859px;"></div>
                                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--END TABS-->
                            </div>
                        </div>
                        <!-- END PORTLET-->
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
