$(document).ready(function () {

//    Открытие меню
    $("#header-menu").click(function () {
        document.getElementById("menu").classList.toggle("active");
    });



//    Открытие тендер-меню//регистрация туриста
    $("#publication, #tender-menu-close").click(function () {
        document.getElementById("tender-menu").classList.toggle("active");
    });



//    регистрация агента

    $(".agent, .tourist").click(function () {
        document.getElementById("registration").classList.toggle("active");
        $(".log-reg-links").toggleClass("active");
    });

    $("#registration-close").click(function () {
        document.getElementById("registration").classList.toggle("active");
    });


    $("#next-step-2-registration").click(function () {
        document.getElementById("form-registration-tourist-tender").classList.toggle("active");
        document.getElementById("form-registration-tourist-after-tender").classList.toggle("active");
    });



//Календарь
    $(function () {
        $("#datepicker1").datepicker({});
    });
    $(function () {
        $("#datepicker2").datepicker({});
    });









    $(function () {
        $('#log').click(function (e) {
            var $message = $('.login-form');

            if ($message.css('display') != 'block') {
                $message.slideDown();

                var firstClick = true;
                $(document).bind('click.myEvent', function (e) {
                    if (!firstClick && $(e.target).closest('.login-form ').length == 0) {
                        $message.slideUp();
                        $(document).unbind('click.myEvent');
                    }
                    firstClick = false;
                });
            }

            e.preventDefault();
        });
    });

//Окно регистрации

    $(function () {
        $('#reg').click(function (e) {
            var $message = $('.log-reg-links');

            if ($message.css('display') != 'block') {
                $message.slideDown();

                var firstClick = true;
                $(document).bind('click.myEvent', function (e) {
                    if (!firstClick && $(e.target).closest('.log-reg-links').length == 0) {
                        $message.slideUp();
                        $(document).unbind('click.myEvent');
                    }
                    firstClick = false;
                });
            }

            e.preventDefault();
        });
    });
});
