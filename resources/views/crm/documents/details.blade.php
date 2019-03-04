@extends('shared.layout')
@section('title', 'Document Details')
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
                <li><a href="/crm/documents">Document</a></li>
                <li class="active">Details</li>
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
                    <article>
                        <div class="portlet red-sunglo box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-building"></i>{{$viewData[0]['crmDocuments']['title']}} details</div>
                            </div>
                            <div class="portlet-body">
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Title: </div>
                                    <div class="col-md-7 value">{{$viewData[0]["crmDocuments"]['title']}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name">Details: </div>
                                    <div class="col-md-7 value">{{$viewData[0]["crmDocuments"]['details']}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Created By: </div>
                                    <div class="col-md-7 value">{{$viewData[0]["firstname"]}} {{$viewData[0]["lastname"]}}</div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Created date: </div>
                                    <div class="col-md-7 value"> {{$viewData[0]["crmDocuments"]['created_date']}} </div>
                                </div>

                               <section class="well">
                                 <div class="row">
                                     <div class="col-md-1">
                                    <i class="fa fa-3x {{\App\Services\BaseService::getDocumentTypeIcon($viewData[0]["crmDocuments"]['file_name'])}}"></i>
                                </div>
                                   <div class="col-md-3">
                                       <form action="/crm/document/download" method="post">
                                           <input type="hidden" name="file_name" value="{{$viewData[0]["crmDocuments"]['file_name']}}" />
                                           <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-download"></i> Download File</button>
                                       </form>

                                   </div>
                                 </div>
                               </section>
                            </div>

                        </div>
                    </article>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('js/companyDeptUnit.js')}}'></script>
@endsection
