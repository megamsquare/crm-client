<section id="createChecklistModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Checklist</h4>
            </div>
            <div class="modal-body">
                <form name="createDepartmentForm" action="/crm/createtransaction" method="post" 
                      class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Type of Document :</label>
                            <textarea id="type_of_document" class="form-control" name="type_of_document" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Is the logo okay the way you want it to appear? :</label>
                            <select name="logo" id="logo" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Is the name of your organization spelt correctly? :</label>
                            <select name="org_name" id="org_name" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Is the RC Number correct? :</label>
                            <select name="rc_number" id="rc_number" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Are there any typos on the details? :</label>
                            <select name="any_typo" id="any_typo" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Are all details on the covers and accessories correct? :</label>
                            <select name="detail_cover_access" id="detail_cover_access" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Additional Information :</label>
                            <textarea id="additional_info" class="form-control" name="additional_info" required></textarea>
                        </div>
                        <div class="form-group">
                           <label for="company" class="control-label">Fill in Date </label>
                            <input id="filleddate" class="form-control" name="filleddate" placeholder="" type="text" required>
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