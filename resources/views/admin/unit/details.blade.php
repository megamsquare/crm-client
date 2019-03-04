@extends('shared.layout')
@section('title', 'Units')
@section('navSelectedADMIN','active open selected')
@section('adminUnits','active')
@section("content")
    <article ng-controller="UnitController">
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>C.R.M.</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/admin">Admin</a>
                </li>
                <li><a href="/admin/units">Units</a></li>
                <li class="active">Details</li>
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
                        @include('shared.admin.leftnav')
                    </nav>
                </div>

                <!-- END PAGE SIDEBAR -->
                <div class="page-content-col">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <article>
                        <div class="portlet red-sunglo box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-building"></i>{{$viewData['title']}} details</div>
                                <div class="actions">
                                    <a href="javascript:;" class="btn btn-default btn-sm add-user-to-unit">
                                        <i class="fa fa-user"></i> Add User </a>
                                    <a href="/crm/transaction?crm_unit_id={{$viewData['id']}}" class="btn btn-default btn-sm">
                                        <i class="fa fa-list"></i> View Transactions </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Unit: </div>
                                    <div class="col-md-7 value">{{$viewData['title']}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name">Department: </div>
                                    <div class="col-md-7 value">{{$viewData['name']}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Description: </div>
                                    <div class="col-md-7 value">{{$viewData['description']}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Created By: </div>
                                    <div class="col-md-7 value">{{$viewData['firstname']}} {{$viewData['lastname']}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Created date: </div>
                                    <div class="col-md-7 value"> {{$viewData['created_date']}} </div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"></div>
                                    <div class="col-md-7 value">
                                        <a href="javascript:;" class="btn btn-primary btn-sm add-user-to-unit">
                                            <i class="fa fa-user"></i> Add User </a>
                                        <a href="/admin/usersinunit?unit_id={{$viewData['id']}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-users"></i> View Users </a>
                                        <a href="/crm/transaction?crm_unit_id={{$viewData['id']}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-list"></i> View Transactions </a>

                                         </div>
                                </div>

                            </div>
                        </div>
                    </article>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
    <section id="addUserToUnitModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add users to Unit</h4>
                </div>
                <div class="modal-body">
                    <form name="addUserToUnitForm" action="/admin/addusertounit" method="post" class="form-horizontal">
                        <article class="col-md-12">
                            <h3>Add users to <strong>{{$viewData['title']}}</strong> unit</h3>
                            <div class="form-group">
                                <input type="hidden" name="unit_id" value="{{$viewData['id']}}" />
                                @verbatim
                                <input class="form-control" ng-model="searchField" placeholder="Type name of user to suggest" ng-keyup="getListOfSuggestedUsers();" />
                                <input type="hidden" name="user_id" ng-model="user_id" value="{{user_id}}"/>
                                <input type="hidden" name="created_by_id" value="1" />
                                <article class="list-group search-list-group" ng-show="searchWrapperVisible">
                                    <a class="list-group-item user-info-unit" ng-repeat="user in suggestedUsers" ng-click="addUser(user.id,user.fullname);">{{user.fullname}}</a>
                                </article>
                                @endverbatim
                            </div>
                            <div class="form-group">
                                <input name="submit" value="Save" class="btn btn-primary" type="submit">
                            </div>
                        </article>

                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </section>
    </article>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/companyDeptUnitController.js')}}'></script>
    <script src='{{asset('js/companyDeptUnit.js')}}'></script>
@endsection
