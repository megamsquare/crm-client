<section id="createDesignGenerationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Design Generation</h4>
            </div>
            <div class="modal-body">
                <form name="createDesignGenerationForm" action="/crm/createdesigngenerationtransaction" method="post" 
                      class="form-horizontal">
                    <article class="col-md-12">
                        <input  name="createdByUserId" value="1" type="hidden">
                        <input  name="crm_transaction_id" value="1" type="hidden">
                        <div class="form-group">
                            <label for="name" class="control-label">Design Type : </label>
                            <select name="design_type" id="design_type" class="form-control" required>
                                <option value="Generate New Design">Generate New Design</option>
                                <option value="Adopt Existing Design">Adopt Existing Design</option>
                                <option value="Generate New Design">Use Client Design</option>
                                <option value="Adopt Existing Design">Modify Existing Design</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Soft Copy of Design supplied : </label>
                            <select name="soft_copy_of_design supplied" id="company" class="form-control"
                                    required>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Client as : </label>
                            <input id="name" class="form-control" name="clientas"
                                   placeholder="Instruction" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Other : </label>
                            <input id="name" class="form-control" name="title"
                                   placeholder="Job size" type="text" required>
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
