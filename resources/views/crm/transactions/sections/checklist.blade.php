<div class="portlet red-sunglo box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Checklist
        </div>
        <div class="actions">
            <a href="javascript:;"
               class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Edit </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> Type Of Document </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['type_of_document']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name">Is the logo okay the way you want it to appear?</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['is_logo_okay']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name">Is the name of your organization spelt correctly?</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['organization_name_correct']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Is the RC Number correct?</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['is_rc_number_correct']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Are there any typos on the details</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['are_there_any_typo']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Are all details on the covers and accessories correct?</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['detail_cover_access']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Additional Information</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['additional_information']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Customer Representative</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['customer_representative_id']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Designation</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmChecklist']['designation']; ?></div>
        </div>
    </div>
</div>
                                                 