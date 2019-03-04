<div class="portlet yellow-crusta box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Jobs
        </div>
        <div class="actions">
            <a href="javascript:;"
               class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Edit </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> Title:</div>
            <div class="col-md-7 value">
                <?php echo $viewData[0]['crmJobs']['title']; ?>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Description :</div>
            <div class="col-md-7 value">
                <?php echo $viewData[0]['crmJobs']['description']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Instruction :</div>
            <div class="col-md-7 value">
                <?php echo $viewData[0]['crmJobs']['instruction']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> jobsize :</div>
            <div class="col-md-7 value">
                <?php echo $viewData[0]['crmJobs']['jobsize']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Spot Colour :</div>
            <div class="col-md-7 value">
                <?php echo $viewData[0]['crmJobs']['spot_colour']; ?>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> CYMK :</div>
            <div class="col-md-7 value">
                <?php echo $viewData[0]['crmJobs']['cymk']; ?>
            </div>
        </div>

    </div>
</div>