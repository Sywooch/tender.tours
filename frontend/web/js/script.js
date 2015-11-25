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
    });
     document.getElementById('reg').addEventListener('click', function () {
        document.getElementById('regist').classList.add('active');
        document.getElementById('overlay').classList.add('active');
        document.getElementById('regist').querySelector('.modal-close').addEventListener('click',function(){
            document.getElementById('regist').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');            
        });
    });
    
    document.getElementById('header-menu').addEventListener('click', function () {
        document.getElementById('menu').classList.add('active');
        document.getElementById('overlay-menu').classList.add('active');
        document.getElementById('menu').querySelector('.modal-close').addEventListener('click',function(){
            document.getElementById('modal-close').classList.remove('active');     
            
        });
    });
});

$(function(){
	$('#rating_1').rating({
		fx: 'full',
        image: 'images/stars.png',
        loader: 'images/ajax-loader.gif',
		url: 'rating.php',
        callback: function(responce){
            
            this.vote_success.fadeOut(2000);
        }
	});
});

$(function(){
	
	$('#rating_2').rating({
		fx: 'full',
        image: 'images/man.png',
        loader: 'images/ajax-loader.gif',
		url: 'rating.php',
        callback: function(responce){
            
            this.vote_success.fadeOut(2000);
        }
	});
});



$(function() {    $( "#datepicker1").datepicker({});  });
$(function() {    $( "#datepicker2").datepicker({});  });


$(document).on('click', '#reg', function() {
   $.ajax({
       url: '/registration/pre-registration',
       dataType: 'html',
       success: function(data) {
           $('#regist .registration-form').html(data);
       }
   });
});

$(document).on('click', '#log', function() {
   $.ajax({
       url: '/',
       dataType: 'html',
       success: function(data) {
           //$('#regist .registration-form').html(data);
       }
   });
});