@extends('shared.layout')
@section('title', 'Security Prints')
@section('navSelectedCRM','active open selected')
@section('crmTransaction','active')
@section("content")
    <div style="min-height: 440px;" class="page-content" ng-controller="TransactionController">
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
                <li>
                    <a href="/crm/transaction">Transactions</a>
                </li>
                <li class="active">Security Prints</li>
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

                    <section>
                        <form name="createDepartmentForm" action="/crm/securityPrintsPost" method="post" class="form-horizontal">
                            <input type="hidden" name="crm_transaction_id" value="{{$crm_transaction_id}}" />
                            <input type="hidden" name="created_by_id" value="1" />
                            <article class="panel-group" id="accordion">
                                <section class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="display-block" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                <strong>Job - Step 1</strong></a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <article class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title" class="control-label">Title <span class="required"> * </span>: </label>
                                                    <input id="title" class="form-control" name="title"
                                                           placeholder="Title" type="text" value="{{old('title')}}" required ng-model="job_title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="control-label">Description <span class="required"> * </span>: </label>
                                                    <input id="description" class="form-control" name="description"
                                                           placeholder="Description" type="text" value="{{old('description')}}" required ng-model="job_description">
                                                </div>
                                                <div class="form-group">
                                                    <label for="instruction" class="control-label">Instruction <span class="required"> * </span>: </label>
                                                    <input id="instruction" class="form-control" name=instruction"
                                                           placeholder="Instruction" type="text" value="{{old('instruction')}}" required ng-model="job_instruction">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jobsize" class="control-label">Job size <span class="required"> * </span>: </label>
                                                    <input id="jobsize" class="form-control" name="jobsize"
                                                           placeholder="Job size" type="text" value="{{old('jobsize')}}" required ng-model="job_jobsize">
                                                </div>
                                                <div class="form-group">
                                                    <label for="spot_colour" class="control-label">Spot colour <span class="required"> * </span>:</label>
                                                    <input id="spot_colour" class="form-control" name="spot_colour"
                                                           placeholder="Spot colour" type="text" value="{{old('spot_colour')}}" required ng-model="job_spot_colour">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cymk" class="control-label">CYMK <span class="required"> * </span>: </label>
                                                    <input id="cymk" class="form-control" name="cymk"
                                                           placeholder="CYMK" type="text" value="{{old('cymk')}}" required ng-model="job_cymk">
                                                </div>
                                                <div class="form-group pull-right">
                                                    <button class="btn btn-danger btn-lg"  data-toggle="collapse" data-parent="#accordion" href="#collapse2">Next</button>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </section>
                                <section class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a  class="display-block" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                <strong>Ancillaries - Step 2</strong></a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <article class="col-md-12">
                                                <div class="form-group">
                                                    <label for="ancillaries" class="control-label">Ancillaries :</label>
                                                    <section class="row">
                                                        <div class="col-md-2 name">
                                                        <label for="ancillaries" class="control-label">Front Cover:
                                                            <input name="ancillaries[]" value="Front Cover" type="checkbox" ng-model="ancillaries_front_cover">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2 name">
                                                        <label for="ancillaries" class="control-label">Back Cover:
                                                            <input name="ancillaries[]" value="Back Cover" type="checkbox" ng-model="ancillaries_back_cover">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2 name">
                                                        <label for="ancillaries" class="control-label">Re order Slip:
                                                            <input name="ancillaries[]" value="Re order Slip" type="checkbox" ng-model="ancillaries_re_order_slip">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2 name">
                                                        <label for="ancillaries" class="control-label">Cash Analysis:
                                                            <input name="ancillaries[]" value="Cash Analysis" type="checkbox" ng-model="ancillaries_cash_analysis">
                                                        </label>
                                                    </div>
                                                    </section>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sheet" class="control-label">Sheet :</label>
                                                    <section class="row">
                                                        <div class="col-md-2 name">
                                                            <label for="sheet" class="control-label">Continuous Sheet:
                                                                <input name="sheet[]" value="Continuous Sheet" type="checkbox" ng-model="ancillaries_sheet_continuous_sheet">
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2 name">
                                                            <label for="sheet" class="control-label">Loose Leaf:
                                                                <input name="sheet[]" value="Continuous Sheet" type="checkbox" ng-model="ancillaries_sheet_loose_leaf">
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2 name">
                                                            <label for="sheet" class="control-label">Booklet:
                                                                <input name="sheet[]" value="Continuous Sheet" type="checkbox" ng-model="ancillaries_sheet_Booklet">
                                                            </label>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hologram" class="control-label">Hologram : </label>
                                                    <select name="hologram" id="hologram" class="form-control" required ng-model="ancillaries_hologram">>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <a class="btn btn-primary btn-lg pull-left"  data-toggle="collapse" data-parent="#accordion" href="#collapse1">Previous</a>
                                                    <a class="btn btn-danger btn-lg pull-right"  data-toggle="collapse" data-parent="#accordion" href="#collapse3">Next</a>
                                                </div>
                                            </article>

                                        </div>
                                    </div>
                                </section>
                                <section class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="display-block" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                <strong>Logo / Colour - Step 3</strong></a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <article class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Pantone (Reference colours)<span class="required"> * </span>: </label>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <input id="name" class="form-control" name="pantone"
                                                                   value="{{old('pantone')}}" placeholder="Colours (Multiple should be separated by a comma)" type="text" required ng-model="logo_colour_pantone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label for="existing_colour" class="control-label">Existing Colour<span class="required"> * </span>: </label>
                                                            <select name="existing_colour" id="existing_colour"
                                                                    class="form-control" required ng-model="logo_colour_existing_colour">
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <label for="supplied_as" class="control-label">Supplied As<span class="required"> * </span>: </label>
                                                            <select name="supplied_as" id="supplied_as"
                                                                    class="form-control" required ng-model="logo_colour_supplied_as">
                                                                <option value="Hard copy">Hard copy</option>
                                                                <option value="Soft copy">Soft copy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="supplied_digit_as" class="control-label">Supplied Digit As<span class="required"> * </span>: </label>
                                                    <input class="form-control" name="supplied_digit_as" id="supplied_digit_as"
                                                           placeholder="Supplied Digit As" value="{{old('supplied_digit_as')}}" type="text" required ng-model="logo_colour_supplied_digit_as">
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-lg pull-left" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Previous</button>
                                                    <button class="btn btn-danger btn-lg pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse4">Next</button>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </section>
                                <section class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="display-block" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                <strong>Proof Generation Time Schedule - Step 4</strong></a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <article class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <label for="start_date_to_studio" class="control-label">Start Date Brief is Given To Studio <span class="required"> * </span>: </label>
                                                            <input id="start_date_to_studio" readonly class="form-control form_datetime" name="start_date_to_studio"
                                                                   placeholder="Start Date Brief is Given To
                                                                Studio" type="text" value="{{old('start_date_to_studio')}}" required ng-model="proof_generation_start_date_to_studio">
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <label for="receive_by" class="control-label">Received by
                                                                <span class="required"> * </span>: </label>
                                                            <input id="receive_by" class="form-control" name="receive_by"
                                                                   placeholder="Received by" value="{{old('receive_by')}}" type="text" required ng-model="proof_generation_receive_by">
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <label for="receive_by_date" class="control-label">Date<span class="required"> * </span>: </label>
                                                            <input id="receive_by_date" readonly class="form-control form_datetime" name="receive_by_date"
                                                                   placeholder="Date" type="text" value="{{old('receive_by_date')}}" required ng-model="proof_generation_receive_by_date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <label for="agreed_date_time" class="control-label">Agreed Target Time<span class="required"> * </span>: </label>
                                                            <input readonly id="agreed_date_time" class="form-control form_datetime" name="agreed_date_time"
                                                                   placeholder="Agreed Target Time" value="{{old('agreed_date_time')}}" type="text" required ng-model="proof_generation_agreed_date_time">
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <label for="ended" class="control-label">End Time<span class="required"> * </span>: </label>
                                                            <input id="ended" readonly class="form-control form_datetime" name="ended" placeholder="End Time" type="text"
                                                                   required value="{{old('ended')}}" ng-model="proof_generation_ended">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a class="btn btn-primary btn-lg pull-left" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Previous</a>
                                                    <a name="submit" class="btn btn-success btn-lg pull-right showCommercialPrintsPreviewModal" ><i class="fa fa-list"></i> Preview</a>
                                                </div>
                                            </article>

                                        </div>
                                    </div>
                                </section>
                            </article>
                            <!--PREVIEW MODAL-->
                            <section id="commercialPrintsPreviewModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title text-center">Preview Details</h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row static-info">
                                                <div class="col-md-12">  <h2 class="text-center" style="margin:0;">Job</h2></div>
                                                <hr style="margin:0;"/>
                                                <div class="col-md-5 name"> Title:</div>
                                                <div class="col-md-7 value" ng-bind="job_title"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Description:</div>
                                                <div class="col-md-7 value" ng-bind="job_description"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Instruction:</div>
                                                <div class="col-md-7 value" ng-bind="job_instruction"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Job Size:</div>
                                                <div class="col-md-7 value" ng-bind="job_jobsize"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Spot Colour:</div>
                                                <div class="col-md-7 value" ng-bind="job_spot_colour"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> CYMK :</div>
                                                <div class="col-md-7 value" ng-bind="job_cymk"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-12">  <h2 class="text-center" style="margin:0;">Ancillaries</h2></div>
                                                <div class="col-md-5 name"> Front Cover:</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_front_cover"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Back Cover:</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_back_cover"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Re order Slip:</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_re_order_slip"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Cash Analysis:</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_cash_analysis"></div>
                                                <div class="clearfix"></div>
                                                <hr />
                                                <div class="col-md-5 name">Continuous Sheet :</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_sheet_continuous_sheet"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name">Loose Leaf :</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_sheet_loose_leaf"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name">Booklet :</div>
                                                <div class="col-md-7 value" ng-bind="ancillaries_sheet_Booklet"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-12">  <h2 class="text-center" style="margin:0;">Logo / Colour</h2></div>
                                                <div class="col-md-5 name"> Pantone (Reference colours):</div>
                                                <div class="col-md-7 value" ng-bind="logo_colour_pantone"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Existing Colour:</div>
                                                <div class="col-md-7 value" ng-bind="logo_colour_existing_colour"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Supplied As:</div>
                                                <div class="col-md-7 value" ng-bind="logo_colour_supplied_as"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Supplied Digit As:</div>
                                                <div class="col-md-7 value" ng-bind="logo_colour_supplied_digit_as"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-12">  <h2 class="text-center" style="margin:0;">Proof Generation Time Schedule</h2></div>
                                                <div class="col-md-5 name"> Start Date Brief is Given To Studio :</div>
                                                <div class="col-md-7 value" ng-bind="proof_generation_start_date_to_studio"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Received by :</div>
                                                <div class="col-md-7 value" ng-bind="proof_generation_receive_by"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Date:</div>
                                                <div class="col-md-7 value" ng-bind="proof_generation_receive_by_date"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> Agreed Target Time:</div>
                                                <div class="col-md-7 value" ng-bind="proof_generation_agreed_date_time"></div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-5 name"> End Time:</div>
                                                <div class="col-md-7 value" ng-bind="proof_generation_ended"></div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" >Save</button>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!---->
                        </form>


                        <div class="clearfix"></div>
                    </section>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('js/company.js')}}'></script>
    <script src='{{asset('app/controllers/transactionController.js')}}'></script>
    <script src='{{asset('js/transactionMain.js')}}'></script>
@endsection
          