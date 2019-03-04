@extends('shared.layout')
@section('title', 'CRM')
@section('navSelectedCRM','active open selected')
@section('crmHome','active')
@section("content")

    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>C.R.M.</h1>
            <div class="clearfix"></div>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">C.R.M</a>
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
                        @include('shared.crm.leftnav')
                    </nav>
                </div>
                <!-- END PAGE SIDEBAR -->
                <div class="page-content-col">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-briefcase fa-icon-medium"></i>
                                </div>
                                <div class="details">
                                    <a href="javascript:;">
                                        <div class="number">{{ $viewDataCustomer['totalItemsCount'] }}</div>
                                        <div class="desc"> Customers </div>
                                    </a>
                                </div>
                                <a class="more" href="javascript:;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <a href="javascript:;">
                                        <div class="number"> {{ $viewDataUser['totalUserCount'] }} </div>
                                        <div class="desc"> Users </div>
                                    </a>
                                </div>
                                <a class="more" href="javascript:;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-group fa-icon-medium"></i>
                                </div>
                                <div class="details">
                                    <a href="javascript:;">
                                        <div class="number">{{ $viewDataLead['totalItemsCount'] }} </div>
                                        <div class="desc"> Prospects </div>
                                    </a>
                                </div>
                                <a class="more" href="javascript:;"> View more
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
                                        <span class="caption-subject font-dark bold uppercase">Feeds</span>
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
                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;"><div class="scroller" style="height: 339px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                                    <ul class="feeds">
                                                        @if(!empty($responseUserFeed['items']))
                                                            @foreach ($responseUserFeed['items'] as $responseUserFeeds)
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <div class="col1">
                                                                            <div class="cont">
                                                                                <div class="cont-col1">
                                                                                    <div class="label label-sm label-success">
                                                                                        <i class="fa fa-bell-o"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cont-col2">
                                                                                    <div class="desc">{{ $responseUserFeeds['content'] }} </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col2">
                                                                            <div class="date"> 20 mins </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @endif                        </ul>
                                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 173.859px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        </div>
                                    </div>
                                    <!--END TABS-->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Members In Your Unit</span>
                                        <span class="caption-helper"><span class="badge badge-danger">{{ count($viewDataUserUnit['items']) }} people</span></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 338px;"><div class="scroller" style="height: 338px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">
                                            <div class="general-item-list">
                                                @if(!empty($viewDataUserUnit['items']))
                                                    @foreach ($viewDataUserUnit['items'] as $viewDataUserUnits)
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic rounded" src="../assets/pages/media/users/avatar4.jpg">
                                                                    <a href="#" class="item-name primary-link">{{ $viewDataUserUnits['firstname'] . ' ' . $viewDataUserUnits['lastname']}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 148.755px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
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
    {{--<script src="{{asset('assets/pages/scripts/ecommerce-dashboard.min.js')}}" type="text/javascript"></script>--}}
    <script src='{{asset('app/controllers/usersController.js')}}'></script>
@endsection