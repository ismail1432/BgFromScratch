/**
 * Created by ismail on 09/04/2017.
 */
var showText = function (target, message, index, interval) {
    if (index < message.length) {
        $(target).append(message[index++]);
        setTimeout(function () { showText(target, message, index, interval); }, interval);
    }
}

$( document ).ready(function() {

    showText("#msg", " < Hello World ! />", 0, 250);
    $('.subheading').css('display', 'none');
    $('.subheading').fadeIn(8000);
});

