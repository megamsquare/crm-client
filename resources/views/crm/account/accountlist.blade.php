@extends('shared.layout')
@section('title', 'Client List')
@section('navSelectedCRM','active open selected')
@if($action == 'client') @section('crmAccount','active')
    @else @section('crmAccountLead','active')
@endif
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
                <a href="#">C.R.M.</a>
            </li>
            <li class="active">{{ $action or '' }}</li>
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
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">

                                <span class="caption-subject font-red sbold uppercase"><i class="icon-settings font-red"></i> {{ $action or '' }} Account List</span>
                                {{--<a class="btn btn-outline btn-circle btn-sm red" data-toggle="modal" href="#createAccount">Add a new Client</a>--}}
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn red btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> {{ title_case($action) }} Options
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a  href="#createAccount" data-toggle="modal"><i class="fa fa-user-plus"></i> Add a new Account</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="/crm/account/client"><i class=" icon-layers"></i> List Client Accounts</a>
                                        </li>
                                        <li>
                                            <a href="/crm/account/prospect"><i class=" icon-layers"></i> List Prospect Accounts</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="javascript:;"><i class="fa fa-users"></i> View All Client Personnel</a>
                                        </li>
                                        {{--<li>
                                            <a href="javascript:;">Option 4</a>
                                        </li>--}}
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="">
                                <table class="table table-light table-hover order-column" id="account_1">
                                    <thead>
                                        <tr>
                                            <th width="25%"> {{ title_case($action) }} Name </th>
                                            <th> Date Created </th>
                                            <th> Created By</th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewData['items'] as $account)
                                        <tr class="odd gradeX">
                                            <td>{{$account['crmAccounts']['name']}}</td>
                                            <td>{{$account['crmAccounts']['created_date']}}</td>
                                            <td>{{$account['firstname'].' '.$account['lastname']}}</td>
                                            <td class="actions">
                                                <a href="javascript:void(0);" onclick="editAccountAction(this);" class="btn btn-info edit-account" data-id="{{$account['crmAccounts']['id']}}" data-name="{{$account['crmAccounts']['name']}}" data-stage="{{$account['crmAccounts']['stage']}}" data-account_source="{{$account['crmAccounts']['account_source']}}" data-about="{{$account['crmAccounts']['about']}}" data-createdby_id="{{$account['crmAccounts']['createdby_id']}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="/crm/account/delete/{{$account['crmAccounts']['id']}}" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</a>

                                                <div class="btn-group form-inline">
                                                    <button type="button" class="btn green btn-outline dropdown-toggle" data-toggle="dropdown"> More
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu action-dropdown">
                                                        <li> <a href="/crm/calls?account_id={{$account['crmAccounts']['id']}}"><i class="fa fa-phone"></i> View Calls</a> </li>
                                                        <li> <a href="/crm/visits?account_id={{$account['crmAccounts']['id']}}"><i class="fa fa-bus"></i> View Visits</a> </li>
                                                        <li> <a href="/crm/transaction?crm_account_id={{$account['crmAccounts']['id']}}"><i class="fa fa-list"></i> View Transactions</a> </li>
                                                        <li class="divider"></li>
{{--                                                        <li> <a href="/crm/account/documents/{{$account['crmAccounts']['id']}}"><i class="fa fa-book"></i> Associated Documents</a> </li>
                                                        <li> <a href="/crm/account/notes/{{$account['crmAccounts']['id']}}"><i class="icon-note"></i> Associated Notes</a> </li>
                                                        <li> <a href="/crm/account/mails/{{$account['crmAccounts']['id']}}"><i class="fa fa-envelope"></i> Associated Mails</a> </li>
                                                        <li class="divider"></li>--}}
                                                        <li> <a href="javascript:void(0);" onclick="addPersonnelAction(this);" class="add-account-personnel" data-id="{{$account['crmAccounts']['id']}}"><i class="fa fa-user-plus"></i> Add Client Personnel</a> </li>
                                                        <li> <a href="/crm/account/personnel/{{$account['crmAccounts']['id']}}"><i class="fa fa-user"></i> Client Personnels</a> </li>
                                                    </ul>
                                                    </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="padding-bottom: 150px;"></div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>

                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT -->
