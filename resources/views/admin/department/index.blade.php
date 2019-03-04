@extends('shared.layout')
@section('title', 'Departments')
@section('navSelectedADMIN','active open selected')
@section('adminDepartments','active')
@section("content")
    <section ng-controller="CompanyController">
    <div style="min-height: 440px;" class="page-content" >
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
                <li class="active">Departments</li>
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
                    <a href="javascript:void(0);" ng-click="getCompanies();" class="btn btn-primary showCreateDepartmentModal"><i class="fa fa-plus-circle"></i> Create Department</a>
                    <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            ?>
                            @foreach($viewData as $department)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$department['name']}}</td>
                                    <td>{{$department['description']}}</td>
                                    <td>{{$department['created_date']}}</td>
                                    <td class="actions">
                                        <a href="javascript:void(0);" class="btn btn-info edit-department" data-id="{{$department['id']}}"
                                           data-companyid="{{$department['crm_company_id']}}" data-departmentname="{{$department['name']}}"
                                           data-departmentdescription="{{$department['description']}}"  ng-click="getCompanies();"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="/admin/deletedepartment" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="id" value="{{$department['id']}}"/>
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
                        </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>

    <section id="createDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Department</h4>
                </div>
                <div class="modal-body">
                    <form name="createDepartmentForm" action="/admin/createdepartment" method="post" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Department Name:</label>
                                <input id="name" class="form-control" name="name"
                                       placeholder="Department Name" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Department Description:</label>
                           <textarea id="description" class="form-control"  name="description"
                                     placeholder="Department Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="company" class="control-label">Company:</label>
                                @verbatim
                                <select name="companyId" id="company" class="form-control" required>
                                    <option ng-repeat="company in companies" value="{{company.id}}">{{company.company_name}}</option>
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


    <section id="editDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Department</h4>
                </div>
                <div class="modal-body">
                    <form action="/admin/editdepartment" method="post" name="editDepartmentForm" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Department Name:</label>
                                <input id="name" class="form-control" name="name"
                                       placeholder="Department Name" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Department Description:</label>
                           <textarea id="description" class="form-control"  name="description"
                                     placeholder="Department Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="company" class="control-label">Company:</label>
                                @verbatim
                                <select name="companyId" id="company" class="form-control" required>
                                    <option ng-repeat="company in companies" value="{{company.id}}">{{company.company_name}}</option>
                                </select>
                                @endverbatim
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
        <div class="clearfix"></div>
    </section>
    </section>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/companyDeptUnitController.js')}}'></script>
    <script src='{{asset('js/companyDeptUnit.js')}}'></script>
@endsection
