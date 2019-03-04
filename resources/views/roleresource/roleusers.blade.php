@extends('shared.layout')
@section('title', 'Roles')
@section('navSelectedADMIN','active open selected')
@section('navSelectedRoles','active')

@section("content")
    <section ng-controller="roleResourceController">
        <div style="min-height: 440px;" class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
                <h1>Role Resources</h1>
                <div class="clearfix"></div>
                <ol class="breadcrumb">
                    <li>
                        <a href="/crm">Home</a>
                    </li>
                    <li>
                        <a href="/admin/roles">Roles</a>
                    </li>
                    <li class="active">
                        Role users
                    </li>

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
                        <a href="javascript:void(0);"  class="btn btn-primary showCreateRoleModal"><i class="fa fa-plus-circle"></i> Add User</a>
                        <br/>
                        <br/>
                        <!-- BEGIN PAGE BASE CONTENT -->
                        <div class="table-responsive">
                            <div class="well">
                                <h1>Users in {{$role}}</h1>
                            </div>
                            @if(count($viewData))
                                <table class="table table-bordered" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th class="actions">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $serial=1;
                                    ?>
                                    @foreach($viewData as $item)
                                        <tr>
                                            <td>{{$serial}}</td>
                                            <td>{{$item['FirstName']}}</td>
                                            <td>{{$item['LastName']}}</td>
                                            <td>{{$item['Email']}}</td>
                                            <td>{{$item['CreatedDate']}}</td>
                                            <td class="actions">
                                                <form action="/admin/roleremoveuser" class="form-horizontal form-inline" method="post">
                                                    <input type="hidden"  name="role_id" value="{{$role_id}}"/>
                                                    <input type="hidden"  name="user_id" value="{{$item['Id']}}"/>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this record?');"><i class="fa fa-trash"></i> Remove user</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                        $serial++;
                                        ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="well">
                                    <p>No users in this role. Make sure you are connected to the internet.</p>
                                </div>
                            @endif
                        </div>
                        <!-- END PAGE BASE CONTENT -->
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
        <section id="createRoleModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add User To Role</h4>
                    </div>
                    <div class="modal-body">
                        <form name="createRoleForm" action="/admin/addusertorole" method="post"  class="form-horizontal">
                            <article class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name of user:</label>
                                    @verbatim
                                     <input class="form-control" ng-model="searchUserField" placeholder="Type name of user" ng-keyup="searchListOfUsers();" />
                                    <article class="list-group search-list-group" ng-show="searchWrapperVisible">
                                        <a class="list-group-item user-info-unit" ng-repeat="user in users" ng-click="addUser(user.id,user.name);">{{user.name}}</a>
                                        <input type="hidden" name="user_id" ng-model="user_id" value="{{id}}"/>
                                    </article>
                                    <article class="list-group search-list-group" ng-show="noResultFound">
                                        <div class="list-group-item user-info-unit"><i class="fa fa-cloud fa-2x"></i> No match found for your search</div>
                                    </article>
                                    @endverbatim
                                    <input type="hidden"  name="role_id" value="{{$role_id}}"/>
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

    </section>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/roleResourceController.js')}}'></script>
@endsection
