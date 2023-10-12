// confirm btn
function xacnhan(msg) {
    if (window.confirm(msg)) {
        return true;
    } 
    return false;
}
// slide slideUp
$(document).ready(function() {
    $(".error_msg").delay(3000).slideUp();
});
// back-to-top
$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
// scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    
    $('#back-to-top').tooltip('show');

});




  