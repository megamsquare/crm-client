@extends('shared.layout')
@section('title', 'Application')
@section('navSelectedADMIN','active open selected')
@section('adminApp','active')
@section("content")
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>C.R.M.</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/crm">Admin</a>
                </li>
                <li class="active">Application </li>
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
                  <a href="javascript:void(0);" class="btn btn-primary showCreateAppModal"><i class="fa fa-bus"></i> Create Application</a>
                  <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Key</th>
                                <th>Application</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            if($viewData != null){
                            ?>
                            @foreach($viewData as $app)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$app['name']}}</td>
                                    <td>{{$app['description']}}</td>
                                    <td class="actions">
                                        <a href="javascript:void(0);" class="btn btn-info edit-app" data-id="{{$app['id']}}"
                                        data-name="{{$app['name']}}"
                                        data-description="{{$app['description']}}"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="/admin/deleteapp" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="id" value="{{$app['id']}}"/>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                                $serial++;
                                ?>
                            @endforeach
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
    <section id="createAppModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Application</h4>
                </div>
                <div class="modal-body">
                    <form name="createAppForm" action="/admin/createapp" method="post" novalidate class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="purpose" class="control-label">Application Name:</label>
                                <input id="purpose" class="form-control"  name="purpose"
                                     placeholder="Enter Application Name" required>
                            </div>
                            <div class="form-group">
                                <label for="details" class="control-label">Description:</label>
                                <textarea rows="10" id="details" class="form-control"  name="details"
                                     placeholder="Enter Details for the Application" required></textarea>
                            </div>
                            <div class="modal-footer">
                              <div class="form-group col-xs-6">
                                  <input name="submit" value="Save" class="btn btn-primary" type="submit">
                              </div>
                              <div class="form-group col-xs-2">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </article>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </section>
    <section id="editAppModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Application</h4>
                </div>
                <div class="modal-body">
                    <form action="/crm/editapp" method="post" name="editappForm" novalidate class="form-horizontal">
                      <article class="col-md-12">
                          <div class="form-group">
                              <label for="name" class="control-label">Application Name:</label>
                              <input id="name" class="form-control"  name="name"
                                   placeholder="Enter Application Name" required>
                          </div>
                          <div class="form-group">
                              <label for="description" class="control-label">Description:</label>
                              <textarea rows="10" id="description" class="form-control"  name="description"
                                   placeholder="Enter Details for the Application" required></textarea>
                          </div>
                          <div class="modal-footer">
                            <div class="form-group col-xs-6">
                                <input name="submit" value="Save" class="btn btn-primary" type="submit">
                            </div>
                            <div class="form-group col-xs-2">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                      </article>
                        <input  name="id" value="" type="hidden">
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('js/application.js')}}'></script>
@endsection
