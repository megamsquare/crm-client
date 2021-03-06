@extends('shared.layout')
@section('title', 'Message')
@section('navSelectedCRM','active open selected')
@section('crmMessages','active')
@section("content")
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
            <li class="active">Message</li>
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
                                <span class="caption-subject font-red sbold uppercase">Message</span>
                                <a href="javascript:void(0);" class="btn btn-outline btn-circle btn-sm red showCreateNoteModal">Add a new note</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr>
                                            <th> Sn </th>
                                            <th> Subject </th>
                                            <th> 	From Email </th>
                                            <th> 	To Email </th>
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
                                            <td>{{$note['title']}}</td>
                                            <td>{{$note['notes']}}</td>
                                            <td>{{$note['created_date']}}</td>
                                            <td class="actions">
                                                <a href="javascript:void(0);" class="btn btn-outline btn-circle btn-sm purple edit-note" data-id="{{$note['id']}}"
                                                   data-notetitle="{{$note['title']}}"
                                                   data-notepurpose="{{$note['notes']}}"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="/crm/deletenote" class="form-horizontal form-inline" method="post">
                                                    <input type="hidden"  name="id" value="{{$note['id']}}"/>
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
@include('crm.message.addnote')
@include('crm.message.editnote')
@endsection
@section('scripts')
    @parent
    <script src='{{asset('js/notes.js')}}'></script>
@endsection
