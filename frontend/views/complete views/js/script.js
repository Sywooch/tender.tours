$(document).ready(function(){
    
//    Открытие меню
            $("#header-menu").click(function(){
                document.getElementById("menu").classList.toggle("active");
            });
            
//открытие регистрации и логина
            $("#reg").click(function() {
                $(".log-reg-links").toggleClass("active");  
                $(".login-form").removeClass("active"); 
                return false;
            });
    
    
            $("#log").click(function() { 
                $(".login-form").toggleClass("active");
                $(".log-reg-links").removeClass("active");  
            });
    
//    Открытие тендер-меню//регистрация туриста
            $("#publication, #tender-menu-close").click(function(){
                document.getElementById("tender-menu").classList.toggle("active");
            });
                
//    регистрация агента
            
              $(".agent, .tourist").click(function(){
                document.getElementById("registration").classList.toggle("active");
                $(".log-reg-links").toggleClass("active");
              });
                
                $("#registration-close").click(function(){
                document.getElementById("registration").classList.toggle("active");
              });
   
    
            $("#next-step-2-registration").click(function(){
                document.getElementById("form-registration-tourist-tender").classList.toggle("active");
                document.getElementById("form-registration-tourist-after-tender").classList.toggle("active");
            });
    
    
        });





        $(function() {    $( "#datepicker1").datepicker({});  });
        $(function() {    $( "#datepicker2").datepicker({});  });
