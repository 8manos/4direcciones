var altoPantalla= $(window).height();
var anchoPantalla= $(window).width();
var	widthResp=1;
$(document).ready(function() { 
	
	altoProyectos(anchoPantalla);
	altoProyectosS1(anchoPantalla);
	/*Escalas generales*/
	if(anchoPantalla>=1600){
		$('.teaser').css("height",altoPantalla);	
		$('.contacto').css("height",altoPantalla);	
	}
	else{
		$('.teaser').css("height","auto");	
		$('.contacto').css("height","auto");	
	}
	/*Menu Stick*/
		$(window).scroll(function(){
		var window_top = $(window).scrollTop() ;
		var div_top = $('#nav-anchor').offset().top;
			if (window_top > div_top) {
				$('#home header .cont_men').addClass('stick');
			} else {
				$('#home header .cont_men').removeClass('stick');
			}
	});
	/*Menu responsive*/
	$('#trigger-menu').on( 'click', function(e){
		
		e.preventDefault();
		if(window.innerWidth<"960"){
			
			if(  $('#nav_container').hasClass( 'open' )){
				$(this).removeClass( 'open' );
				$('#nav_container').removeClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').removeClass( 'move' );
				
			}else{
			   $('#nav_container').addClass( 'open' );
				$(this).addClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').addClass( 'move' );
				
			}
		}
	});
	 $('#trigger-menu-close').on( 'click', function(e){
		
		e.preventDefault();
		if(window.innerWidth<"960"){
			
			if(  $('#nav_container').hasClass( 'open' )){
				$(this).removeClass( 'open' );
				$('#nav_container').removeClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').removeClass( 'move' );
				
			}else{
			   $('#nav_container').addClass( 'open' );
				$(this).addClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').addClass( 'move' );
				
			}
		}
	});
	
	$( window ).resize(function() {
		anchoPantalla= $(window).width();
		if(anchoPantalla>=1600){
			altoPantalla= $(window).height();
		$('.teaser').css("height",altoPantalla);	
		$('.contacto').css("height",altoPantalla);	
		}	
		else{
		$('.teaser').css("height","auto");	
		$('.contacto').css("height","auto");	
		}	
		if(anchoPantalla>=900){
			$(".inline").colorbox.resize({width:"770"});	
		}
		else{
			$(".inline").colorbox.resize({width:'90%', maxWidth:"770", maxHeight:"770"});	
		}
		/*Organizar proyectos*/
		altoProyectos(anchoPantalla);
		altoProyectosS1(anchoPantalla);
		
	});
	/*Redes*/
	 $( "#accordion_social" ).accordion({
	   active: false,
		collapsible: true
	});
	
	/*Contenido de producto*/
	$(".inline").colorbox({
		inline:true,
		transition: "none",
		speed: "800",
		maxWidth:"770",
		width: '90%'
		/*,	maxHeight:"770",*/
	});

	if( $('.ic-canasto').length > 0 ){
		$('form .ic-canasto').on( 'click', function(){

			$(this).closest('form').unbind('submit').submit(function(){
			  
			  var form = $(this);
			  
			  // get post values
			  var data = {}; // define data object

			  var url = CuatroAjax.ajaxurl;

			  data["security"] = CuatroAjax.security;
			  data["action"] = 'buy_ajax';

			  $(':input',this).each(function(index){
				// checkbox
				if ($(this).attr('type') == 'checkbox'){
				  if ($(this).is(':checked')){
					var key = $(this).attr('name');
					// if it hasn't been created yet, define it as an array
					if (typeof data[key] == 'undefined'){
					  data[key] = [];
					}
					data[key].push($(this).val()); // only happens on CHECKED fields
				  }
				// radio button
				}else if($(this).attr('type') == 'radio'){
				  if ($(this).is(':checked')){
					var key = $(this).attr('name');
					var val = $(this).val();
					data[key] = val;
				  }
				// all others
				}else{
				  // write non-checkbox fields to data
				  var key = $(this).attr('name');
				  var val = $(this).val();
				  data[key] = val;
				}
			  });
			  console.log( "Data: ", data );
			  // post
			  $.post( url ,data, function(html) {
				  if( html == 0 ){
				  	alert("Ha ocurrido un error desconocido");
				  }else if( html == "error" ){
				  	alert("Ha ocurrido un error conocido");
				  }else{
				  	form.fadeOut();
				  	alert( "Vendido!" );
				  }
			  });
			  return false;
			}); //form.submit
		});
	}

});
/*Redes click outside*/
$(document).click(function(e) {
	if (!$( "#accordion_social" ).is(e.target) && !$( "#accordion_social" ).has(e.target).length) {
		$('#accordion_social').accordion( "option", "active", 2 );
	}
});
/*Link scroll video home*/
function scrollDown(){
	$("html, body").animate({ scrollTop: $('#menu_ppal').offset().top }, 1000);    
}
/*Servicios proyectos*/
function desplegar(p){  
  $( "#cont_pro_"+p ).slideToggle( "slow", function() {
	// Animation complete.
  });
}
/*Video interna proyecto*/
function showVideo(){
	 $('#player').html('<iframe src="https://player.vimeo.com/video/115022475?autoplay=true" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen id="video_vimeo"></iframe>');
	 $('#title').fadeOut( "slow");
	 $('#play_btn').fadeOut( "slow");
}
function altoProyectos(ancho){
	
	if(ancho>=975){widthResp=4;}
	if(ancho<975){widthResp=3;}
	if(ancho<759){widthResp=2;}
	if(ancho<549){widthResp=1;}
	
	var canProy=$("#list_proy li").length;
	var canFilas = Math.ceil(canProy/widthResp) ;
	var altoConPro=(canFilas*180)+ 67;/*67 del borde inferior*/
	
	$("#list_proy").css('height', altoConPro+"px");	
	
	ordenProyectos(canFilas, canProy-1,widthResp);
}
function ordenProyectos(f, p,w){
	var bottomP=67;
	var rightP=12;
	var fila=1;
	var items=1;
	for(i=p; i>=0; i--){
		
		$('#list_proy li').eq(i).css('bottom', bottomP+'px');
		$('#list_proy li').eq(i).css('right', rightP+'px');
		rightP=rightP+213;			
		if(items%w==0 ){
			fila++;
			items=0;
			rightP=12;	
			bottomP=bottomP+182; 
			if(fila%2==0){
				rightP=119;	
			}
		}	
		items++;
		if(fila==1){
			bottomP=67
		}		
	}
	
}
/*Servicios 1*/
function altoProyectosS1(ancho){
	
	if(ancho>=975){widthResp=4;}
	if(ancho<975){widthResp=3;}
	if(ancho<759){widthResp=2;}
	if(ancho<549){widthResp=1;}
	
	var canProy=$("#list_proy_s1 li").length;
	var canFilas = Math.ceil(canProy/widthResp) ;
	var altoConPro=(canFilas*180)+ 67;/*67 del borde inferior*/
	
	$("#list_proy_s1").css('height', altoConPro+"px");	
	
	ordenProyectosS1(canFilas, canProy-1,widthResp);
}
function ordenProyectosS1(f, p,w){
	var bottomP=67;
	var rightP=12;
	var fila=1;
	var items=1;
	for(i=p; i>=0; i--){
		
		$('#list_proy_s1 li').eq(i).css('bottom', bottomP+'px');
		$('#list_proy_s1 li').eq(i).css('right', rightP+'px');
		rightP=rightP+213;			
		if(items%w==0 ){
			fila++;
			items=0;
			rightP=12;	
			bottomP=bottomP+182; 
			if(fila%2==0){
				rightP=119;	
			}
		}	
		items++;
		if(fila==1){
			bottomP=67
		}		
	}
	
}
function urlProyecto(pro){
	
	var urlPro= $(pro).attr("data-href");
	window.location.href = urlPro;
}