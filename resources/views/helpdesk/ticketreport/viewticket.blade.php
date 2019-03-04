@extends('shared.layout')
@section('title', 'Ticket')
@section('navSelectedHELPDESK','active open selected')
@section('helpdeskReport','active')
@section("content")
@section('styles')
    @parent
    <link href='{{asset('assets/global/plugins/select2/css/select2.min.css')}}' rel="stylesheet" type="text/css" />
    <link href='{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}' rel="stylesheet" type="text/css" />
    <link href='{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}' rel="stylesheet" type="text/css" />
@endsection
    <div style="min-height: 440px;" class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <?php //dd($helpdeskCommentData['items'][0]['crmUsers']['firstname']); ?>
        <div class="breadcrumbs">
            <h1>Help Desk</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/crm">Help Desk</a>
                </li>
                <li class="active">Ticket Report </li>
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
                            <div class="mt-list-head list-default red-haze">
                                <div class="row">
                                    <div class="col-xs-10">
                                        <div class="list-head-title-container">
                                            <h3 class="list-title uppercase">{{$helpdeskCommentData['items'][0]['crmFeeds']['title']}}</h3>
                                            @if(!is_null($helpdeskCommentData['itemComment'][0]['crmFeedComments']['id']))
                                            <div class="badge badge-default list-count">{{count($helpdeskCommentData['items'])}} Comment</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="list-head-summary-container">
                                            <div class="list-done">
                                                <div class="list-count badge badge-default last">{{count($helpdeskUsersData['items'])}}</div>
                                                <div class="list-label">Users Following</div>
                                            </div>
                                            <div class="list-default">
                                                <a class="btn white margin-top-10 btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-list"></i>
                                                     Ticket Options
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a  href="#addUser" data-toggle="modal"><i class="fa fa-user-plus"></i> Add Users to Ticket</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="#removeUser" data-toggle="modal"><i class=" icon-layers"></i> Remove Users From Ticket</a>
                                                    </li>
                                                    <li>
                                                        <a href="/crm/account/lead"><i class="fa fa-remove"></i> Unfollow This Feed</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;"><i class="fa fa-users"></i> Start a New Feed</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-list-container list-default">
                                <div class="portlet-body" id="chats">
                                    <div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="chats">
                                          <li class="out" style="border-left: 2px solid #F3565D;text-align: justify;">
                                              <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />
                                              <div class="message" style="background: rgba(0, 255, 255, 0.14); padding:10px;border-right: 2px solid #F3565D;text-align: justify;">
                                                  <span class="arrow"> </span>
                                                  <a href="javascript:;" class="name" style="font-size: 20px;"> {{$helpdeskCommentData['items'][0]['crmUsers']['firstname'].' '.$helpdeskCommentData['items'][0]['crmUsers']['lastname']}} </a>
                                                  <span class="datetime"> on {{$helpdeskCommentData['items'][0]['crmFeeds']['created_date']}} </span>
                                                  <span class="body"> <?php echo $helpdeskCommentData['items'][0]['crmFeeds']['content']; ?> </span>
                                              </div>
                                          </li>

                                          @if(!is_null($helpdeskCommentData['itemComment'][0]['crmFeedComments']['id']))
                                          @foreach($helpdeskCommentData['itemComment'] as $user)
                                            <li class="in">
                                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> {{$user['crmUsers']['firstname'].' '.$user['crmUsers']['lastname']}} </a>
                                                    <span class="datetime"> on {{$user['crmFeedComments']['created_date']}} </span>
                                                    <span class="body"> <?php echo $user['crmFeedComments']['commented']; ?> </span>
                                                </div>
                                            </li>
                                          @endforeach
                                          @endif
                                        </ul>
                                    </div>
                                      @if($helpdeskCommentData['items'][0]['crmFeeds']['status'] == 0)
                                      <form action="/helpdesk/ticketreport/comment/{{$helpdesk_id}}" method="post"  class="form-horizontal ">
                                        <input type="hidden" value="1" id="userid" name="userid">
                                        <input type="hidden" value="{{$helpdesk_id}}" id="helpdeskid" name="helpdeskid">
                                        <div class="form-group input-cont">
                                             <textarea id="content" class="wysihtml5 form-control"  name="commented" placeholder="Type a message here..."  type="text" required></textarea>
                                        </div>
                                         <div class="form-group">
                                           <input name="submit" value="Comment" class="btn blue icn-only" type="submit">
                                         </div>
                                    </form>
                                    @else($helpdeskCommentData['items'][0]['crmFeeds']['status'] == 1)
                                    @endif
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
                    <h4 class="modal-title">Add Users to Ticket</h4>
                </div>
                <div class="modal-body">
                    <form name="createCompanyForm" action="/helpdesk/ticketreport/add" method="post"  class="form-horizontal">
                        <article class="col-md-12">
                            <input type="hidden" value="{{$helpdesk_id}}" id="feedID" name="feedID">
                            <div class="form-group">
                                <label class="control-label">Select Users and Add to Ticket</label>

                                <select id="add-users" class="form-control select2-multiple" multiple name="userID[]" data-placeholder="Add Users">
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
    <section id="removeUser" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Remove Users from Ticket</h4>
                </div>
                <div class="modal-body">
                    <div class="table-actions-wrapper">
                        <form name="createCompanyForm" action="/helpdesk/ticketreport/removeusers/{{$helpdesk_id}}" method="post"  class="form-horizontal">
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
                              @foreach($helpdeskUsersData['items'] as $user)
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
    <script src='{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}' type="text/javascript"></script>
    <script src='{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}' type="text/javascript"></script>
@endsection
