@extends('shared.layout')
@section('title', 'Roles')
@section('navSelectedADMIN','active open selected')
@section('navSelectedRoles','active')
@section('styles')
    @parent
    <style>
        .ms-container {
            width: 800px;
        }
    </style>
@endsection
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
                        Role Resources
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
                        <!-- BEGIN PAGE BASE CONTENT -->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h4>Resources</h4> </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @if(!empty($viewData))
                                    <form action="/admin/saveresourcestorule" class="form-horizontal" method="post" style="padding: 20px;">
                                        <div class="form-group">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <h4><label>All Resources</label></h4>
                                               </div>
                                               <div class="col-md-6">
                                                   <h4><label>Resources in {{$role}}</label></h4>
                                               </div>
                                           </div>

                                            <select multiple="multiple" class="multi-select" id="resources" name="resources[]">
                                                @foreach($viewData['resources'] as $item)
                                                    <option
                                                            @foreach($viewData['resources_in_role'] as $resourcesInRole)
                                                                    @if($item['id'] == $resourcesInRole['id'])
                                                                    selected
                                                                    @endif
                                                            @endforeach
                                                            value="{{$item["id"]}}">{{$item["key"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="role_id" value="{{$role_id}}" />
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Save Changes</button>

                                        </div>
                                    </form>
                                        @else
                                        <div class="well">
                                            <p>No resources found. Make sure you are connected to the internet.</p>
                                        </div>
                                        @endif
                                         </div>
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
                                           placeholder="Role Name" type="text" required>          </div>
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
    <script>
        jQuery(function($){
            $("#resources").multiSelect()
        });
    </script>
    <script src='{{asset('app/controllers/roleResourceController.js')}}'></script>
@endsection
