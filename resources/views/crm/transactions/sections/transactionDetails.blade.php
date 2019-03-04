<div class="portlet blue-hoki box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Transaction Details
        </div>
        <div class="actions">
            <a href="javascript:;"
               class="btn btn-default btn-sm">
                <i class="fa fa-pencil"></i> Edit </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> Transaction #:</div>
            <div class="col-md-7 value"> {{ $viewData[0]['crmTransactions']['id']; }}
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Account name :</div>
            <div class="col-md-7 value"> <?php echo  $viewData[0]['crmAccounts']['name']; ?>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Transaction Amount :</div>
            <div class="col-md-7 value"> {{\App\Services\BaseService::formatMoney($viewData[0]['crmTransactions']['amount'])}}
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Unit:</div>
            <div class="col-md-7 value"> <?php echo  $viewData[0]['crmUnits']['title']; ?></div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Transaction Date &
                Time:
            </div>
            <div class="col-md-7 value"> <?php echo  $viewData[0]['crmTransactions']['created_date']; ?>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> Transaction Status:
            </div>
            <div class="col-md-7 value">
                <?php if($viewData[0]['crmTransactions']['deleted'] == 0) { ?>
                <span class="label label-success"> Active </span>
                <?php } ?>
            </div>
        </div>

    </div>
</div>