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
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet-body light bordered">
                        <div class="mt-element-list">
                            <div class="mt-list-head list-default green-haze">
                                <div class="row">
                                    <div class="col-xs-10">
                                        <div class="list-head-title-container">
                                            <h3 class="list-title uppercase" onclick="window.history.back();"> <i class="fa fa-arrow-left"></i> {{ $feedData['title'] }}</h3>
                                            <div class="badge badge-default list-count">Last Updates Apr 8, 2017 10:24AM</div>
                                            <div><a class="badge badge-default list-count" href="#feedDesc" data-toggle="modal"> <i class="fa fa-info"></i>
                                                    Feed Detail Information
                                                </a></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="list-head-summary-container">
                                            <div class="list-done">
                                                <div class="list-count badge badge-default last">{{count($feedUsersData['items'])}}</div>
                                                <div class="list-label">Users Following</div>
                                            </div>
                                            <div class="list-default">
                                                <div class="actions">
                                                    <div class="btn-group">
                                                <a class="btn white margin-top-10 btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-list"></i>
                                                     Feed Options
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a  href="#addUser" data-toggle="modal"><i class="fa fa-user-plus"></i> Add Users to Feed</a>
                                                    </li>
                                                    <li>
                                                        <a href="#createFeed" data-toggle="modal"><i class="fa fa-feed"></i> Start a New Feed</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="#removeUser" data-toggle="modal"><i class=" icon-layers"></i> Remove Users from Feed</a>
                                                    </li>
                                                    <li>
                                                        <a href="/crm/feeds/unfollow"><i class="fa fa-remove"></i> Unfollow This Feed</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="/crm/feeds/delete/"><i class="icon-close"></i> Close Feed</a>
                                                    </li>
                                                </ul>
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-list-container list-default">
                                <div class="portlet-body" id="chats">
                                    <div class="scroller" style="max-height: 400px;min-height: 100px;" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="chats">
                                            @foreach($commentData['items'] as $comment)
                                                @if($comment['commentedby'] == session('userinfo')['id'])
                                            <li class="out">
                                                    @if(file_exists(public_path().'/assets/layouts/layout5/img/'.session('userinfo')['passport']))
                                                        <img class="avatar" src="{{asset('/assets/layouts/layout5/img/'.session('userinfo')['passport'])}}" alt="" />
                                                    @else
                                                        <img class="avatar" src="{{asset('/assets/layouts/layout5/img/defaultImg.png')}}" alt="" />
                                                    @endif
                                                    <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name badge bg-white" title="{{ $comment['firstname'] . ' '.$comment['lastname'] }}"><i class="fa fa-user"></i> <strong>Me</strong> </a>
                                                    <span class="datetime  badge bg-white"> <i class="fa fa-clock-o"></i> {{ $comment['commenteddate'] }} </span>
                                                    <span class="body"> {{ $comment['comment'] }} </span>
                                                </div>
                                            </li>
                                                @else
                                            <li class="in">
                                                @if(file_exists(public_path().'/assets/layouts/layout5/img/'.$comment['commentedby'].'.jpg'))
                                                    <img class="avatar" src="{{asset('/assets/layouts/layout5/img/'.$comment['commentedby'].'.jpg')}}" alt="" />
                                                @else
                                                    <img class="avatar" src="{{asset('/assets/layouts/layout5/img/defaultImg.png')}}" alt="" />
                                                @endif
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name badge bg-white"><i class="fa fa-user"></i>  {{ $comment['firstname'] . ' '.$comment['lastname'] }} </a>
                                                    <span class="datetime  badge bg-white"> <i class="fa fa-clock-o"></i> {{ $comment['commenteddate'] }} </span>
                                                    <span class="body"> {{ $comment['comment'] }} </span>
                                                </div>
                                            </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="chat-form">
                                        <div class="input-cont">
                                             <textarea id="content" class="form-control"  name="comment"
                                                       placeholder="Type a message here..."  type="text" required></textarea>
                                        <div class="btn-cont">
                                            <span class="arrow"> </span>
                                            <a href="#" class="btn blue icn-only" onclick="addCommentAjax('{{ $feed_id }}',$('textarea[name=comment]').val(),'{{asset('/assets/layouts/layout5/img/defaultImg.png')}}')">
                                                <i class="fa fa-send icon-white"></i>
                                            </a>
                                        </div>
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
        <section id="addUser" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Users to Feed</h4>
                    </div>
                    <div class="modal-body">
                        <form name="createCompanyForm" action="/crm/feeds/addusers/{{$feed_id}}" method="post" class="form-horizontal">
                            <article class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Select Users and Add to Feed</label>

                                    <select id="add-users" class="form-control select2-multiple" multiple name="users[]" data-placeholder="Add Users">
                                        @foreach($usersData['items'] as $user)
                                            <option value="{{$user['userid']}}">{{ $user['firstname'] . ' ' . $user['lastname'] . ' (' . $user['unitname'] . ')'}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <input name="submit" value="Add Users" class="btn btn-primary" type="submit">
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
        <section id="removeUser" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Remove Users from Feed</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-actions-wrapper">
                            <form name="createCompanyForm" action="/crm/feeds/removeusers/{{$feed_id}}" method="post" class="form-horizontal">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr>
                                    <th> Select User</th>
                                    <th> Names</th>
                                    <th> Department </th>
                                    <th> Feed Access </th>
                                    <th> Date Added </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedUsersData['items'] as $user)
                                    <tr>
                                        <td><input type="checkbox" name="remove_users[]" value="{{ $user['userid'] }}"></td>
                                        <td>{{$user['firstname'].' '.$user['lastname']}}</td>
                                        <td>{{$user['unitname']}}</td>
                                        <td>
                                            @if($user['role'] == 0)
                                            Normal
                                                @elseif($user['role'] == 1)
                                            Admin
                                                @endif
                                        </td>
                                        <td>{{$user['dateadded']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                <input name="submit" value="Remove Selected User(s)" class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure you want to remove this users?');">
                            </form>
                        </div>
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
