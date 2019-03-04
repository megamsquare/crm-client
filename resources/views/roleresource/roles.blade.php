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
                <li class="active">
                   Roles
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
                    <a href="javascript:void(0);"  class="btn btn-primary showCreateRoleModal"><i class="fa fa-plus-circle"></i> Create Role</a>
                    <br/>
                    <br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        @if(count($viewData))
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Role name</th>
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
                                    <td>{{$item['Name']}}</td>
                                    <td>{{date("d M Y h:i:sam",strtotime($item['CreatedDate']))}}</td>
                                    <td class="actions">
                                        <a href="javascript:void(0);" class="btn btn-info edit-role" data-id="{{$item['Id']}}" data-resourcename="{{$item['Name']}}" ><i class="fa fa-edit"></i> Edit</a>
                                        <a href="/admin/roleResources?role_id={{$item['Id']}}&role={{urlencode($item['Name'])}}" class="btn btn-success"><i class="fa fa-list"></i> Resources</a>
                                        <a href="/admin/roleusers?role_id={{$item['Id']}}&role={{urlencode($item['Name'])}}" class="btn btn-warning"><i class="fa fa-list"></i> Users</a>
                                        <form action="/admin/deleteresource" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="id" value="{{$item['Id']}}"/>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</button>
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
                                <p>No roles found. Make sure you are connected to the internet.</p>
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
                    <h4 class="modal-title">Create Role</h4>
                </div>
                <div class="modal-body">
                    <form name="createRoleForm" action="/admin/createrole" method="post"  class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Role Name:</label>
                                <input id="name" class="form-control" name="name"
                                       placeholder="Role Name" type="text" required>
                            </div>
                            <div class="form-group">
                                <input name="submit" value="Save Role" class="btn btn-primary" type="submit">
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
        <section id="createRoleResourceModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Role: <strong ng-bind="role_name"></strong></h4>
                    </div>
                    <div class="modal-body">
                        <form name="createDepartmentForm" action="/admin/createRoleResource" method="post"  class="form-horizontal">
                            <article class="col-md-12">

                                <div class="form-group">
                                    <label for="company" class="control-label">Resources:</label>
                                    @verbatim
                                    <select multiple="multiple" class="multi-select"  name="Id[]" id="Id" class="form-control">
                                        <option ng-repeat="roleResource in roleResources" value="{{roleResource.Id}}">{{roleResource.Key}}</option>
                                    </select>
                                    @endverbatim
                                </div>
                                <input type="hidden" name="createdByUserId" value="1"/>
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
