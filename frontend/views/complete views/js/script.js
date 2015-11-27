document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('publication').addEventListener('click', function () {
        document.getElementById('center-layer').classList.toggle('active');
        document.getElementById('tender-menu').classList.toggle('active');
    });
    document.getElementById('log').addEventListener('click', function () {
        document.getElementById('login').classList.add('active');
        document.getElementById('overlay').classList.add('active');
        document.getElementById('login').querySelector('.modal-close').addEventListener('click',function(){
            document.getElementById('login').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');            
        });
         document.getElementById('overlay').addEventListener('click',function(){
            document.getElementById('login').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');            
        });
    });
     document.getElementById('reg').addEventListener('click', function () {
        document.getElementById('regist').classList.add('active');
        document.getElementById('overlay').classList.add('active');
        document.getElementById('regist').querySelector('.modal-close').addEventListener('click',function(){
            document.getElementById('regist').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');            
        });
         document.getElementById('overlay').addEventListener('click',function(){
            document.getElementById('regist').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');            
        });
    });
    
    document.getElementById('header-menu').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('active');
        
    });
    
    
//    НАЖАТИЕ НА КНОПКИ АГЕНТ И ТУРИСТ
    
    document.getElementById('button-tourist').addEventListener('click', function () {
        document.getElementById('form-registration-tourist').classList.toggle('active');
        
    });
    
    document.getElementById('button-agent').addEventListener('click', function () {
        document.getElementById('form-registration-agent').classList.toggle('active');
        
    });
    
    
});












