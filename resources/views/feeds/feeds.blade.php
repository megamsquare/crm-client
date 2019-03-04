@extends('shared.layout')
@section('title', 'Feeds')
@section("content")
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>FixedHeader Extension</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Tables</a>
                </li>
                <li class="active">Datatables</li>
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
                                <a href="index.html">
                                    <i class="icon-home"></i> Home </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-note "></i> Reports </a>
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
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Header Fixed</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input name="options" class="toggle" id="option1" type="radio">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input name="options" class="toggle" id="option2" type="radio">Settings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="dataTables_wrapper no-footer" id="sample_1_wrapper"><div class="row"><div class="col-md-6 col-sm-6"><div id="sample_1_length" class="dataTables_length"><label><select class="form-control input-sm input-xsmall input-inline" aria-controls="sample_1" name="sample_1_length"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> entries</label></div></div><div class="col-md-6 col-sm-6"><div class="dataTables_filter" id="sample_1_filter"><label>Search:<input aria-controls="sample_1" placeholder="" class="form-control input-sm input-small input-inline" type="search"></label></div></div></div><div class="table-scrollable"><table aria-describedby="sample_1_info" role="grid" class="table table-striped table-bordered table-hover table-header-fixed dataTable no-footer" id="sample_1"><thead>
                                                <tr role="row" class=""><th aria-label=" Rendering engine : activate to sort column descending" aria-sort="ascending" style="width: 147px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" class="sorting_asc"> Rendering engine </th><th aria-label=" Browser : activate to sort column ascending" style="width: 185px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" class="sorting"> Browser </th><th aria-label=" Platform(s) : activate to sort column ascending" style="width: 165px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" class="sorting"> Platform(s) </th><th aria-label=" Engine version : activate to sort column ascending" style="width: 124px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" class="sorting"> Engine version </th><th aria-label=" CSS grade : activate to sort column ascending" style="width: 86px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" class="sorting"> CSS grade </th></tr>
                                                </thead>

                                                <tbody>











































                                                <tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 1.0 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 1.5 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 2.0 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 3.0 </td>
                                                    <td> Win 2k+ / OSX.3+ </td>
                                                    <td> 1.9 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Camino 1.0 </td>
                                                    <td> OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Camino 1.5 </td>
                                                    <td> OSX.3+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Netscape 7.2 </td>
                                                    <td> Win 95+ / Mac OS 8.6-9.2 </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Netscape Browser 8 </td>
                                                    <td> Win 98SE+ </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Netscape Navigator 9 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.0 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.1 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.1 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.2 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.2 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.3 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.3 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.4 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.4 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.5 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.5 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.6 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.6 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.7 </td>
                                                    <td> Win 98+ / OSX.1+ </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.8 </td>
                                                    <td> Win 98+ / OSX.1+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Seamonkey 1.1 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Epiphany 2.20 </td>
                                                    <td> Gnome </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr></tbody>
                                            </table></div><div class="row"><div class="col-md-5 col-sm-5"><div aria-live="polite" role="status" id="sample_1_info" class="dataTables_info">Showing 1 to 20 of 43 entries</div></div><div class="col-md-7 col-sm-7"><div id="sample_1_paginate" class="dataTables_paginate paging_bootstrap_number"><ul style="visibility: visible;" class="pagination"><li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li></ul></div></div></div></div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Header &amp; Footer Fixed </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-default btn-sm btn-circle">
                                            <i class="fa fa-plus"></i> Add </a>
                                        <a href="javascript:;" class="btn btn-default btn-sm btn-circle">
                                            <i class="fa fa-print"></i> Print </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="dataTables_wrapper" id="sample_2_wrapper"><div class="row"><div class="col-md-6 col-sm-6"><div id="sample_2_length" class="dataTables_length"><label><select class="form-control input-sm input-xsmall input-inline" aria-controls="sample_2" name="sample_2_length"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="-1">All</option></select> entries</label></div></div><div class="col-md-6 col-sm-6"><div class="dataTables_filter" id="sample_2_filter"><label>Search:<input aria-controls="sample_2" placeholder="" class="form-control input-sm input-small input-inline" type="search"></label></div></div></div><div class="table-scrollable"><table aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover table-header-fixed dataTable" id="sample_2"><tfoot>
                                                <tr><th style="" colspan="1" rowspan="1"> Rendering engine </th><th style="" colspan="1" rowspan="1"> Browser </th><th style="" colspan="1" rowspan="1"> Platform(s) </th><th style="" colspan="1" rowspan="1"> Engine version </th><th style="" colspan="1" rowspan="1"> CSS grade </th></tr>
                                                </tfoot><thead>
                                                <tr role="row"><th aria-label=" Rendering engine : activate to sort column descending" aria-sort="ascending" style="width: 149px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="sorting_asc"> Rendering engine </th><th aria-label=" Browser : activate to sort column ascending" style="width: 188px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="sorting"> Browser </th><th aria-label=" Platform(s) : activate to sort column ascending" style="width: 167px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="sorting"> Platform(s) </th><th aria-label=" Engine version : activate to sort column ascending" style="width: 125px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="sorting"> Engine version </th><th aria-label=" CSS grade : activate to sort column ascending" style="width: 87px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="sorting"> CSS grade </th></tr>
                                                </thead>


                                                <tbody>











































                                                <tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 1.0 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 1.5 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 2.0 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Firefox 3.0 </td>
                                                    <td> Win 2k+ / OSX.3+ </td>
                                                    <td> 1.9 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Camino 1.0 </td>
                                                    <td> OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Camino 1.5 </td>
                                                    <td> OSX.3+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Netscape 7.2 </td>
                                                    <td> Win 95+ / Mac OS 8.6-9.2 </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Netscape Browser 8 </td>
                                                    <td> Win 98SE+ </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Netscape Navigator 9 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.0 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.1 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.1 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.2 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.2 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.3 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.3 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.4 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.4 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.5 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.5 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.6 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> 1.6 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.7 </td>
                                                    <td> Win 98+ / OSX.1+ </td>
                                                    <td> 1.7 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Mozilla 1.8 </td>
                                                    <td> Win 98+ / OSX.1+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Seamonkey 1.1 </td>
                                                    <td> Win 98+ / OSX.2+ </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Gecko </td>
                                                    <td> Epiphany 2.20 </td>
                                                    <td> Gnome </td>
                                                    <td> 1.8 </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 7.0 </td>
                                                    <td> Win 95+ / OSX.1+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 7.5 </td>
                                                    <td> Win 95+ / OSX.2+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 8.0 </td>
                                                    <td> Win 95+ / OSX.2+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 8.5 </td>
                                                    <td> Win 95+ / OSX.2+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 9.0 </td>
                                                    <td> Win 95+ / OSX.3+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 9.2 </td>
                                                    <td> Win 88+ / OSX.3+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera 9.5 </td>
                                                    <td> Win 88+ / OSX.3+ </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Opera for Wii </td>
                                                    <td> Wii </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="odd" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Nokia N800 </td>
                                                    <td> N800 </td>
                                                    <td> - </td>
                                                    <td> A </td>
                                                </tr><tr class="even" role="row">
                                                    <td class="sorting_1"> Presto </td>
                                                    <td> Nintendo DS browser </td>
                                                    <td> Nintendo DS </td>
                                                    <td> 8.5 </td>
                                                    <td> C/A
                                                        <sup>1</sup>
                                                    </td>
                                                </tr></tbody>
                                            </table></div><div class="row"><div class="col-md-5 col-sm-5"><div aria-live="polite" role="status" id="sample_2_info" class="dataTables_info">Showing 1 to 30 of 43 entries</div></div><div class="col-md-7 col-sm-7"><div id="sample_2_paginate" class="dataTables_paginate paging_bootstrap_number"><ul style="visibility: visible;" class="pagination"><li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li></ul></div></div></div></div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
@endsection