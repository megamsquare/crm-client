@extends('shared.layout')
@section('title', 'Company')
@section('navSelectedADMIN','active open selected')
@section('adminCompany','active')
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
                    <a href="/admin">Admin</a>
                </li>
                <li class="active">Company</li>
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
                <div class="page-content-col" ng-controller="CompanyController">
                    <a href="javascript:void(0);"  ng-click="showCreateCompanyModal()" class="btn btn-primary showCreateCompanyModal"><i class="fa fa-plus-circle"></i> Create Company</a>
                    <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Company name</th>
                                <th>Description</th>
                                <th>Created date</th>
                                <th class="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            ?>
                            @foreach($viewData['items'] as $company)
                            <tr>
                                <td>{{$serial}}</td>
                                <td>{{$company['company_name']}}</td>
                                <td>{{$company['description']}}</td>
                                <td>{{$company['created_date']}}</td>
                                <td class="actions">
                                    <a href="javascript:void(0);" class="btn btn-info edit-company" data-id="{{$company['id']}}" data-companyname="{{$company['company_name']}}" data-companydescription="{{$company['description']}}"><i class="fa fa-edit"></i> Edit</a>
                                   <form action="/admin/deletecompany" class="form-horizontal form-inline" method="post">
                                      <input type="hidden"  name="id" value="{{$company['id']}}"/>
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
    <section id="createCompanyModal" class="modal fade" role="dialog" ng-controller="CompanyController">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Company</h4>
                </div>
                <div class="modal-body">
                   <form name="createCompanyForm" action="/admin/createcompany" method="post" class="form-horizontal">
                      <article class="col-md-12">
                          <div class="form-group">
                              <label for="company_name" class="control-label">Company Name:</label>
                             <input id="company_name" class="form-control" name="company_name"
                                   placeholder="Company Name" type="text" ng-model="company_name" required>
                          </div>
                       <div class="form-group">
                          <label for="company_description" class="control-label">Company Description:</label>
                           <textarea id="company_description" class="form-control"  name="description"
                                  placeholder="Company Description"  type="text" ng-model="company_description" required></textarea>
                       </div>
                          <div class="form-group">
                              <input ng-disabled="createCompanyForm.company_name.$dirty && createCompanyForm.company_name.$invalid ||
                              createCompanyForm.company_description.$dirty && createCompanyForm.company_description.$invalid"
                                     name="submit" value="Save Company" class="btn btn-primary" type="submit" ng-click="saveCompany()">
                            </div>
                          <input  name="created_by_id" value="1" type="hidden">
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
    <section id="editCompanyModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Company</h4>
                </div>
                <div class="modal-body">
                    <form action="/admin/editcompany" method="post" name="editCompanyForm" novalidate class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="company_name" class="control-label">Company Name:</label>
                                <input id="company_name" class="form-control" name="company_name"
                                       placeholder="Company Name" type="text" required>
                             </div>
                            <div class="form-group">
                                <label for="company_description" class="control-label">Company Description:</label>
                           <textarea id="company_description" class="form-control"  name="description"
                                     placeholder="Company Description"  required></textarea>
                            </div>
                            <div class="form-group">
                                <input  name="submit" value="Save Changes" class="btn btn-primary" type="submit">
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
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/companyDeptUnitController.js')}}'></script>
    <script src='{{asset('js/companyDeptUnit.js')}}'></script>
@endsection


