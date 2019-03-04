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
                <li class="active">Units</li>
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
                <div class="page-content-col" >
                    <a href="javascript:void(0);" ng-click="getDepartments();" class="btn btn-primary showCreateUnitModal"><i class="fa fa-plus-circle"></i> Create Unit</a>
                    <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Unit</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            ?>
                            @foreach($viewData as $unit)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$unit['title']}}</td>
                                    <td>{{$unit['name']}}</td>
                                    <td>{{$unit['description']}}</td>
                                    <td>{{$unit['firstname']}} {{$unit['lastname']}}</td>
                                    <td>{{$unit['created_date']}}</td>
                                    <td class="actions">
                                        <a href="/admin/unitdetails?id={{$unit['id']}}" class="btn btn-success btn-sm" ><i class="fa fa-list"></i> Details</a>
                                        <a href="javascript:void(0);" class="btn btn-info btn-sm edit-unit" data-id="{{$unit['id']}}"
                                           data-unitname="{{$unit['title']}}" data-departmentname="{{$unit['name']}}"
                                           data-unitdescription="{{$unit['description']}}" data-departmentid="{{$unit['department_id']}}" ng-click="getDepartments('{{$unit['name']}}');"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="/admin/deleteunit" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="id" value="{{$unit['id']}}"/>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $serial++;
                                ?>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
    <section id="createUnitModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Unit</h4>
                </div>
                <div class="modal-body">
                    <form name="createUnitForm" action="/admin/createunit" method="post" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Unit Name:</label>
                                <input id="name" class="form-control" name="title"
                                       placeholder="Unit Name" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description:</label>
                           <textarea id="description" class="form-control"  name="description"
                                     placeholder="Unit Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="department" class="control-label">Department:</label>
                                @verbatim
                                <select name="crm_department_id" id="crm_department_create" class="form-control" required>
                                    <option ng-repeat="department in departments" value="{{department.id}}">{{department.name}}</option>
                                </select>
                                @endverbatim
                                <input type="hidden" name="created_by_id" value="{{session('userinfo')['id']}}"/>
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
    <section id="editUnitModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Unit</h4>
                </div>
                <div class="modal-body">
                    <form action="/admin/editunit" method="post" name="editUnitForm" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Unit Name:</label>
                                <input id="name" class="form-control" name="title"
                                       placeholder="Unit Name" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description:</label>
                           <textarea id="description" class="form-control"  name="description"
                                     placeholder="Unit Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="department" class="control-label">Department:</label>
                                @verbatim
                                <select name="crm_department_id" id="crm_department_edit" class="form-control" required>
                                    <option ng-repeat="department in departments" value="{{department.id}}">{{department.name}}</option>
                                </select>
                                @endverbatim
                                <input type="hidden" name="id"/>
                                <input type="hidden" name="created_by_id" value="{{session('userinfo')['id']}}"/>
                            </div>
                            <div class="form-group">
                                <input name="submit" value="Save" class="btn btn-primary" type="submit">
                            </div>
                        </article>

                        <input  name="id" value="" type="hidden">
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
