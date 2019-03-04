@extends('shared.layout')
@section('title', 'Notes')
@section('navSelectedCRM','active open selected')
@section('crmNotes','active')
@section("content")
    <article ng-controller="visitController">
<div style="min-height: 440px;" class="page-content">
    <!-- BEGIN BREADCRUMBS -->

    <div class="breadcrumbs">
        <h1>CRM</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">CRM</a>
            </li>
            <li class="active">Notes</li>
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
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                  <div class="col-lg-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-book-open font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Note List</span>
                                <a href="javascript:void(0);" class="btn btn-outline btn-circle btn-sm red showCreateNoteModal">Add a new note</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr>
                                            <th> Sn </th>
                                            <th> Title </th>
                                            <th> Notes </th>
                                            <th> Created Date </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $serial=1;
                                    ?>
                                    @foreach($viewData['items'] as $note)
                                        <tr>
                                            <td>{{$serial}}</td>
                                            <td>{{$note['crmNotes']['title']}}</td>
                                            <td>{{$note['crmNotes']['notes']}}</td>
                                            <td>{{$note['crmNotes']['created_date']}}</td>
                                            <td class="actions">
                                                <a href="javascript:void(0);" class="btn btn-outline btn-circle btn-sm purple edit-note" data-id="{{$note['crmNotes']['id']}}"
                                                   data-notetitle="{{$note['crmNotes']['title']}}"
                                                   data-notepurpose="{{$note['crmNotes']['notes']}}"><i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="/crm/deletenote" class="form-horizontal form-inline" method="post">
                                                    <input type="hidden"  name="id" value="{{$note['crmNotes']['id']}}"/>
                                                    <button type="submit" class="btn btn-outline btn-circle btn-sm red" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</button>
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
@include('crm.notes.addnote')
@include('crm.notes.editnote')
    </article>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/visitCallController.js')}}'></script>
    <script src='{{asset('js/notes.js')}}'></script>
@endsection
