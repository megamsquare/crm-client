<section id="createLogoColourModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Design Generation</h4>
            </div>
            <div class="modal-body">
                <form name="createDepartmentForm" action="/crm/createtransaction" method="post" 
                      class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Pantone (Reference colours) : </label>
                            <div class="row">
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="pantone[]"
                                           placeholder="Colour" type="text" required>
                                </div>
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="pantone[]"
                                           placeholder="Colour" type="text" required>
                                </div>
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="pantone[]"
                                           placeholder="Colour" type="text" required>
                                </div>
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="pantone[]"
                                           placeholder="Colour" type="text" required>
                                </div>
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="pantone[]"
                                           placeholder="Colour" type="text" required>
                                </div>
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="pantone[]"
                                           placeholder="Colour" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="name" class="control-label">Existing Colour : </label>
                                    <select name="existing_colour"
                                            class="form-control" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-xs-7">
                                    <label for="name" class="control-label">Supplied As: </label>
                                    <select name="supplied_as"
                                            class="form-control" required>
                                        <option value="Hard copy">Hard copy</option>
                                        <option value="Soft copy">Soft copy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="supplied_digit_as"
                                   placeholder="Supplied Digit As" type="text" required>
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
           