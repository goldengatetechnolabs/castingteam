/***********************
 * ALERT
 **********************/
function jAlert(soort, tekst) {
    if (soort == 1) {
        $("body").prepend('<div id="modal-bg"></div><div id="modal" class="alert"><p>' + tekst + '</p><p style="margin-bottom: 0px;"><a href="javascript:jAlert(0, \'\')" style="display: inline-block" class="button">OK</a></p></div>');
    } else {
        $("#modal-bg").remove();
        $("#modal").remove();
    }
}