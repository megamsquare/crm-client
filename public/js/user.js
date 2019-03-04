/**
 * Created by Benedict on 27/03/2017.
 */
jQuery(function ($) {
    /*$('.change-password').on("click", function () {
        var passwordForm = $('form[name=passwordForm]');
//        var id = $(passwordForm).find('[name=user_id]').val($(this).data('id'));
        var id = $(passwordForm).attr( 'action', '/admin/user/change_password/'+$(this).data('id') );
        var new_password = $(passwordForm).find('[name=new_password]').val($(passwordForm).attr( 'action' ));
        $('#changePassword').modal('show');
    });*/

    $('.edit-user').on("click", function () {
        var editForm = $('form[name=editForm]');
        var firstname = $(editForm).find('input[name=firstname]').val($(this).data('firstname'));
        var lastname = $(editForm).find('input[name=lastname]').val($(this).data('lastname'));
        var phone = $(editForm).find('[name=phone]').val($(this).data('phone'));
        var email = $(editForm).find('[name=email]').val($(this).data('email'));
        var id = $(editForm).find('[name=id]').val($(this).data('id'));
        var staffno = $(editForm).find('[name=staffno]').val($(this).data('staffno'));
        $('#editUser').modal('show');
    });

});

function changeAction(element) {
    var passwordForm = $('form[name=passwordForm]');
    var id = $(passwordForm).attr( 'action', '/admin/user/reset_password/'+$(element).data('id') );
    $('#changePassword').modal('show');
}
