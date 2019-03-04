<div class="portlet blue-hoki box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Proof Generation
        </div>
        <div class="actions">
            <a href="javascript:;"
               class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Edit </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> Start Date Brief is Given To Studio : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmProofGenerationTime']['start_date_to_studio']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name">Received By : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmProofGenerationTime']['receive_by']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Received Date & Time : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmProofGenerationTime']['receive_by_date']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Agreed Target Time : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmProofGenerationTime']['agreed_date_time']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> End Time : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmProofGenerationTime']['ended']; ?></div>
        </div>
    </div>
</div>
                                               