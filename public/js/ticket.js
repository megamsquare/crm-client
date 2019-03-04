/**
 * Created by Mensah on 12/04/2017.
 */
jQuery(function($){
    $('.showCreateTicketModal').on("click",function(){
        $('#createTicketModal').modal('show');
    });
$('.edit-ticket').on("click",function(){
    var editForm=$('form[name=editTicketForm]');
    var created_by_id=$(editForm).find('input[name=created_by_id]').val($(this).data('created_by_id'));
    var content=$(editForm).find('[name=content]').val($(this).data('contents'));
    var title=$(editForm).find('[name=title]').val($(this).data('title'));
    var ticket_id=$(editForm).find('[name=id]').val($(this).data('id'));
$('#editTicketModal').modal('show');
});

});
