
<section id="createNoteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Note</h4>
            </div>
            <div class="modal-body">
                <form name="createNoteForm" action="/crm/createnote" method="post" class="form-horizontal">
                    <article class="col-md-12">
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
                            <label for="title" class="control-label">Title:</label>
                            <input id="title" class="form-control"  name="title"
                                 placeholder="Enter Title for the Note" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Account Type:</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="L">Prospect</option>
                                <option value="C">Client</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note" class="control-label">Note:</label>
                            <textarea rows="10" id="notes" class="form-control"  name="notes"
                                 placeholder="Enter Note" required></textarea>
                        </div>
                        <div class="modal-footer">
                          <div class="form-group col-xs-6">
                              <input name="submit" value="Save" class="btn btn-success" type="submit">
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
