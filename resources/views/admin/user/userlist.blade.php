@extends('shared.layout')
@section('title', 'Users List')
@section('navSelectedADMIN','active open selected')
@section('adminUsers','active')
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
                <a href="admin">Admin</a>
            </li>
            <li class="active">User</li>
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
                   {{-- @include('shared._resourceSide')--}}
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content-col">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                  <div class="col-lg-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">User Table</span>
                                {{--<a class="btn btn-outline btn-circle btn-sm red" data-toggle="modal" href="#createUser">Add a new User</a>--}}
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn red btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> User Option
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a  href="#createUser" data-toggle="modal"><i class="fa fa-user-plus"></i> Add a new User</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="#importUsers" data-toggle="modal"><i class=" icon-users"></i> Import Users in CSV Format</a>
                                        </li>
                                        {{--<li>
                                            <a href="/crm/account/customer"><i class=" icon-layers"></i> Import Users in CSV File</a>
                                        </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="">
                                <table class="table table-light table-hover order-column" id="users_1">
                                    <thead>
                                    <tr>
                                        <th> Staff No </th>
                                        <th> First Name </th>
                                        <th> Last Name </th>
                                        <th> Email </th>
                                        <th> Username </th>
                                        {{--<th> Gender </th>--}}
                                        <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewData['items'] as $user)
                                        <tr class="odd gradeX">
                                            <td>{{$user['staffno']}}</td>
                                            <td>{{$user['firstname']}}</td>
                                            <td>{{$user['lastname']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['username']}}</td>
                                            {{--<td>
                                                @if($user['gender'] == 'm') male
                                                @elseif($user['gender'] == 'f') female
                                                @endif
                                            </td>--}}
                                            <td width="25%" class="actions">
                                                <a href="javascript:void(0);" class="edit-user btn green" data-id="{{$user['id']}}" data-firstname="{{$user['firstname']}}" data-lastname="{{$user['lastname']}}" data-email="{{$user['email']}}" data-phone="{{$user['phone']}}" data-gender="{{$user['gender']}}" data-pwd="{{$user['pwd']}}" data-staffno="{{$user['staffno']}}" data-created_date="{{$user['created_date']}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a  href="javascript:void(0);" onclick="changeAction(this);" data-toggle="modal" class="change-password btn btn-info" data-id="{{$user['id']}}"><i class="fa fa-lock"></i> Reset Password</a>
                                                <a href="/admin/user/deactivate/{{$user['id']}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                {{--<div class="btn-group form-inline">
                                                    <button type="button" class="btn green btn-outline dropdown-toggle" data-toggle="dropdown"> Option
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu action-dropdown">
                                                        <li> <a href="javascript:void(0);" class="edit-user" data-id="{{$user['id']}}" data-firstname="{{$user['firstname']}}" data-lastname="{{$user['lastname']}}" data-email="{{$user['email']}}" data-phone="{{$user['phone']}}" data-gender="{{$user['gender']}}" data-pwd="{{$user['pwd']}}" data-staffno="{{$user['staffno']}}" data-created_date="{{$user['created_date']}}"><i class="fa fa-edit"></i> Edit</a> </li>--
                                                        <li> <a href="/admin/user/password/{{$user['id']}}"><i class="fa fa-lock"></i> Change Password</a> </li>
                                                        {{--<li class="divider"></li>
                                                        <li> <a href="/admin/user/deactivate/{{$user['id']}}"><i class="fa fa-toggle-off"></i> Deactivate</a> </li>
                                                    </ul>
                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
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
<section id="changePassword" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset User Password</h4>
            </div>
            <div class="modal-body">
                <form name="passwordForm" method="post" action="">
                    <div class="form-group">
                        <label class="control-label">New Password</label>
                        <input type="text" name="new_password" class="form-control" /> </div>
                    <div class="margin-top-10">
                        <input name="submit" value="Change Password" class="btn green" type="submit">
                        <a href="javascript:;" class="btn default"> Cancel </a>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</section>
<section id="createUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a New User</h4>
            </div>
            <div class="modal-body">
                <form name="createCompanyForm" action="/admin/createuser" method="post" novalidate class="form-horizontal">
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
                            <label for="username" class="control-label">Username:</label>
                            <input id="username" class="form-control" name="username"
                                   placeholder="Username" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="control-label">Password:</label>
                            <input id="pwd" class="form-control"  name="pwd"
                                   placeholder="Password"  type="password" required>
                        </div>
                        <div class="form-group">
                            <label for="staffno" class="control-label">Staff No:</label>
                            <input id="staffno" class="form-control"  name="staffno"
                                   placeholder="Staff No"  type="text" required>
                        </div>
                        <div class="form-group">
                            <input name="submit" value="Save User" class="btn btn-primary" type="submit">
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
{{--<section id="editUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User Profile</h4>
            </div>
            <div class="modal-body">
                <form name="editForm" action="/admin/user/update_profile" method="post" novalidate class="form-horizontal">
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
                                <option value="m" selected="selected">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staffno" class="control-label">Staff No:</label>
                            <input id="staffno" class="form-control" name="staffno"
                                   placeholder="Staff No"  type="text" required>
                        </div>
                        <div class="form-group">
                            <input name="submit" value="Save Changes" class="btn btn-primary" type="submit">
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
</section>--}}
<section id="importUsers" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Multiple Users Importing CSV File</h4>
            </div>
            <div class="modal-body">
                <form name="createCompanyForm" action="/admin/user/import" method="post" novalidate class="form-horizontal" enctype="multipart/form-data">
                    <article class="col-md-12">

                        <div class="form-group">
                            <label for="usercsvFile" class="control-label">Import Users Profile in Excel CSV Format</label>
                                <input type="file" id="usercsvFile" name="usercsv">
                           <br>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"> See Excel CSV Sample Format </a>
                                    </h4>
                                </div>
                                <div id="collapse_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> First Name </th>
                                                <th> Last Name </th>
                                                <th> Username </th>
                                                <th> Email </th>
                                                <th> Phone No </th>
                                                <th> Sex </th>
                                                <th> Staff No </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td> Mark </td>
                                                <td> Otto </td>
                                                <td> makr124 </td>
                                                <td> a@b.c </td>
                                                <td> 080300000 </td>
                                                <td> male </td>
                                                <td> 12345 </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="submit" value="Import Users" class="btn btn-primary" type="submit">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users_1').DataTable( {
                "order": [[ 1, "asc" ]]
            } );
        } );
    </script>
    @parent
    <script src='{{asset('js/user.js')}}'></script>
@endsection
