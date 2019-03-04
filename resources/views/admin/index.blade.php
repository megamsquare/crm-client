@extends('shared.layout')
@section('title', 'Admin')
@section('navSelectedADMIN','active open selected')
@section('admin','active')
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
                <a href="#">Administrator</a>
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
                    @include('shared.admin.leftnav')
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content-col">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                        <div class="dashboard-stat blue">
                            <div class="visual">
                                <i class="fa fa-users fa-icon-medium"></i>
                            </div>
                            <div class="details">
                                <a href="/admin/roles">
                                <div class="number"> Roles </div>
                                <div class="desc"> Roles </div>
                                    </a>
                            </div>
                            <a class="more" href="/admin/roles"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red">
                            <div class="visual">
                                <i class="fa fa-list fa-icon-medium"></i>
                            </div>
                            <div class="details">
                                <a href="/admin/resources">
                                <div class="number"> Resources </div>
                                <div class="desc"> Resources </div>
                                    </a>
                            </div>
                            <a class="more" href="/admin/resources"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue">
                            <div class="visual">
                                <i class="fa fa-list fa-icon-medium"></i>
                            </div>
                            <div class="details">
                                <a href="/admin/menu">
                                    <div class="number"> Menu </div>
                                    <div class="desc"> Menu </div>
                                </a>
                            </div>
                            <a class="more" href="/admin/menu"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
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
<script src='{{asset('app/controllers/usersController.js')}}'></script>
@endsection
