/**
 * Created by Mensah on 27/03/2017.
 */
jQuery(function($){
    $('.showCreateVisitModal').on("click",function(){
        $('#createVisitModal').modal('show');
    });
$('.edit-visit').on("click",function(){
    var editForm=$('form[name=editvisitForm]');
    var created_by_id=$(editForm).find('input[name=created_by_id]').val($(this).data('name'));
    var purpose=$(editForm).find('[name=purpose]').val($(this).data('visitpurpose'));
    var details=$(editForm).find('[name=details]').val($(this).data('visitdetails'));
    var follow=$(editForm).find('[name=follow]').val($(this).data('visitfollow'));
    var visit_calls_type=$(editForm).find('[name=visit_calls_type]').val($(this).data('typeofvisit'));
    var visit_id=$(editForm).find('[name=id]').val($(this).data('id'));
$('#editVisitModal').modal('show');
});
    $('.showCreateCallsModal').on("click",function(){
        $('#createCallsModal').modal('show');
    });
    $('.edit-calls').on("click",function(){
        var editForm=$('form[name=editCallsForm]');
        var created_by_id=$(editForm).find('input[name=created_by_id]').val($(this).data('name'));
        var purpose=$(editForm).find('[name=purpose]').val($(this).data('callpurpose'));
        var details=$(editForm).find('[name=details]').val($(this).data('calldetails'));
        var follow=$(editForm).find('[name=follow]').val($(this).data('callfollow'));
        var visit_calls_type=$(editForm).find('[name=visit_calls_type]').val($(this).data('typeofcall'));
        var call_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editCallsModal').modal('show');
    });

});
