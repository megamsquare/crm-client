@extends('shared.layout')
@section('title', 'Account Personnel')
@section('navSelectedCRM','active open selected')
@if($account == 'customer') @section('crmAccount','active')
    @else @section('crmAccountLead','active')
@endif
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
            <div class="page-content-col">

                <!-- BEGIN PAGE BASE CONTENT -->

                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet-body">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase"> Client Personnel List</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Client Personnel List</a>
                                                    </li>
                                                    {{--<li>
                                                        <a href="#tab_1_2" data-toggle="tab">Edit Account Personnel</a>
                                                    </li>--}}
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- Account Personnel  TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <div class="table-actions-wrapper">
                                                            <table class="table table-hover table-light">
                                                                <thead>
                                                                <tr>
                                                                    <th> ID </th>
                                                                    <th> Names</th>
                                                                    <th> Email </th>
                                                                    <th> Phone No </th>
                                                                    <th> Account Source </th>
                                                                    <th> Date Created </th>
                                                                    <th> Action </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $serial=1;
                                                                ?>
                                                                @foreach($viewData['items'] as $ap)
                                                                    <tr>
                                                                        <td>{{$serial}}</td>
                                                                        <td>{{$ap['firstname'].' '.$ap['lastname']}}</td>
                                                                        <td>{{$ap['email']}}</td>
                                                                        <td>{{$ap['phone']}}</td>
                                                                        <td>{{$ap['name']}}</td>
                                                                        <td>{{$ap['account_source']}}</td>
                                                                        <td>{{$ap['created_date']}}</td>
                                                                        <td class="actions">
                                                                            <a href="javascript:void(0);" onclick="editPersonnelAction(this);" class="btn btn-info edit-account-personnel"  data-id="{{$ap['id']}}" data-firstname="{{$ap['firstname']}}" data-lastname="{{$ap['lastname']}}" data-email="{{$ap['email']}}" data-phone="{{$ap['phone']}}" data-gender="{{$ap['gender']}}"><i class="fa fa-edit"></i> Edit</a>
                                                                            <a href="" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-remove"></i> Remove <form>
                                                                                    <input name="ap_id" value="{{$ap['id']}}" type="hidden">
                                                                                </form></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $serial++;
                                                                    ?>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- END Account Personnel TAB -->
                                                    <!-- Edit Account Personnel TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="firstname" class="control-label">Firstname:</label>
                                                                    <input id="firstname" class="form-control" name="firstname"
                                                                           placeholder="Firstname" type="text" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lastname" class="control-label">Lasname:</label>
                                                                    <input id="lastname" class="form-control" name="lastname"
                                                                           placeholder="Lasname" type="text" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email" class="control-label">Preferred Email:</label>
                                                                    <input id="email" class="form-control"  name="email"
                                                                           placeholder="Preferred Email"  type="text" ng-model="email" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="phone" class="control-label">Phone No:</label>
                                                                    <input id="phone" class="form-control"  name="phone"
                                                                           placeholder="Phone"  type="text" ng-model="phone" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gender" class="control-label">Gender:</label>
                                                                    <select name="gender" id="gender" class="form-control" required>
                                                                        <option value="m">Male</option>
                                                                        <option value="f">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END Edit Account Personnel TAB -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- END SAMPLE TABLE PORTLET-->



                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
<section id="editAccountPersonnel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Account Personnel Details</h4>
            </div>
            <div class="modal-body">
                <form name="editForm" action="/crm/account/editpersonnel" method="post" class="form-horizontal">
                    <input id="user_id" class="form-control" name="user_id" value="1" type="hidden" >
                    <input id="account_id" class="form-control" name="acctid" value="" type="hidden" >
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="firstname" class="control-label">Firstname:</label>
                            <input id="firstname" class="form-control" name="firstname"
                                   placeholder="Firstname" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="control-label">Lasname:</label>
                            <input id="lastname" class="form-control" name="lastname"
                                   placeholder="Lasname" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Preferred Email:</label>
                            <input id="email" class="form-control"  name="email"
                                   placeholder="Preferred Email"  type="text" ng-model="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">Phone No:</label>
                            <input id="phone" class="form-control"  name="phone"
                                   placeholder="Phone"  type="text" ng-model="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="control-label">Gender:</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="submit" value="Save Account Personnel" class="btn btn-primary" type="submit">
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
@endsection
@section('scripts')
    @parent
    <script src='{{asset('js/account.js')}}'></script>
    <script src='{{asset('assets/pages/scripts/form-wizard.min.js')}}' type="text/javascript"></script>
@endsection
