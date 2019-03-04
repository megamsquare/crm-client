<div class="portlet blue-hoki box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Logo & Colour
        </div>
        <div class="actions">
            <a href="javascript:;"
               class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Edit </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> Pantone : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmLogoColors']['pantone']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Existing colour : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmLogoColors']['existing_colour']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Supplied as : </div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmLogoColors']['supplied_as']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Supplied digit as:</div>
            <div class="col-md-7 value"><?php echo $viewData[0]['crmLogoColors']['supplied_digit_as']; ?></div>
        </div>
    </div>
</div>
                                               