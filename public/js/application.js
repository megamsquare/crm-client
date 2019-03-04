/**
 * Created by Mensah on 11/04/2017.
 */
jQuery(function($){
    $('.showCreateAppModal').on("click",function(){
        $('#createAppModal').modal('show');
    });
$('.edit-app').on("click",function(){
    var editForm=$('form[name=editappForm]');
    var name=$(editForm).find('input[name=name]').val($(this).data('name'));
    var description=$(editForm).find('[name=description]').val($(this).data('description'));
    var app_id=$(editForm).find('[name=id]').val($(this).data('id'));
$('#editAppModal').modal('show');
});
    $('.showCreateMenuModal').on("click",function(){
        $('#createMenuModal').modal('show');
    });
    $('.edit-app').on("click",function(){
        var editForm=$('form[name=editappForm]');
        var name=$(editForm).find('input[name=name]').val($(this).data('name'));
        var description=$(editForm).find('[name=description]').val($(this).data('description'));
        var app_id=$(editForm).find('[name=id]').val($(this).data('id'));
        $('#editAppModal').modal('show');
    });
    $('.edit-menu').on("click",function(){
        var editForm=$('form[name=createMenuForm]');
        var display_text=$(editForm).find('input[name=display_text]').val($(this).data('displaytext'));
        var resource_id=$(editForm).find('[name=resource_id]').val($(this).data('resourceId'));
        var parent_id=$(editForm).find('input[name=parent_id]').val($(this).data('parentId'));
        var description=$(editForm).find('[name=description]').val($(this).data('description'));
        var uri=$(editForm).find('input[name=uri]').val($(this).data('uri'));
        var icon=$(editForm).find('[name=icon]').val($(this).data('linkicon'));
        var id=$(editForm).find('[name=id]').val($(this).data('id'));
        var mode=$(editForm).find('[name=mode]').val('edit');
        var createMenuFormHeader = $('#createMenuFormHeader').html('Edit Menu');
        $('#createMenuModal').modal('show');
    });

});
