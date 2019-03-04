@extends('shared.layout')
@section('title', 'Edituser')
@section("content")
<div style="min-height: 440px;" class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>C.R.M.</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Features</a>
            </li>
            <li class="active">Form Stuff</li>
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
                    <ul class="nav navbar-nav margin-bottom-35">
                        <li class="active">
                            <a href="crm">
                                <i class="icon-home"></i> Home </a>
                        </li>
                        <li>
                            <a href="crmUser">
                                <i class="icon-note "></i> User</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> User Activity </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-basket "></i> Marketplace </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-bell"></i> Templates </a>
                        </li>
                    </ul>
                    <h3>Quick Actions</h3>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">
                                <i class="icon-envelope "></i> Inbox
                                <label class="label label-danger">New</label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-paper-clip "></i> Task </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-star"></i> Projects </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-pin"></i> Events
                                <span class="badge badge-success">2</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content-col">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-line boxless tabbable-reversed">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a aria-expanded="true" href="#tab_1" data-toggle="tab"> 2 Columns </a>
                                </li>
                                <li class="">
                                    <a aria-expanded="false" href="#tab_3" data-toggle="tab"> 2 Columns View Only </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-equalizer font-blue-hoki"></i>
                                                <span class="caption-subject font-blue-hoki bold uppercase">Form Sample</span>
                                                <span class="caption-helper">demo form...</span>
                                            </div>
                                            <div class="tools">
                                                <a title="" data-original-title="" href="#" class="collapse"> </a>
                                                <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a title="" data-original-title="" href="#" class="reload"> </a>
                                                <a title="" data-original-title="" href="#" class="remove"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="#" class="horizontal-form">
                                                <div class="form-body">
                                                    <h3 class="form-section">Person Info</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name</label>
                                                                <input id="firstName" class="form-control" placeholder="Chee Kin" type="text">
                                                                <span class="help-block"> This is inline help </span>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group has-error">
                                                                <label class="control-label">Last Name</label>
                                                                <input id="lastName" class="form-control" placeholder="Lim" type="text">
                                                                <span class="help-block"> This field has error. </span>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Gender</label>
                                                                <select class="form-control">
                                                                    <option value="">Male</option>
                                                                    <option value="">Female</option>
                                                                </select>
                                                                <span class="help-block"> Select your gender </span>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Date of Birth</label>
                                                                <input class="form-control" placeholder="dd/mm/yyyy" type="text"> </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Category</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value="Category 1">Category 1</option>
                                                                    <option value="Category 2">Category 2</option>
                                                                    <option value="Category 3">Category 5</option>
                                                                    <option value="Category 4">Category 4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Membership</label>
                                                                <div class="radio-list">
                                                                    <label class="radio-inline">
                                                                        <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio"> Option 1 </label>
                                                                    <label class="radio-inline">
                                                                        <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio"> Option 2 </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <h3 class="form-section">Address</h3>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>Street</label>
                                                                <input class="form-control" type="text"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input class="form-control" type="text"> </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <input class="form-control" type="text"> </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Post Code</label>
                                                                <input class="form-control" type="text"> </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="form-control"> </select>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                </div>
                                                <div class="form-actions right">
                                                    <button type="button" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn blue">
                                                        <i class="fa fa-check"></i> Save</button>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Form Sample </div>
                                            <div class="tools">
                                                <a title="" data-original-title="" href="javascript:;" class="collapse"> </a>
                                                <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a title="" data-original-title="" href="javascript:;" class="reload"> </a>
                                                <a title="" data-original-title="" href="javascript:;" class="remove"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form class="form-horizontal" role="form">
                                                <div class="form-body">
                                                    <h2 class="margin-bottom-20"> View User Info - Bob Nilson </h2>
                                                    <h3 class="form-section">Person Info</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">First Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Bob </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Last Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Nilson </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Male </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Date of Birth:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 20.01.1984 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Category:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Category1 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Membership:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Free </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <h3 class="form-section">Address</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> #24 Sun Park Avenue, Rolton Str </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> New York </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">State:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> New York </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Post Code:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 457890 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> USA </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn green">
                                                                        <i class="fa fa-pencil"></i> Edit</button>
                                                                    <button type="button" class="btn default">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-equalizer font-green-haze"></i>
                                                <span class="caption-subject font-green-haze bold uppercase">Form Sample</span>
                                                <span class="caption-helper">some info...</span>
                                            </div>
                                            <div class="tools">
                                                <a title="" data-original-title="" href="#" class="collapse"> </a>
                                                <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a title="" data-original-title="" href="#" class="reload"> </a>
                                                <a title="" data-original-title="" href="#" class="remove"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form class="form-horizontal" role="form">
                                                <div class="form-body">
                                                    <h2 class="margin-bottom-20"> View User Info - Bob Nilson </h2>
                                                    <h3 class="form-section">Person Info</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">First Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Bob </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Last Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Nilson </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Male </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Date of Birth:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 20.01.1984 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Category:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Category1 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Membership:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Free </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <h3 class="form-section">Address</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> #24 Sun Park Avenue, Rolton Str </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> New York </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">State:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> New York </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Post Code:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 457890 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> USA </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn green">
                                                                        <i class="fa fa-pencil"></i> Edit</button>
                                                                    <button type="button" class="btn default">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <div class="portlet light bg-inverse">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-equalizer font-red-sunglo"></i>
                                                <span class="caption-subject font-red-sunglo bold uppercase">Form Sample</span>
                                                <span class="caption-helper">some info...</span>
                                            </div>
                                            <div class="tools">
                                                <a title="" data-original-title="" href="#" class="collapse"> </a>
                                                <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a title="" data-original-title="" href="#" class="reload"> </a>
                                                <a title="" data-original-title="" href="#" class="remove"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form class="form-horizontal" role="form">
                                                <div class="form-body">
                                                    <h2 class="margin-bottom-20"> View User Info - Bob Nilson </h2>
                                                    <h3 class="form-section">Person Info</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">First Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Bob </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Last Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Nilson </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Male </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Date of Birth:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 20.01.1984 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Category:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Category1 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Membership:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> Free </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <h3 class="form-section">Address</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> #24 Sun Park Avenue, Rolton Str </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> New York </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">State:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> New York </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Post Code:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 457890 </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> USA </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn green">
                                                                        <i class="fa fa-pencil"></i> Edit</button>
                                                                    <button type="button" class="btn default">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
@endsection
