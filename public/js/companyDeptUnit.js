/**
 * Created by Kalu on 27/03/2017.
 */
jQuery(function($){
    $('.showCreateCompanyModal').on("click",function(){
        $('#createCompanyModal').modal('show');
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
        var company_name=$(editForm).find('select[name=companyId]').val($(this).data('companyid'));
        var department_name=$(editForm).find('input[name=name]').val($(this).data('departmentname'));
        var description=$(editForm).find('[name=description]').val($(this).data('departmentdescription'));
        var department_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editDepartmentModal').modal('show');
    });

    $('.showCreateUnitModal').on("click",function(){
        $('#createUnitModal').modal('show');
    });
    $('.edit-unit').on("click",function(){
        var editForm=$('form[name=editUnitForm]');
        var unit_name=$(editForm).find('[name=title]').val($(this).data('unitname'));
        var elem = $(this);
        setTimeout(function(){
            var department_name=$(editForm).find('[name=crm_department_id]').val($(elem).data('departmentid'));
            },800);
        var unit_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editUnitModal').modal('show');
    });
    $('.add-user-to-unit').on("click",function(){
        $('#addUserToUnitModal').modal('show');
    });
    $('.showCreateDocumentModal').on("click",function(){
        $('#createDocumentModal').modal('show');
    });
    $('.edit-document').on("click",function(){
        var editForm=$('form[name=editDocumentForm]');
        var unit_name=$(editForm).find('input[name=title]').val($(this).data('documenttitle'));
        var department_name=$(editForm).find('input[name=name]').val($(this).data('departmentname'));
        var description=$(editForm).find('[name=details]').val($(this).data('documentdetails'));
        var unit_id=$(editForm).find('[name=id]').val($(this).data('id'));
        var file_name=$(editForm).find('[name=file_name]').val($(this).data('filename'));
        $('#editDocumentModal').modal('show');
    });
});
