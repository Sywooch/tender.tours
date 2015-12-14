
$(document).ready(function () {
// всплытие ОКНА выбора АГЕНТ ТУРИСТ
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

//Кнопка регистрация туриста
    $("#reg_tourist_btn").click(function () {
        document.getElementById("registration-registration").classList.toggle("active");
        loadRegForm('tourist');
    });


// Кнопка регистрация агента
    $("#reg_agent_btn").click(function () {
        document.getElementById("registration-registration").classList.toggle("active");
        loadRegForm('agent');
    });

 //Кнопка зарегистрироватся
    $(document).on('submit', '#registration form', function (e) {
        e.preventDefault();
        submitRegForm();
    });


//    $(document).on('click', '#reg_tourist_btn', function() {
//        loadRegForm('tourist');
//    });
//    
//    
//    $(document).on('click', '#reg_agent_btn', function() {
//        loadRegForm('agent');
//    });
//    
//    
//    $(document).on('submit', '#registration form', function(e) {
//        e.preventDefault();
//        submitRegForm();
//    });
//    

    


});



function loadRegForm(type) {
    $('#registration-registration').load('/test/registration', 'type=' + type);
}

function submitRegForm() {
    var data = $('#registration form').serializeArray();
    $.post('/test/registration', data, function (data) {
        $('#registration').html(data);
    });
}