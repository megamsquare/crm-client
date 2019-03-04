@extends('shared.layout')
@section('title', 'Transaction')
@section('navSelectedCRM','active open selected')
@section('crmTransaction','active')
@section("content")
    <article ng-controller="TransactionController">
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
                <li class="active">Transactions</li>
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
                    <a href="javascript:void(0);" class="btn btn-primary showCreateDepartmentModal"><i class="fa fa-plus-circle"></i> Create Transaction</a>
                    <br/><br/>
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Client</th>
                                <th>Unit</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial=1;
                            //DD($viewData);
                            ?>
                            @foreach($viewData as $transaction)
                                <tr>
                                    <td>{{$serial}}</td>
                                    <td>{{$transaction['crmAccounts']['name']}}</td>
                                    <td>{{$transaction['crmUnits']['title']}}</td>
                                    <td>{{\App\Services\BaseService::formatMoney($transaction['crmTransactions']['amount'])}}</td>
                                    <td>{{\App\Services\TransactionTypeService::getTransactionTypeFormattedText($transaction['crmTransactions']['transacttype'])}}</td>
                                    <td>{{$transaction['crmAccounts']['created_date']}}</td>
                                    <td class="actions">
                                        @if($transaction['crmTransactions']['transacttype'] ==\App\Services\TransactionTypeService::TRANSACTION_TYPE_COMMERCIAL_PRINTS )
                                        <a href="/crm/commercialPrints?crm_transaction_id={{$transaction['crmTransactions']['id']}}" class="btn btn-info btn-sm" data-id="{{$transaction['crmTransactions']['id']}}"
                                        ><i class="fa fa-plus-circle"></i> Create Forms</a>
                                       @elseif($transaction['crmTransactions']['transacttype'] ==\App\Services\TransactionTypeService::TRANSACTION_TYPE_SECURITY_PRINTS )
                                            <a href="/crm/securityPrints?crm_transaction_id={{$transaction['crmTransactions']['id']}}" class="btn btn-info btn-sm" data-id="{{$transaction['crmTransactions']['id']}}"
                                            ><i class="fa fa-plus-circle"></i> Create Forms </a>
                                        @endif

                                        <a href="/crm/viewmoretransaction?transaction_id={{$transaction['crmTransactions']['id']}}" class="btn btn-info btn-sm" data-id="{{$transaction['crmTransactions']['id']}}"
                                           data-companyname="{{$transaction['crmUnits']['title']}}" data-departmentname="{{$transaction['crmUnits']['title']}}"
                                           data-departmentdescription="{{$transaction['crmUnits']['title']}}"><i class="fa fa-eye"></i> View more</a>
                                        <a href="javascript:void(0);" class="btn btn-info edit-department btn-sm" data-id="{{$transaction['crmTransactions']['id']}}"
                                           data-companyname="{{$transaction['crmUnits']['title']}}" data-departmentname="{{$transaction['crmUnits']['title']}}"
                                           data-departmentdescription="{{$transaction['crmUnits']['title']}}"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="/crm/deletetransaction" class="form-horizontal form-inline" method="post">
                                            <input type="hidden"  name="id" value="{{$transaction['crmTransactions']['id']}}"/>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i> Delete</button>
                                        </form>

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
   <section id="createDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Transaction</h4>
                </div>
                <div class="modal-body">
                    <form name="createDepartmentForm" action="/crm/createtransaction" method="post"  class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                @verbatim
                                <input class="form-control" ng-model="searchField" placeholder="Type name of Account to suggest" ng-keyup="getListOfSuggestedAccount();" />

                                <article class="list-group" ng-show="searchWrapperVisible">
                                    <a class="list-group-item user-info-unit" ng-repeat="Account in Accounts" ng-click="addAccount(Account.id,Account.name);">{{Account.name}}</a>
                                    <input type="hidden" name="accountId" ng-model="company" value="{{id}}"/>
                                </article>
                                @endverbatim
                            </div>
                            <div class="form-group">
                                <label for="amount" class="control-label">Project worth:</label>
                                <input id="amount" class="form-control" name="amount"
                                       placeholder="Project worth" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Unit:</label>
                                <select name="unitId" id="unitId" class="form-control" required>
                               @foreach($usersData['items'] as $user)
                                   <option value="{{$user['unitid']}}">{{ $user['unitname'] }}</option>
                               @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="transacttype" class="control-label">Transaction Type : </label>
                                <select name="transacttype" id="transacttype" class="form-control" required>
                                   <option value="{{\App\Services\TransactionTypeService::TRANSACTION_TYPE_COMMERCIAL_PRINTS}}">Commercial Prints</option>
                                    <option value="{{\App\Services\TransactionTypeService::TRANSACTION_TYPE_SECURITY_PRINTS}}">Security Prints</option>
                                </select>
                            </div>
                            <input  name="createdByUserId" value="1" type="hidden">
                            <div class="form-group">
                                <input name="submit" value="Save" class="btn btn-primary" type="submit">
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
    <section id="editDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Transaction</h4>
                </div>
                <div class="modal-body">
                    <form name="createDepartmentForm" action="/crm/edittransaction" method="post"  class="form-horizontal">
                        <article class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Account Name:</label>
                                <select name="company" id="company" class="form-control" required>
                                    <option value="">Standard Chartered</option>
                                    <option value="">GTBank</option>
                                    <option value="">Stanbic IBTC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Unit:</label>
                           <select name="company" id="company" class="form-control" required>
                                    <option value="">Check Localization</option>
                                    <option value="">Papyrus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="submit" value="Save" class="btn btn-primary" type="submit">
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
    </article>
@endsection
@section('scripts')
    @parent
    <script src='{{asset('js/company.js')}}'></script>
    <script src='{{asset('app/controllers/transactionController.js')}}'></script>
    <script src='{{asset('js/transactionMain.js')}}'></script>
@endsection