</div>
<section id="createAccount" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create {{ title_case($action) }}</h4>
            </div>
            <div class="modal-body">
                <form name="createCompanyForm" action="/crm/account/create" method="post" class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="account_name" class="control-label">{{ title_case($action) }} Name:</label>
                            <input id="account_name" class="form-control" name="name"
                                   placeholder="{{ title_case($action) }} Name" type="text" required>
                        </div>
                        {{--<div class="form-group">
                            <label for="phone" class="control-label">Phone No:</label>
                           <input id="phone" class="form-control"  name="phone"
                                     placeholder="Phone"  type="text" ng-model="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Preferred Email:</label>
                           <input id="email" class="form-control"  name="email"
                                     placeholder="Preferred Email"  type="text" ng-model="email" required>
                        </div>--}}
                        <div class="form-group">
                            <label for="stage" class="control-label">Stage:</label>
                            <select name="stage" id="stage" class="form-control" required>
                                <option value="customer">Client</option>
                                <option value="lead">Prospective</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="source" class="control-label">{{ title_case($action) }} Source:</label>
                           <input id="source" class="form-control"  name="source"
                                     placeholder="{{ title_case($action) }} Source"  type="text" ng-model="account_source" required>
                        </div>
                        <div class="form-group">
                            <label for="about" class="control-label">About:</label>
                           <textarea id="about" class="form-control"  name="about"
                                     placeholder="About"  type="text" ng-model="about" required></textarea>
                        </div>
                        <div class="form-group">
                            <input name="submit" value="Save {{ title_case($action) }}" class="btn btn-primary" type="submit">
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
<section id="editAccount" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit {{ title_case($action) }}</h4>
            </div>
            <div class="modal-body">
                <form name="editForm" action="/crm/account/edit" method="post" class="form-horizontal">
                    <input id="crm_user_id" class="form-control" name="user_id" value="1" type="hidden" >
                    <input id="account_id" class="form-control" name="id"  type="hidden" >
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="account_name" class="control-label">{{ title_case($action) }} Name:</label>
                            <input id="account_name" class="form-control" name="name"
                                   placeholder="{{ title_case($action) }} Name" type="text" required>
                        </div>
                        {{--<div class="form-group">
                            <label for="phone" class="control-label">Phone No:</label>
                            <input id="phone" class="form-control"  name="phone"
                                   placeholder="Phone"  type="text" ng-model="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Preferred Email:</label>
                            <input id="email" class="form-control"  name="email"
                                   placeholder="Preferred Email"  type="text" ng-model="email" required>
                        </div>--}}
                        <div class="form-group">
                            <label for="stage" class="control-label">Stage:</label>
                            <select name="stage" id="stage" class="form-control" required>
                                <option value="customer">Client</option>
                                <option value="lead">Prospective</option>
                            </select>

                            {{--<input id="stage" class="form-control"  name="stage"
                                   placeholder="Stage"  type="text" ng-model="stage" required>--}}
                        </div>
                        <div class="form-group">
                            <label for="source" class="control-label">Client Source:</label>
                            <input id="source" class="form-control"  name="source"
                                   placeholder="{{ title_case($action) }} Source"  type="text" ng-model="account_source" required>
                        </div>
                        <div class="form-group">
                            <label for="about" class="control-label">About:</label>
                           <textarea id="about" class="form-control"  name="about"
                                     placeholder="About"  type="text" ng-model="about" required></textarea>
                        </div>
                        <div class="form-group">
                            <input name="submit" value="Save {{ title_case($action) }} Changes" class="btn btn-primary" type="submit">
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
<section id="addAccountPersonnel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Provide Account Personnel Details</h4>
            </div>
            <div class="modal-body">
                <form name="addAcctUserForm" action="/crm/account/addpersonnel" method="post" class="form-horizontal">
                    <input id="account_id" class="form-control" name="acctid" value="" type="hidden" >
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="firstname" class="control-label">Firstname:</label>
                            <input id="firstname" class="form-control" name="firstname"
                                   placeholder="Firstname" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="control-label">Lasname:</label>
                            <input id="lastname" class="form-control" name="lastname"
                                   placeholder="Lasname" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Preferred Email:</label>
                            <input id="email" class="form-control"  name="email"
                                   placeholder="Preferred Email"  type="text" ng-model="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">Phone No:</label>
                            <input id="phone" class="form-control"  name="phone"
                                   placeholder="Phone"  type="text" ng-model="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="control-label">Gender:</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input value="Save Account Personnel" class="btn btn-primary" type="submit">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#account_1').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
    </script>

    @parent
    <script src='{{asset('app/controllers/accountController.js')}}'></script>
    <script src='{{asset('js/account.js')}}'></script>
    <script src='{{asset('assets/pages/scripts/form-wizard.min.js')}}' type="text/javascript"></script>
@endsection
