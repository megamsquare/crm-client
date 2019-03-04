@extends('shared.layout')
@section('title', 'My Ticket')
@section('navSelectedHELPDESK','active open selected')
@section('helpdeskTicket','active')
@section("content")
@section('styles')
    @parent
    <link href='{{asset('assets/global/plugins/select2/css/select2.min.css')}}' rel="stylesheet" type="text/css" />
    <link href='{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}' rel="stylesheet" type="text/css" />
    <link href='{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}' rel="stylesheet" type="text/css" />
@endsection
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>Help Desk</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/crm">Help Desk</a>
                </li>
                <li class="active">Ticket </li>
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
                        @include('shared.helpdesk.leftnav')
                    </nav>
                </div>
                <!-- END PAGE SIDEBAR -->
                <div class="page-content-col">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet-body light bordered">
                        <div class="mt-element-list">
                            <div class="mt-list-head list-default green-haze">
                                <div class="row">
                                    <div class="col-xs-10">
                                        <div class="list-head-title-container">
                                            <h3 class="list-title uppercase">Ticket List</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="list-head-summary-container">
                                            <div class="list-default">
                                                <a class="btn white margin-top-10 btn-outline btn-circle"   href="#createFeed" data-toggle="modal" data-toggle="dropdown">
                                                    <i class="fa fa-plus"></i>
                                                    <span class="hidden-xs"> Start new Ticket </span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-list-container list-default">
                                <ul>
                                    @if(!empty($viewData['items']))
                                    <?php 
                                    ksort($viewData['items']);
                                    //dd($viewData['items']); 
                                    ?>
                                    @foreach($viewData['items'] as $feed)
                                    <li class="mt-list-item">
                                        <div class="list-icon-container">
                                          <i class="icon-close"></i>
                                        </div>
                                        <div class="list-datetime"> {{$feed['created_date']}} </div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase bold">
                                                <a href="ticket/chat/{{ $feed['id'] }}">{{str_limit($feed['title'],50)}}</a>
                                            </h3>
                                            <p><?php echo str_limit($feed['content'],90); ?>...</p>
                                        </div>
                                    </li>
                                    @endforeach
                                        @endif
                                </ul>
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
<section id="createFeed" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Start A New Ticket</h4>
            </div>
            <div class="modal-body">
                <form name="createCompanyForm" action="/helpdesk/ticket/create" method="post"  class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="control-label">Title:</label>
                            <input id="title" class="form-control" name="title"
                                   placeholder="Ticket Title" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">Content:</label>
                            <textarea id="content" class="wysihtml5 form-control" rows="6" name="content" type="text" required></textarea>
                        </div>
                        <div class="form-group">
                                <label for="single" class="control-label">Add Department From Unit to Ticket</label>

                                <select id="add-users" class="form-control select2" name="unitID">
                                    @foreach($usersData['items'] as $user)
                                        <option value="{{$user['unitid']}}">{{ $user['unitname'] }}</option>
                                    @endforeach
                                </select>

                        </div>
                        <div class="form-group">
                            <input name="submit" value="Save Ticket" class="btn btn-primary" type="submit">
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
@endsection
@section('scripts')
    @parent
    <script src='{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}' type="text/javascript"></script>
    <script src='{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}' type="text/javascript"></script>
@endsection
