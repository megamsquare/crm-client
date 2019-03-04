<section id="createProofGenerationTimeScheduleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Proof Generation Time Schedule</h4>
            </div>
            <div class="modal-body">
                <form name="createDepartmentForm" action="/crm/createtransaction" method="post"
                      class="form-horizontal">
                    <article class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="name" class="control-label">Start Date Brief is Given To
                                        Studio : </label>
                                    <input id="name" class="form-control" name="title"
                                           placeholder="" type="text" required>
                                </div>
                                <div class="col-xs-5">
                                    <label for="name" class="control-label">Received by, Date, Time
                                        : </label>
                                    <input id="name" class="form-control" name="title"
                                           placeholder="" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <label for="name" class="control-label">Agreed Target Time : </label>
                                    <select name="agreed_target_time" id="company" class="form-control" required>
                                        <option value="Hard copy">John Hanks</option>
                                        <option value="Soft copy">Peter Ojo</option>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <input id="name" class="form-control" name="time" placeholder="Colour" type="text"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                    <label for="name" class="control-label">End Time : </label>
                                    <input id="name" class="form-control" name="title" placeholder="" type="text"
                                           required>
                                </div>
                            </div>
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
