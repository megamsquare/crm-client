
<section id="createCallsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Calls</h4>
            </div>
            <div class="modal-body">
                <form name="createCallsForm" action="/crm/createaccountcall" method="post" class="form-horizontal">
                    <article class="col-md-12">
                        <input type="hidden" value="Mrs.Salawa" id="created_by" name="created_by_id">
                        <div class="form-group">
                            <label for="purpose" class="control-label">Purpose:</label>
                            <textarea id="purpose" class="form-control"  name="purpose"
                                 placeholder="Enter Your Purpose for the Call" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="details" class="control-label">Details:</label>
                            <textarea id="details" class="form-control"  name="details"
                                 placeholder="Enter Details for the Call" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="follow" class="control-label">Follow:</label>
                            <textarea id="follow" class="form-control"  name="follow"
                                 placeholder="Enter Follow for the Call" required></textarea>
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
