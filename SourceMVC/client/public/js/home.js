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
                // console.log(result);
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
                if (result != 'Failed') {
                    // console.log(result);
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

    //         setInterval(function () {
    //             $.ajax({
    //                 url: DOMAIN + "/Home/testGetData",
    //                 type: "post",
    //                 success: function (result) {
    //                     console.log(result, oldStatus);
    //                     if (result != oldStatus)
    //                     {
    //                         oldStatus = result;
    //                         $.ajax({
    //                             url: DOMAIN + 'Home/ChangeStatusByServer',
    //                             type: 'post',
    //                             data: {
    //                                 ledId: 1,
    //                                 ledStatus: result,
    //                             },
    //                             success: function (result) {
    //                                 console.log(result);
    //                                 if (result != 'Failed') {
    //                                     updateStatus();
    //                                 } else {
    //                                     console.log('failed');
    //                                 }
    //                             },
    //                         });
    //                         if ($('#led-button1').hasClass('check-on-off')) {
    //                             $('#led-button1').removeClass('check-on-off');
    //                             $('#led-button1').children().css('background-color', 'white');
    //                             $('#led-button1').parent().css('background-color', 'rgb(255, 93, 93)');
    //                             $('#led-button1').children().animate({
    //                                 left: '2px',
    //                             });
    //                         } else {
    //                             $('#led-button1').addClass('check-on-off');
    //                             $('#led-button1').children().css('background-color', 'black');
    //                             $('#led-button1').parent().css('background-color', 'rgb(131, 248, 170)');
    //                             $('#led-button1').children().animate({
    //                                 left: '26px',
    //                             });
    //                         }
    //                     }
    //                 },
    //             });
    //         }, 2000);
    // });

    setInterval(function () {
        $.ajax({
            url: DOMAIN + "/Home/getSensorData",
            type: "post",
            success: function (result) {
                // console.log('+',result);
                // newStatus = (parseInt(result) > 50) ? 1 : 0;
                $.ajax({
                    url: DOMAIN + 'Home/ChangeStatusBySensor',
                    type: 'post',
                    data: {
                        l: result,
                    },
                    success: function (result) {
                        console.log(result);
                        if (result != 'Failed') {
                            if (result == '1') location.reload();
                        } else {
                            console.log('failed');
                        }
                    },
                });
            },
        });
    }, 4000);
});
