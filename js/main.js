$(document).ready(function(){
$('#siteBody').hide();
$('#welcomeBody').hide();
$('#hidenav').hide();
setTimeout(() => {
    $("#loader").hide();
    $('#siteBody').show();
    $('#welcomeBody').show();
    $('#hidenav').show();
}, 4000);
$("#wrapper").css("animation", "drawArc1 3s linear infinite");
$("#inner").css("animation", "drawArc2 3s linear infinite");

})