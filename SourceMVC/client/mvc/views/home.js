$('.on-off-button').click(function () {
    if ($(this).hasClass('check-on-off')) {
        $(this).removeClass('check-on-off');
        $(this).children().css('background-color', 'white');
        $(this).parent().css('background-color', 'rgb(255, 93, 93)');
        $(this).children().animate({
            left: '2px',
        });
    } else {
        $(this).addClass('check-on-off');
        $(this).children().css('background-color', 'black');
        $(this).parent().css('background-color', 'rgb(131, 248, 170)');
        $(this).children().animate({
            left: '26px',
        });
    }
});
$('.custom-btn').click(function () {
    $(this)
        .children()
        .text($(this).children().text() == 'Auto' ? 'Voice' : 'Auto');
});