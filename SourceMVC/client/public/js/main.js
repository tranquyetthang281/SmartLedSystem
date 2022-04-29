DOMAIN = 'http://localhost/SmartLedSystem/SourceMVC/client/';
$('.login-button').click(function () {
    if ($('.username-input').val() && $('.password-input').val()) {
        $.ajax({
            url: DOMAIN + 'Login/handleLogin',
            type: 'post',
            data: {
                username: $('.username-input').val(),
                password: $('.password-input').val(),
            },
            success: function (result) {
                console.log(result);
                if (result == 'error') {
                    $('.err').text('Wrong Password. Please try again.');
                    setTimeout(() => {
                        $('.err').text('');
                    }, 1500);
                } else if (result == 'notvalid') {
                    $('.err').text('Username does not exist');
                    setTimeout(() => {
                        $('.err').text('');
                    }, 1500);
                } else {
                    if (result == 'user') window.location.href = DOMAIN;
                }
            },
        });
    }
});
