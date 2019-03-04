/**
 * Created by Mensah on 27/03/2017.
 */
jQuery(function($){
    $('.showCreateNoteModal').on("click",function(){
        $('#createNoteModal').modal('show');
    });
$('.edit-note').on("click",function(){
    var editForm=$('form[name=editNoteForm]');
    var title=$(editForm).find('input[name=title]').val($(this).data('notetitle'));
    var notes=$(editForm).find('[name=notes]').val($(this).data('notepurpose'));
    var note_id=$(editForm).find('[name=id]').val($(this).data('id'));
$('#editNoteModal').modal('show');
});
});
