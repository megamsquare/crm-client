@extends('shared.layout')
@section('title', 'Account List')
@section('navSelectedCRM','active open selected')
@section('crmAccount','active')
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
            <li class="active">Account</li>
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
            <div class="page-content-col" ng-controller="GetAllAccountsController">

                <br/><br/>
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                  <div class="col-lg-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">All Customer Accounts</span>
                                <a  href="javascript:void(0);"  ng-click="createAccount()" class="btn btn-outline btn-circle btn-sm red">Add a new account</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> User</th>
                                            <th> Account </th>
                                            <th> Date Created </th>
                                            <th> Status </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @verbatim
                                    <tr ng-repeat="account in accounts" ng-init="counter=1">
                                        <td>{{counter}}</td>
                                            <td> {{createdby_id}} </td>
                                            <td> {{name}} </td>
                                            <td> {{stage}} </td>
                                            <td> {{created_date}} </td>
                                        <td class="actions">
                                            <a href="javascript:void(0);" ng-click="editCompany(account.id)" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>

                                        </td>
                                    </tr>
                                    @endverbatim
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>

                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
@endsection
