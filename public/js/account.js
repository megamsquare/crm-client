/**
 * Created by Benedict on 27/03/2017.
 */
jQuery(function ($) {
    $('.showCreateCompanyModal').on("click", function () {
        $('#createCompanyModal').modal('show');
    });
    /*$('.edit-account').on("click", function () {
        var editForm = $('form[name=editForm]');
        var id = $(editForm).find('input[name=id]').val($(this).data('id'));
        var name = $(editForm).find('input[name=name]').val($(this).data('name'));
        /!*var phone = $(editForm).find('[name=phone]').val($(this).data('phone'));
        var email = $(editForm).find('[name=email]').val($(this).data('email'));*!/
        if($(this).data('stage') == 'lead')
            var stage = $(editForm).find("[name=stage] option[value='lead']").attr( 'selected','selected');
        if($(this).data('stage') == 'customer')
            var stage = $(editForm).find("[name=stage] option[value='customer']").attr( 'selected','selected');
        var source = $(editForm).find('[name=source]').val($(this).data('account_source'));
        var about = $(editForm).find('[name=about]').val($(this).data('about'));
        $('#editAccount').modal('show');
    });*/
    /*$('.add-account-personnel').on("click", function () {
        var form = $('form[name=addAcctUserForm]');
        var id = $(form).find('input[name=acctid]').val($(this).data('id'));
        $('#addAccountPersonnel').modal('show');
    });*/
        $('.showCreateCallsModal').on("click",function(){
            $('#createCallsModal').modal('show');
        });
});

function editAccountAction(element) {
    var editForm = $('form[name=editForm]');
    var id = $(editForm).find('input[name=id]').val($(element).data('id'));
    var name = $(editForm).find('input[name=name]').val($(element).data('name'));
    /*var phone = $(editForm).find('[name=phone]').val($(element).data('phone'));
     var email = $(editForm).find('[name=email]').val($(element).data('email'));*/
    if($(element).data('stage') == 'lead')
        var stage = $(editForm).find("[name=stage] option[value='lead']").attr( 'selected','selected');
    if($(element).data('stage') == 'customer')
        var stage = $(editForm).find("[name=stage] option[value='customer']").attr( 'selected','selected');
    var source = $(editForm).find('[name=source]').val($(element).data('account_source'));
    var about = $(editForm).find('[name=about]').val($(element).data('about'));
    $('#editAccount').modal('show');
}

function editPersonnelAction(element) {
    var editForm = $('form[name=editForm]');
    var id = $(editForm).find('input[name=id]').val($(element).data('id'));
    var firstname = $(editForm).find('input[name=firstname]').val($(element).data('firstname'));
    var lastname = $(editForm).find('[name=lastname]').val($(element).data('lastname'));
    var email = $(editForm).find('[name=email]').val($(element).data('email'));
    var phone = $(editForm).find('[name=phone]').val($(element).data('phone'));
    if($(element).data('gender') == 'm')
        var gender = $(editForm).find("[name=gender] option[value='m']").attr( 'selected','selected');
    if($(element).data('stage') == 'f')
        var gender = $(editForm).find("[name=gender] option[value='f']").attr( 'selected','selected');
    $('#editAccountPersonnel').modal('show');
}

function addPersonnelAction(element) {
    var form = $('form[name=addAcctUserForm]');
    var id = $(form).find('input[name=acctid]').val($(element).data('id'));
    $('#addAccountPersonnel').modal('show');
}
