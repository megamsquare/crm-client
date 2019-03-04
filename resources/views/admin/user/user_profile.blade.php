@extends('shared.layout')
@section('title', 'Profile User')
@section('navSelectedHome','active open selected')
@section('adminUser','active')
@section("content")
@section('styles')
    @parent
    <link href='{{asset('assets/pages/css/profile-2.min.css')}}' rel="stylesheet" type="text/css" />
@endsection

    <div style="min-height: 440px;" class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>User Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">User Profile</li>
        </ol>
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
                    @include('shared.admin.leftnav')
                </nav>
            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content-col">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="profile">
                    <div class="tabbable-line tabbable-full-width">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab"> Overview </a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab"> Update Account </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_1">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="list-unstyled profile-nav">
                                            <li>
                                                <img src="{{asset('assets/layouts/layout5/img/defaultImg.png')}}" class="img-responsive pic-bordered" alt="" />
                                                <a href="#tab_1_3" data-toggle="tab" class="profile-edit"> edit </a>
                                            </li>
                                            {{--<li>
                                                <a href="javascript:;"> Feeds I'm Following  <span> 3 </span> </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> Messages </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> My Tasks <span> 15 </span></a>
                                            </li>--}}
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12 profile-info">
                                                <h1 class="font-green sbold uppercase">{{ $viewData['lastname'].' '.$viewData['firstname'] }}</h1>
                                                <p><i class="fa fa-envelope-o"></i> <a href="javascript:;">{{ $viewData['email'] }}</a></p>
                                                <ul class="list-inline">
                                                    <li>
                                                        <i class="fa fa-mobile"></i> {{ $viewData['phone'] }} </li>
                                                    <li>
                                                        <i class="fa fa-calendar"></i> {{ $viewData['created_date'] }} </li>
                                                    <li>
                                                        @if(!empty($viewData2))
                                                        <i class="fa fa-briefcase"></i> {{ title_case($viewData2['unit'].'/ '.$viewData2['department']) }} Department </li>
                                                    @else
                                                    <i class="fa fa-briefcase"></i> Not Assigned to Department Yet! | <a href="#">Assign Now </a></li>
                                                    @endif
                                                    {{--<li>
                                                        <i class="fa fa-star"></i> Top Seller </li>
                                                    <li>
                                                        <i class="fa fa-heart"></i> BASE Jumping </li>--}}
                                                </ul>
                                                @if(!empty($viewData2))
                                                <p> <strong>Unit Summary: </strong>{{ $viewData2['unit_desc'] }}</p>
                                                @else
                                                <p> <strong>Unit Summary: </strong> Unavailable</p>
                                                @endif
                                            </div>
                                            <!--end col-md-8-->
                                            <!--end col-md-4-->
                                        </div>
                                        <!--end row-->
                                        <div class="tabbable-line tabbable-custom-profile">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_11" data-toggle="tab"> Department/Unit Members </a>
                                                </li>
                                                {{--<li>
                                                    <a href="#tab_1_22" data-toggle="tab"> Feeds I'm Following </a>
                                                </li>--}}
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1_11">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-advance table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-user"></i> Names </th>
                                                                <th class="hidden-xs">
                                                                    <i class="fa fa-envelope"></i> Email Address </th>
                                                                <th>
                                                                    <i class="fa fa-phone"></i> Phone No </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(!empty($unitMembers))
                                                                @foreach($unitMembers as $member)
                                                                    <tr>
                                                                        <td>{{ $member['lastname'].' '.$member['firstname'] }}</td>
                                                                        <td>{{ $member['email'] }}</td>
                                                                        <td>{{ $member['phone'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                @if(!empty($viewData3))
                                                                    @foreach($viewData3 as $member)
                                                                        <tr>
                                                                            <td>{{ $member["crmUsers"]['lastname'].' '.$member["crmUsers"]['firstname'] }}</td>
                                                                            <td>{{ $member["crmUsers"]['email'] }}</td>
                                                                            <td>{{ $member["crmUsers"]['phone'] }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td colspan="3"><section>
                                                                                <h3>No members in this unit yet.</h3>
                                                                            </section></td>

                                                                    </tr>
                                                                @endif
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!--tab-pane-->
                                               {{-- <div class="tab-pane" id="tab_1_22">
                                                    <div class="tab-pane active" id="tab_1_1_1">
                                                        <div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
                                                            <ul class="feeds">
                                                                <li>
                                                                    <div class="col1">
                                                                        <div class="cont">
                                                                            <div class="cont-col1">
                                                                                <div class="label label-success">
                                                                                    <i class="fa fa-bell-o"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cont-col2">
                                                                                <div class="desc"> You have 4 pending tasks.
                                                                                                    <span class="label label-danger label-sm"> Take action
                                                                                                        <i class="fa fa-share"></i>
                                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col2">
                                                                        <div class="date"> Just now </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <div class="col1">
                                                                            <div class="cont">
                                                                                <div class="cont-col1">
                                                                                    <div class="label label-success">
                                                                                        <i class="fa fa-bell-o"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cont-col2">
                                                                                    <div class="desc"> New version v1.4 just lunched! </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col2">
                                                                            <div class="date"> 20 mins </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>--}}
                                                <!--tab-pane-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--tab_1_2-->
                            <div class="tab-pane" id="tab_1_3">
                                <div class="row profile-account">
                                    <div class="col-md-3">
                                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                                            <li class="active">
                                                <a data-toggle="tab" href="#personal_info">
                                                    <i class="fa fa-cog"></i> Personal info </a>
                                                <span class="after"> </span>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#change_passport">
                                                    <i class="fa fa-picture-o"></i> Change Passport </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#change_password">
                                                    <i class="fa fa-lock"></i> Change Password </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content">
                                            <div id="personal_info" class="tab-pane active">
                                                <form role="form" action="/admin/user/update_profile/{{ $viewData['id'] }}" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label">Username</label>
                                                        <input type="text" value="{{ $viewData['username'] }}" disabled class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" name="firstname" value="{{ $viewData['firstname'] }}" class="form-control" required /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="lastname" value="{{ $viewData['lastname'] }}" class="form-control" required /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile Number</label>
                                                        <input type="text" name="phone" value="{{ $viewData['phone'] }}" class="form-control" required /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Email Address</label>
                                                        <input type="text" name="email" value="{{ $viewData['email'] }}" class="form-control" required /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Gender:</label>
                                                        <select name="gender" class="form-control" required>
                                                            <option value="m" @if(strtolower($viewData['gender']) == 'm') selected="selected" @endif >Male</option>
                                                            <option value="f" @if(strtolower($viewData['gender']) == 'f') selected="selected" @endif >Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Staff ID Number</label>
                                                        <input type="text" name="staffno" value="{{ $viewData['staffno'] }}" class="form-control" required /> </div>
                                                    <div class="margiv-top-10">
                                                        <input name="submit" value="Save Changes" class="btn green" type="submit">
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="change_passport" class="tab-pane">
                                                <form action="/admin/user/change_passport/{{ $viewData['id'] }}" method="post" role="form">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div>
                                                                                <span class="btn default btn-file">
                                                                                    <input type="file" name="..."> </span>
                                                            </div>
                                                        </div>
                                                        {{--<div class="clearfix margin-top-10">
                                                            <span class="label label-danger"> NOTE! </span>
                                                            <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                        </div>--}}
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <a href="javascript:;" class="btn green"> Submit </a>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="change_password" class="tab-pane">
                                                <form action="/admin/user/change_password/{{ $viewData['id'] }}" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" name="current" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">New Password</label>
                                                        <input type="password" name="new" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Re-type New Password</label>
                                                        <input type="password" name="confirm" class="form-control" /> </div>
                                                    <div class="margin-top-10">
                                                        <input name="submit" value="Change Password" class="btn green" type="submit">
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-md-9-->
                                </div>
                            </div>
                            <!--end tab-pane-->
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
