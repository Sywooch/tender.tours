//
//$(document).ready(function () {
//    
//    $("#header-menu").click(function () {
//        document.getElementById("menu").classList.toggle("active");
//    });
//    
//    
//    
//// всплытие ОКНА выбора АГЕНТ ТУРИСТ
//        $(function () {
//        $('#reg').click(function (e) {
//            var $message = $('.log-reg-links');
//
//            if ($message.css('display') != 'block') {
//                $message.slideDown();
//
//                var firstClick = true;
//                $(document).bind('click.myEvent', function (e) {
//                    if (!firstClick && $(e.target).closest('.log-reg-links').length == 0) {
//                        $message.slideUp();
//                        $(document).unbind('click.myEvent');
//                    }
//                    firstClick = false;
//                });
//            }
//
//            e.preventDefault();
//        });
//    });
//
//
////Кнопка регистрация туриста
//    $("#reg_tourist_btn").click(function () {
//        document.getElementById("registration").classList.toggle("active");
//        
//        loadRegForm('tourist');
//    });
//
//$("#registration-close").click(function(){
//                document.getElementById("registration").removeClass("active");
//              });
//
//
//
//// Кнопка регистрация агента
//    $("#reg_agent_btn").click(function () {
//        document.getElementById("registration").classList.toggle("active");
//        loadRegForm('agent');
//    });
//
// //Кнопка зарегистрироватся
//    $(document).on('submit', '#registration form', function (e) {
//        e.preventDefault();
//        submitRegForm();
//    });
//
//
//
//
//});






$(document).ready(function(){
    
//    Открытие меню
            $("#header-menu").click(function(){
                document.getElementById("menu").classList.toggle("active");
            });
            
    
//    Открытие тендер-меню//регистрация туриста
            $("#publication").click(function(){
                document.getElementById("tender-menu").classList.toggle("active");
            });
    
    
                
//    регистрация агента
            
              $("#reg_tourist_btn").click(function(){
                document.getElementById("registration").classList.toggle("active");
                loadRegForm('tourist');
              });
              
              $("#reg_agent_btn").click(function(){
                document.getElementById("registration").classList.toggle("active");
                loadRegForm('agent');
              });
                
    
            $("#next-step-2-registration").click(function(){
                document.getElementById("form-registration-tourist-tender").classList.toggle("active");
                document.getElementById("form-registration-tourist-after-tender").classList.toggle("active");
            });
    
    
        });



//Окно Логина

$(function() {
            $('#log').click(function(e) {
                var $message = $('.login-form');
                
                if ($message.css('display') != 'block') {
                    $message.slideDown();
                    
                    var firstClick = true;
                    $(document).bind('click.myEvent', function(e) {
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

$(function() {
            $('#reg').click(function(e) {
                var $message = $('.log-reg-links');
                
                if ($message.css('display') != 'block') {
                    $message.slideDown();
                    
                    var firstClick = true;
                    $(document).bind('click.myEvent', function(e) {
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


//



//Календарь
  $(function() {    $( "#datepicker1").datepicker({});  });
    $(function() {    $( "#datepicker2").datepicker({});  });



function loadRegForm(type) {
    $('#registration').load('/test/registration', 'type=' + type);
}

function submitRegForm() {
    var data = $('#registration form').serializeArray();
    $.post('/test/registration', data, function (data) {
        $('#registration').html(data);
    });
}






