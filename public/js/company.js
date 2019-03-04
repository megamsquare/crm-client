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
        var company_name=$(editForm).find('input[name=company_name]').val($(this).data('companyname'));
        var department_name=$(editForm).find('input[name=name]').val($(this).data('departmentname'));
        var description=$(editForm).find('[name=description]').val($(this).data('departmentdescription'));
        var department_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editDepartmentModal').modal('show');
    });

});
