@extends('shared.layout')
@section('title', 'Feeds')
@section('navSelectedCRM','active open selected')
@section('crmFeeds','active')
@section("content")
@section('styles')
    @parent
    <link href='{{asset('assets/global/plugins/select2/css/select2.min.css')}}' rel="stylesheet" type="text/css" />
    <link href='{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}' rel="stylesheet" type="text/css" />
@endsection
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <h1>C.R.M.</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">C.R.M</a>
                </li>
                <li class="active">Feeds</li>
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
                    {{--<div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Comment</th>
                                <th>Feed</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created date</th>
                                <th class="actions">Actions</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Comment</td>
                                <td>Feeds</td>
                                <td>0</td>
                                <td>0</td>
                                <td>1</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>--}}
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet-body light bordered">
                        <div class="mt-element-list">
                            <div class="mt-list-head list-default green-haze">
                                <div class="row">
                                    <div class="col-xs-10">
                                        <div class="list-head-title-container">
                                            <h3 class="list-title uppercase">Feeds List</h3>
                                            <div class="badge badge-default list-count">Last Updates Apr 8, 2017 10:24AM</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="list-head-summary-container">
                                            <div class="list-done">
                                                <div class="list-count badge badge-default last">{{ $viewData['totalItemsCount'] }}</div>
                                                <div class="list-label">Feeds Following</div>
                                            </div>
                                            <div class="list-default">
                                                <a class="btn white margin-top-10 btn-outline btn-circle"   href="#createFeed" data-toggle="modal" data-toggle="dropdown">
                                                    <i class="fa fa-plus"></i>
                                                    <span class="hidden-xs"> Start new feed </span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-list-container list-default">
                                <ul>
                                   {{-- <li class="mt-list-item">
                                        <div class="list-icon-container done">
                                            <a href="javascript:;">
                                                <i class="icon-check"></i>
                                            </a>
                                        </div>
                                        <div class="list-datetime"> 10:24am
                                            <br/> 8 Apr, 2017 </div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase bold">
                                                <a href="javascript:;">Concept Proof</a>
                                            </h3>
                                            <p>First sentence in the description details here...</p>
                                        </div>
                                    </li>--}}
                                    @foreach($viewData['items'] as $feed)
                                    <li class="mt-list-item">
                                        <div class="list-icon-container">
                                            <a href="feeds/unfollow/{{ $feed['id'] }}" onclick="return confirm('Are you sure you want to unfollow this feed?');">
                                                <i class="icon-close"></i>
                                            </a>
                                        </div>
                                        <div class="list-datetime"> {{$feed['created_date']}} </div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase bold">
                                                <a href="feeds/chat/{{ $feed['id'] }}">{{str_limit($feed['title'],50)}}</a>
                                            </h3>
                                            <p>{{str_limit($feed['content'],90)}}</p>
                                        </div>
                                    </li>
                                    @endforeach
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
                <h4 class="modal-title">Start A New Feed</h4>
            </div>
            <div class="modal-body">
                <form name="createCompanyForm" action="/crm/feeds/create" method="post" class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="control-label">Title:</label>
                            <input id="title" class="form-control" name="title"
                                   placeholder="Feed Title" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">Content:</label>
                       <textarea id="content" class="form-control"  name="content"
                                 placeholder="Add Feed Description"  type="text" required></textarea>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label">Add Users to Feed</label>--}}

                                {{--<select id="add-users" class="form-control select2-multiple" multiple name="users[]" data-placeholder="Add Users">--}}
                                    {{--<option value="" selected="selected">select2/select2</option>--}}
                                    {{--@foreach($usersData['items'] as $user)--}}
                                        {{--<option value="{{$user['userid']}}">{{ $user['firstname'] . ' ' . $user['lastname'] . ' (' . $user['unitname'] . ')'}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}

                        {{--</div>--}}
                        <div class="form-group">
                            <input name="submit" value="Save Feed" class="btn btn-primary" type="submit">
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
    <script src='{{asset('js/feeds.js')}}'></script>
@endsection
