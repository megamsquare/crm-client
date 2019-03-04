<section id="createNewDocumentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Note</h4>
            </div>
            <div class="modal-body">
                <form name="createDepartmentForm" action="/crm/createdocumenttransaction" method="post"
                      class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Document Name:</label>
                            <input type="hidden" name="crm_transaction_id" ng-model="crm_transaction_id" value="{{$transaction_id}}"/>
                            <input type="hidden" name="createdByUserId" ng-model="createdByUserId" value="1"/>
                            @verbatim
                            <input class="form-control" ng-model="searchField" placeholder="Type name of Account to suggest" ng-keyup="getListOfSuggestedDocument();" />

                            <article class="list-group" ng-show="searchWrapperVisible">
                                <a class="list-group-item user-info-unit" ng-repeat="Document in Documents" ng-click="addDocument(Document.id,Document.title);">{{Document.title}}</a>
                                <input type="hidden" name="crm_document_id" ng-model="crm_document_id" value="{{id}}"/>

                            </article>
                            @endverbatim

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
            