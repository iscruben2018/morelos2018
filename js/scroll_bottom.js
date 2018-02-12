
     $(document).ready(function(){
    	
        $(window).scroll(function(){
        //Si se sabe que se esta cerca de arriba no se muestra el boton al contrario si
    	if($(this).scrollTop()>100){
    		$('.scrollup').fadeIn();
    		$('.alert alert-warning alert-dismissable').fadeIn();
    		
    	}
    	else{
    		$('.scrollup').fadeOut();
    		$('.alert alert-warning alert-dismissable').fadeOut();
    	}
        });
        
        //al dar clic al boton se muestra la animacion
        $('.scrollup').click(function(){
        $("html,body").animate({scrollTop:0},800);
        return false;
        });
        });