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
                <li class="active">Users</li>
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
                    <div class="table-responsive">
                        @if(!empty($viewData))
                        <h2>Users in {{$viewData[0]['title']}}</h2>
                        @endif
                            <p><a href="javascript:;" class="btn btn-primary btn-lg btn-sm add-user-to-unit">Add Users</a></p>
                            <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Staff No</th>
                                <th>Created date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            ?>
                            @if(count($viewData) > 0)
                            @foreach($viewData as $user)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$user['crmUsers']['firstname']}}
                                    @if($user['role'] == '1')
                                            <div><span class="badge badge-success" title="Unit Head">Unit Head</span></div>
                                        @endif
                                    </td>
                                    <td>{{$user['crmUsers']['lastname']}}</td>
                                    <td>{{$user['crmUsers']['email']}}</td>
                                    <td>{{$user['crmUsers']['phone']}}</td>
                                    <td>{{$user['crmUsers']['gender']}}</td>
                                    <td>{{$user['crmUsers']['staffno']}}</td>
                                    <td>{{$user['crmUsers']['created_date']}}</td>
                                    <td class="actions">
                                        @if($user['role'] == '0')
                                        <form action="/admin/makeunithead" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="user_id" value="{{$user['crmUsers']['id']}}"/>
                                            <input type="hidden"  name="unit_id" value="{{$unitId}}"/>
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-user"></i> Make unit head</button>
                                        </form>
                                        @endif
                                            <form action="/admin/removeuserinunit" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="user_id" value="{{$user['crmUsers']['id']}}"/>
                                              <input type="hidden"  name="unit_id" value="{{$unitId}}"/>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this user?');"><i class="fa fa-trash"></i> Remove user from unit</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $serial++;
                                ?>
                            @endforeach
                                @else
                                <tr>
                                    <td colspan="9"><section>
                                            <h3>No users added to this unit.</h3>
                                            <p><a href="javascript:;" class="btn btn-primary btn-lg add-user-to-unit">Add Users</a></p>
                                        </section></td>

                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
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
                            <h3>Add users to <strong>{{$viewData[0]['title']}}</strong> unit</h3>
                            <div class="form-group">
                                <input type="hidden" name="unit_id" value="{{$unitId}}" />
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
