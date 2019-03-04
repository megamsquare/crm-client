/**
 * Created by Kalu on 27/03/2017.createChecklistModalshowcreateDesignGenerationModal
 */
jQuery(function($){
    $('.showCreateJobModal').on("click",function(){
        $('#createJobModal').modal('show');
    });

    $('.showcreateNewNoteModal').on("click",function(){
        $('#createNewNoteModal').modal('show');
    });

    $('.showcreateChecklistModal').on("click",function(){
        $('#createChecklistModal').modal('show');
    });

    $('.showcreateDesignGenerationModal').on("click",function(){
        $('#createDesignGenerationModal').modal('show');
    });

    $('.showcreateProofGenerationTimeScheduleModal').on("click",function(){
        $('#createProofGenerationTimeScheduleModal').modal('show');
    });

    $('.showcreateLogoColourModal').on("click",function(){
        $('#createLogoColourModal').modal('show');
    });

    $('.showcreateAncillariesModal').on("click",function(){
        $('#createAncillariesModal').modal('show');
    });
    $('.showcreateNewDocumentModal').on("click",function(){
        $('#createNewDocumentModal').modal('show');
    });    
$('.edit-company').on("click",function(){
    var editForm=$('form[name=editCompanyForm]');
    var company_name=$(editForm).find('input[name=company_name]').val($(this).data('companyname'));
    var description=$(editForm).find('[name=description]').val($(this).data('companydescription'));
    var company_id=$(editForm).find('[name=id]').val($(this).data('id'));
$('#editCompanyModal').modal('show');
});
    $('.showCreateDepartmentModal').on("click",function(){
        $('#createDepartmentModal').modal('show');
    });
    $('.edit-department').on("click",function(){
        var editForm=$('form[name=editDepartmentForm]');
        var company_name=$(editForm).find('input[name=company_name]').val($(this).data('companyname'));
        var department_name=$(editForm).find('input[name=name]').val($(this).data('departmentname'));
        var description=$(editForm).find('[name=description]').val($(this).data('departmentdescription'));
        var department_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editDepartmentModal').modal('show');
    });

    $('.showCreateUnitModal').on("click",function(){
        $('#createUnitModal').modal('show');
    });

        $('.showCreateUnitModal').on("click",function(){
        $('#createUnitModal').modal('show');
    });

    $('.edit-unit').on("click",function(){
        var editForm=$('form[name=editUnitForm]');
        var unit_name=$(editForm).find('input[name=company_name]').val($(this).data('unitname'));
        var department_name=$(editForm).find('input[name=name]').val($(this).data('departmentname'));
        var description=$(editForm).find('[name=description]').val($(this).data('unitdescription'));
        var unit_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editUnitModal').modal('show');
    });

});
