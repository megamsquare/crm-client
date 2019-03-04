<section id="createJobModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Job</h4>
            </div>
            <div class="modal-body">
                <form name="createDepartmentForm" action="/crm/createjob" method="post" 
                      class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Title : </label>
                            <input id="name" class="form-control" name="title"
                                   placeholder="Title" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Description : </label>
                            <input id="name" class="form-control" name="description"
                                   placeholder="Department Name" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Instruction : </label>
                            <input id="name" class="form-control" name=instruction"title"
                                   placeholder="Instruction" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Job size : </label>
                            <input id="name" class="form-control" name="title"
                                   placeholder="Job size" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Spot colour :</label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label"></label>
                            <label for="company" class="control-label">CYMK : </label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
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
          