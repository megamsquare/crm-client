@extends('shared.layout')
@section('title', 'Visit')
@section('navSelectedCRM','active open selected')
@section('crmVisit','active')
@section("content")
  <article ng-controller="visitController">
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
                <li class="active">Visit </li>
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
                  <a href="javascript:void(0);" class="btn btn-primary showCreateVisitModal"><i class="fa fa-bus"></i> Create Visit For Client</a>
                  <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Created By</th>
                                <th>Purpose</th>
                                <th>Details</th>
                                <th>Follow</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            ?>
                            @foreach($viewData['items'] as $visit)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$visit['crmUsers']['firstname'].' '.$visit['crmUsers']['lastname']}}</td>
                                    <td>{{$visit['crmVisitCalls']['purpose']}}</td>
                                    <td>{{$visit['crmVisitCalls']['details']}}</td>
                                    <td>{{$visit['crmVisitCalls']['follow']}}</td>
                                    <td>{{$visit['crmVisitCalls']['created_date']}}</td>
                                    <td class="actions">
                                        <a href="javascript:void(0);" class="btn btn-info edit-visit" data-id="{{$visit['crmVisitCalls']['id']}}"
                                           data-name="{{$visit['crmVisitCalls']['created_by_id']}}"
                                           data-visitpurpose="{{$visit['crmVisitCalls']['purpose']}}"
                                           data-visitdetails="{{$visit['crmVisitCalls']['details']}}"
                                           data-visitfollow="{{$visit['crmVisitCalls']['follow']}}"><i class="fa fa-edit"></i> Edit
                                         </a>
                                    </td>
                                </tr>
                                <?php
                                $serial++;
                                ?>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END SIDEBAR CONTENT LAYOUT -->
    </div>
    <section id="createVisitModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Visit</h4>
                </div>
                <div class="modal-body">
                    <form name="createVisitForm" action="/crm/createvisit" method="post"  class="form-horizontal">
                        <article class="col-md-12">
                            <input type="hidden" value="1" id="visit_call" name="visit_calls_type">
                            <div class="form-group">
                              @verbatim
                              <input class="form-control" ng-model="searchField" placeholder="Type name of Account to suggest" ng-keyup="getListOfSuggestedAccount();" />
                              <article class="list-group" ng-show="searchWrapperVisible">
                                  <input type="hidden" name="crm_account_id" ng-model="id" value="{{id}}"/>
                                  <a class="list-group-item user-info-unit" ng-repeat="Account in Accounts" ng-click="addAccount(Account.id,Account.name);">{{Account.name}}</a>
                              </article>
                              @endverbatim
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label">Account Type:</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="L">Prospect</option>
                                    <option value="C">Client</option>
                                </select>
                            </div>
                            <div class="form-group">
                                  <label for="entry_date" class="control-label">Visitation Date: </label>
                                  <input id="entry_date" readonly class="form-control form_datetime" name="entry_date"
                                         placeholder="Click To Enter Visitation Date" type="text" value="{{old('entry_date')}}" required ng-model="proof_generation_start_date_to_studio">
                            </div>
                            <div class="form-group">
                                <label for="purpose" class="control-label">Purpose:</label>
                                <textarea id="purpose" class="form-control"  name="purpose"
                                     placeholder="Enter Your Purpose for the visit" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="details" class="control-label">Details:</label>
                                <textarea id="details" class="form-control"  name="details"
                                     placeholder="Enter Details for the visit" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="follow" class="control-label">Follow Up:</label>
                                <textarea id="follow" class="form-control"  name="follow"
                                     placeholder="Enter Follow Up for the visit" required></textarea>
                            </div>
                            <div class="modal-footer">
                              <div class="form-group col-xs-6">
                                  <input name="submit" value="Save" class="btn btn-primary" type="submit">
                              </div>
                              <div class="form-group col-xs-2">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </article>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </section>
    <section id="editVisitModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Visit</h4>
                </div>
                <div class="modal-body">
                    <form action="/crm/editvisit" method="post" name="editvisitForm"  class="form-horizontal">
                      <article class="col-md-12">
                          <div class="form-group">
                              <label for="purpose" class="control-label">Purpose:</label>
                              <textarea id="purpose" class="form-control"  name="purpose"
                                   placeholder="Enter Your Purpose for the visit" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="details" class="control-label">Details:</label>
                              <textarea id="details" class="form-control"  name="details"
                                   placeholder="Enter Details for the visit" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="follow" class="control-label">Follow:</label>
                              <textarea id="follow" class="form-control"  name="follow"
                                   placeholder="Enter Follow for the visit" required></textarea>
                          </div>
                          <div class="modal-footer">
                            <div class="form-group col-xs-6">
                                <input name="submit" value="Save" class="btn btn-primary" type="submit">
                            </div>
                            <div class="form-group col-xs-2">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                      </article>
                        <input  name="id" value="" type="hidden">
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </section>
    </article>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('app/controllers/visitCallController.js')}}'></script>
    <script src='{{asset('js/visitCalls.js')}}'></script>
@endsection
