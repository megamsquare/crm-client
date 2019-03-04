@extends('shared.layout')
@section('title', 'Transaction')
@section('navSelectedCRM','active open selected')
@section('crmTransaction','active')
@section("content")
    <article ng-controller="TransactionController">
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
                <li class="active">Transactions</li>
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
                        <div class="col-md-12">
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"> Transaction No : #12313232
                                                        <span class="hidden-xs">| March 28, 2017:16:25 </span>
                                                    </span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav-tabs-lg">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab"> Details </a>
                                            </li>
                                        </ul>
                                        <section class="tab-content">
                                            <article class="tab-pane active" id="tab_1">
                                                <section class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                      @include('crm.transactions.sections.transactionDetails')
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.jobs')
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.ancillaries')
                                                            </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.designGeneration')
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.logocolors')
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.proofgeneration')
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.checklist')
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.documents')
                                                              </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        @include('crm.transactions.sections.notes')
                                                    </div>


                                                </section>
                                            </article>
                                        </section>
                                    </div>

                                    <!-- End: life time stats -->
                                </div>
                            </div>
                            <!-- END PAGE BASE CONTENT -->
                        </div>
                    </div>
                </div>
                <!-- END SIDEBAR CONTENT LAYOUT -->
            </div>

<!-- MODALS SECTION-->
            <article class="modals">
                <!--Create modals-->
                @include('crm.transactions.modals.jobModal')
                @include('crm.transactions.modals.checklistModal')
                @include('crm.transactions.modals.designGenerationModal')
                @include('crm.transactions.modals.ancillariesModal')
                @include('crm.transactions.modals.logoColourModal')
                @include('crm.transactions.modals.proofGenerationTimeScheduleModal')
                @include('crm.transactions.modals.newDocumentModal')
                @include('crm.transactions.modals.newNoteModal')
            <!--End Create modals-->

           </article>
            <!--END MODALS SECTION-->
        </div>
    </div>

    </article>
            @endsection
            @section('scripts')
                @parent
                <script src='{{asset('js/company.js')}}'></script>
                <script src='{{asset('app/controllers/transactionController.js')}}'></script>
                <script src='{{asset('js/transactionForm.js')}}'></script>
        @endsection
