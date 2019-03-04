@extends('shared.layout')
@section('title', 'Resources')
@section('navSelectedADMIN','active open selected')
@section('navSelectedResources','active')
@section("content")
    <div ng-controller="roleResourceController">
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>Role Resources</h1>
            <div class="clearfix"></div>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin">Home</a>
                </li>
                <li>
                    <a href="/admin/roles">Roles</a>
                </li>
                <li class="active">Resources</li>
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
                    @if(count($viewData))
                    <div class="table-responsive">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> Resources</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button id="sample_editable_1_new" class="btn sbold green showCreateModal1"> Create Resource
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th> Resource Name </th>
                                        <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewData as $item)
                                        <tr class="gradeX">
                                            <td>{{$item['key']}}</td>
                                            <td class="actions">
                                                <a href="javascript:void(0);" class="btn btn-info" onclick="editResource(this);" data-id="{{$item['id']}}" data-resourcename="{{$item['key']}}" ><i class="fa fa-edit"></i> Edit</a>
                                                <form action="/admin/createresource" class="form-horizontal form-inline" method="post">
                                                    <input name="request_mode" value="delete" type="hidden">
                                                    <input type="hidden"  name="id" value="{{$item['id']}}"/>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                    @else
                        <div class="well">
                            <p>No resources found. Make sure you are connected to the internet.</p>
                        </div>
                        @endif
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>

    <section id="createModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title createModal1-header">Create Resource</h4>
                </div>
                <div class="modal-body">
                    <form name="createResourceForm" action="/admin/createresource" method="post"  class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Resource Name:</label>
                                <input id="name" class="form-control" name="name"
                                       placeholder="Resource Name" type="text" required>
                                <input name="application_id" value="1" type="hidden">
                                {{--For edit mode--}}
                                <input name="id" value="" type="hidden">
                                <input name="request_mode" value="create" type="hidden">
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

    <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/roleResourceController.js')}}'></script>
@endsection
