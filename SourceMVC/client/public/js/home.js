$(document).ready(function () {
    DOMAIN = 'http://localhost/SmartLedSystem/SourceMVC/client/';
    $('.mode-btn').click(function () {
        temp = $(this);
        $.ajax({
            url: DOMAIN + 'Home/ChangeMode',
            type: 'post',
            data: {
                ledId: temp.parent().parent().attr('id').split('led-detail')[1],
                ledMode: temp.children().text(),
            },
            success: function (result) {
                console.log(result);
                if (result != 'Failed') {
                    $(temp).children().text(result);
                } else {
                    console.log(result);
                }
            },
        });
    });
    function updateStatus() {
        $('.check-on-off').children().css({
            'background-color': 'black',
            left: '26px',
        });
        $('.check-on-off').parent().css('background-color', 'rgb(131, 248, 170)');
    }
    updateStatus();
    $('.on-off-button').click(function () {
        temp = $(this);
        $.ajax({
            url: DOMAIN + 'Home/ChangeStatus',
            type: 'post',
            data: {
                ledId: temp.parent().attr('id').split('led')[1],
                ledStatus: $(this).hasClass('check-on-off') ? 1 : 0,
            },
            success: function (result) {
                console.log(result);
                if (result != 'Failed') {
                    updateStatus();
                } else {
                    console.log('failed');
                }
            },
        });
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
});