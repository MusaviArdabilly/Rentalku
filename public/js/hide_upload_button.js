$(function(){
    $("#uploadprofile_link").on('click', function(e){
        e.preventDefault();
        $("#uploadprofile:hidden").trigger('click');
    });
});