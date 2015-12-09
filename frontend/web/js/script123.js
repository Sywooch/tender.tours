$(document).ready(function(){
    
//    Открытие меню
            $("#header-menu").click(function(){
                document.getElementById("menu").classList.toggle("active");
            });
    
//    Открытие тендер-меню
            $("#publication").click(function(){
                document.getElementById("center-layer").classList.toggle("active");
                document.getElementById("tender-menu").classList.toggle("active");
            });
    
    
//    открытие логин
            $("#log").click(function(){
                document.getElementById("login").classList.toggle("active");
                document.getElementById("overlay").classList.toggle("active");
                 document.getElementById('overlay').addEventListener('click',function(){
                document.getElementById('login').classList.remove('active');
                document.getElementById('overlay').classList.remove('active');            
        });
            });
            
            $("#modal-close-login").click(function(){
                document.getElementById("login").classList.toggle("active");
                document.getElementById("overlay").classList.toggle("active");
            });
    
    
//    открытие регистарця
            $("#reg").click(function(){
                    document.getElementById("regist").classList.toggle("active");
                    document.getElementById("overlay").classList.toggle("active");
                    document.getElementById('overlay').addEventListener('click',function(){
                    document.getElementById('regist').classList.remove('active');
                    document.getElementById('overlay').classList.remove('active');            
            });
                });

                $("#modal-close-regist").click(function(){
                    document.getElementById("regist").classList.toggle("active");
                    document.getElementById("overlay").classList.toggle("active");
                });
    //Открытие поля регистрации Туриста

    
             $("#button-tourist").click(function(){
                    document.getElementById('form-registration-tourist').classList.toggle("active");        
                    document.getElementById('button-agent').classList.toggle("active");        
                    document.getElementById('button-tourist').classList.toggle("active");        
                    document.getElementById('close-tourist').classList.toggle("active");        
            });
    
            $("#close-tourist").click(function(){
                    document.getElementById('form-registration-tourist').classList.toggle("active");        
                    document.getElementById('button-agent').classList.toggle("active");
                    document.getElementById('button-tourist').classList.toggle("active");
            });
    //Открытие поля регистрации Агента

            $("#button-agent").click(function(){
                    document.getElementById('form-registration-agent').classList.toggle("active");        
                    document.getElementById('button-tourist').classList.toggle("active");          
                    document.getElementById('button-agent').classList.toggle("active");          
                    document.getElementById('close-agent').classList.toggle("active");
            });
            $("#close-agent").click(function(){
                    document.getElementById('form-registration-agent').classList.toggle("active");        
                    document.getElementById('button-tourist').classList.toggle("active");
                    document.getElementById('button-agent').classList.toggle("active");
            });
        });