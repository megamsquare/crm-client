@extends('shared.layout')
@section('title', 'Documents')
@section('navSelectedCRM','active open selected')
@section('crmDocuments','active')
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
                    <a href="/crm">C.R.M</a>
                </li>
                <li class="active">Documents</li>
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
                        @include('shared.crm.leftnav')
                    </nav>
                </div>

                <!-- END PAGE SIDEBAR -->
                <div class="page-content-col">
                    <a href="javascript:void(0);" class="btn btn-primary showCreateDocumentModal"><i class="fa fa-plus-circle"></i> Create Document</a>
                    <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Upload</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                                  ?>
                            @foreach($viewData['items'] as $document)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>
                                        <p> <i class="fa fa-2x {{\App\Services\BaseService::getDocumentTypeIcon($document['file_name'])}}"></i></p>
                                    </td>
                                    <td>{{$document['title']}}</td>
                                    <td>{{(strlen($document['details']) > 50 )? substr($document['details'],0,50).'...':$document['details'] }}</td>
                                    <td>{{$document['created_date']}}</td>
                                    <td class="actions">
                                        <a href="/crm/document/details/{{$document['id']}}" class="btn btn-success btn-sm" ><i class="fa fa-list"></i> Details</a>
                                        <a href="javascript:;" data-id="{{$document['id']}}"
                                           data-documenttitle="{{$document['title']}}" data-filename="{{$document['file_name']}}"
                                           data-documentdetails="{{$document['details']}}" class="btn btn-primary btn-sm edit-document"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="/crm/document/download" method="post" class="form-inline">
                                            <input type="hidden" name="file_name" value="{{$document['file_name']}}" />
                                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Download File</button>
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
    <section id="createDocumentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create A Document</h4>
                </div>
                <div class="modal-body">
                    <form name="createDocumentForm" action="/crm/document/create" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="control-label">Title:</label>
                                <input id="title" class="form-control" name="title"
                                       placeholder="Title" type="text" required>
                                <input id="created_by_id" class="form-control" name="created_by_id"
                                       type="hidden" value="1">

                            </div>
                            <div class="form-group">
                                <label for="details" class="control-label">Details:</label>
                           <textarea id="details" class="form-control"  name="details"
                                     placeholder="Details" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file_name" class="control-label">Attachment:</label>
                                <input id="file_name" class="form-control" name="file_name"
                                       type="file" required>
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
    <section id="editDocumentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Document</h4>
                </div>
                <div class="modal-body">
                    <form action="/crm/document/edit" method="post" name="editDocumentForm" enctype="multipart/form-data" class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="control-label">Title:</label>
                                <input id="title" class="form-control" name="title"
                                       placeholder="Title" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="details" class="control-label">Details:</label>
                           <textarea id="details" class="form-control"  name="details"
                                     placeholder="Details" required></textarea>
                            </div>
                            <div class="form-group">
                              <section class="row">
                                 <div class="col-md-8">
                                     <label for="file_upload" class="control-label">Attachment:</label>
                                <input id="file_upload" class="form-control" name="file_upload"
                                       type="file" >
                                 </div>
                              </section>

                            </div>
                            <div class="form-group">
                                <input name="submit" value="Save Changes" class="btn btn-primary" type="submit">
                            </div>
                        </article>
                        <input  name="file_name" value="" type="hidden">
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
    <script src='{{asset('js/companyDeptUnit.js')}}'></script>
@endsection
