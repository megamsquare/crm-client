<section id="createAncillariesModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Ancillaries</h4>
            </div>
            <div class="modal-body">
                <form name="createDepartmentForm" action="/crm/createtransaction" method="post" 
                      class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Ancillaries :</label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="">Front Cover</option>
                                <option value="">Back Cover</option>
                                <option value="">Re order Slip</option>
                                <option value="">Stanbic IBTC</option>
                                <option value="">Cash Analysis</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Sheet :</label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="">Continuous Sheet</option>
                                <option value="">Loose Leaf</option>
                                <option value="">Booklet</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Hologram : </label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="">Y</option>
                                <option value="">N</option>
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
           