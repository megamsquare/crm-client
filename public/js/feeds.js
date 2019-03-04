/**
 * Created by Benedict on 27/03/2017.
 */
jQuery(function ($) {
    //$("html, body").animate({ scrollTop: $("#chat-bottom").scrollTop() }, 1000);
    $(".scroller").slimScroll({scrollTo: $(this).height()});
    /*$('#add-users').select2({
     ajax: {
     url: "/crm/feeds/getusers",
     dataType: 'json',
     delay: 250,
     data: function (params) {
     return {
     q: params.term, // search term
     page: params.page
     };
     },
     processResults: function (data, params) {
     // parse the results into the format expected by Select2
     // since we are using custom formatting functions we do not need to
     // alter the remote JSON data, except to indicate that infinite
     // scrolling can be used
     params.page = params.page || 1;

     return {
     results: data.items,
     pagination: {
     more: (params.page * 30) < data.totalItemsCount
     }
     };
     },
     cache: true
     },
     escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
     minimumInputLength: 1,
     templateResult: formatUser // omitted for brevity, see the source of this page
     //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
     });
     $('#add-users').on("select2:select", function() {
     alert($(this).val());

     });

     function formatUser (user) {
     if (!user.userid) { return user.firstname; }
     var $user = $(
     ' <option value="'+user.userid+'">' + user.firstname + ' ' + user.lastname + ' (' + user.unitname + ') </option>'
     );
     return $user;
     };*/


});
function addCommentAjax(feedid, comment_txt, url) {
    var res = '';
    $.ajax({
        url: '/crm/feeds/comment/',
        data: {feed_id: feedid, comment: comment_txt},
        async: false,
        success: function (response) {
            res = response;
        }
    });
    this.value;
    $("ul.chats").append("<li class='out'><img class='avatar' src='" + url + "' alt=''/><div class='message'>  <span class='arrow'> </span> <a href='javascript:;' class='name badge bg-white' title='" + res['0'].firstname + " " + res['0'].lastname + "'><i class='fa fa-user'></i> <strong>Me</strong> </a> <span class='datetime  badge bg-white'> <i class='fa fa-clock-o'></i> " + res['0'].commenteddate + " </span> <span class='body'> " + res['0'].comment + " </span> </div></li>").parent().slimScroll({scrollTo: $(".chats").height()+"px"});
    //return res;
}
