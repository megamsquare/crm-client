@extends('shared.layout')
@section('title', 'Resources')
@section('navSelectedADMIN','active open selected')
@section('adminRes','active')
@section("content")
    <section ng-controller="MenuController">
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>Administrator</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/crm">Admin</a>
                </li>
                <li class="active">Menu </li>
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
                    <a href="javascript:void(0);" class="btn btn-primary showCreateMenuModal" ng-click="getResources();"><i class="fa fa-plus-circle"></i> Create Menu</a>
                    <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Display Text</th>
                                <th>Description</th>
                                <th>URI</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            ?>
                            @foreach($viewData as $app)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$app['display_text']}}</td>
                                    <td>{{$app['description']}}</td>
                                    <td>{{$app['uri']}}</td>
                                    <td>{{$app['icon']}}</td>
                                    <td class="actions">
                                        <a href="javascript:void(0);"
                                           class="btn btn-info edit-menu"
                                           data-id="{{$app['id']}}"
                                           data-displaytext="{{$app['display_text']}}"
                                           data-description="{{$app['description']}}"
                                           data-uri="{{$app['uri']}}"
                                           data-linkicon="{{$app['icon']}}"
                                           data-resourceId="{{$app['resource_id']}}"
                                           data-parentId="{{$app['parent_id']}}"
                                           ng-click="getResources($event.target);"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="/admin/menu/delete" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="id" value="{{$app['id']}}"/>
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
    <section id="createMenuModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="createMenuFormHeader">Create Menu</h4>
                </div>
                <div class="modal-body">
                    <form name="createMenuForm" action="/admin/menu/create" method="post" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="display-text" class="control-label">Display Text:</label>
                                <input id="display-text" class="form-control"  name="display_text"
                                       placeholder="Enter display text" required>
                            </div>
                            <div class="form-group">
                                <label for="resource_id" class="control-label">Resource:</label>
                                @verbatim
                                <select name="resource_id" id="resource_id" class="form-control" required  ng-disabled="!resources.length > 0">
                                    <option value="">Select Resource</option>
                                    <option ng-repeat="resource in resources" ng-selected="{{ resource.Id == resource_id }}" value="{{resource.Id}}">{{resource.Key}}</option>
                                </select>
                                @endverbatim
                            </div>
                            <div class="form-group">
                                <label for="parent_id" class="control-label">Parent Resource:</label>
                                @verbatim
                                <select name="parent_id" id="parent_id" class="form-control" ng-disabled="!resources.length > 0">
                                    <option value="">Select Parent Resource</option>
                                    <option ng-repeat="resource in resources" ng-selected="{{ resource.Id == parent_id }}" value="{{resource.Id}}">{{resource.Key}}</option>
                                </select>
                                @endverbatim
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description:</label>
                                <textarea rows="3" id="description" class="form-control"  name="description"
                                          placeholder="Enter description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="uri" class="control-label">Uri:</label>
                                <input id="uri" class="form-control"  name="uri"
                                       placeholder="Enter uri" required>
                            </div>
                            <div class="form-group">
                                <label for="icon" class="control-label">Icon:</label>
                                <input id="icon" class="form-control"  name="icon"
                                       placeholder="Enter icon" required>
                            </div>
                            <input type="hidden" name="application_id" value="1" />
                            <input type="hidden" name="id" value="" />
                            <input type="hidden" name="mode" value="create" />
                            <div class="modal-footer">
                               <div class="pull-right">
                                   <div class="form-group">
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input name="submit" value="Save" class="btn btn-primary" type="submit">
                                </div>
                               </div>
                            </div>
                        </article>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </section>
    </section>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/menuController.js')}}'></script>
    <script src='{{asset('js/application.js')}}'></script>
@endsection
