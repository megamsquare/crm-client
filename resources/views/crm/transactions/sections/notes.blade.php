<div class="portlet blue-hoki box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Notes
        </div>
        <div class="actions">
            <a href="javascript:;"
               class="btn btn-default btn-sm showcreateNewNoteModal">
                <i class="fa fa-pencil"></i> New Note </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <section class="table-responsive">
                <table class="table table-bordered"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php
                                $i = 0;
                            echo ++$i;
                            ?></td>
                        <td><?php echo $viewData[0]['crmNotes']['title']; ?></td>
                        <td><?php echo $viewData[0]['crmNotes']['notes']; ?></td>
                        <td><?php echo $viewData[0]['crmNotes']['created_date']; ?></td>
                    </tr>
                    </tbody>
                </table>
            </section>
            <a class="btn btn-primary showcreateNewDocumentModal"
               style="margin-left: 30px;"><i
                        class="fa fa-plus"></i> Add
                Documents</a>
        </div>

    </div>
</div>