var altoPantalla= $(window).height();
var anchoPantalla= $(window).width();
var altoPantallaGal= $(window).height();
var	widthResp=1;
var canProy;
var catInicial="hexagon";

$(document).ready(function() {

	$(".owl-carousel").owlCarousel({
		items: 1,
		loop:true,
		autoplay: true,
		autoplayTimeout: 12000,
		lazyLoad:true
	});

	canProy=$("#list_proy li").length;
	altoProyectos(anchoPantalla, canProy, catInicial);
	altoProyectosS1(anchoPantalla);
	/*Escalas generales*/
	if(anchoPantalla>=980 && anchoPantalla>altoPantalla){
		$('.teaser').css("height",altoPantalla);
		$('.contacto').css("height",altoPantalla);
		$('.embed-container').css("padding-bottom","0");
		$('.embed-container').css("height","100%");
	}
	else{
		$('.teaser').css("height","auto");
		$('.contacto').css("height","auto");
		$('.embed-container').css("padding-bottom","56.25%");
		$('.embed-container').css("height","0");
	}
	/*Nosotros*/
	altoNosotros(anchoPantalla);
	/*Galeria interna de proyectos*/
	$('.galeria .row_full').css("height",altoPantallaGal);
	$('.galeria .col_c').css("height",altoPantallaGal);
	$('.galeria .fig_1').css("height",(altoPantallaGal/2));
	$('.galeria  .fig_2').css("height",(altoPantallaGal/2));

	/*Menu Stick*/
		$(window).scroll(function(){
		var window_top = $(window).scrollTop() ;
		var div_top = $('#nav-anchor').offset().top;
			if (window_top > div_top) {
				$('#home header .cont_men').addClass('stick');
			} else {
				$('#home header .cont_men').removeClass('stick');
			}

		if(window_top > 50){
			$(".footer_menu .menu-principal-container").addClass('makeFix');
		}
	});
	/*Menu responsive*/
	$( "#nav_container ul li a" ).click(function() {
	 if(  $('#nav_container').hasClass( 'open' )){
		$(this).removeClass( 'open' );
		$('#nav_container').removeClass( 'open' );
		//$('.contenido_gral, .bloque .title_sec, .arrow_left').removeClass( 'move' );

	}else{
	   $('#nav_container').addClass( 'open' );
		$(this).addClass( 'open' );
		//$('.contenido_gral, .bloque .title_sec, .arrow_left').addClass( 'move' );

	}
	});
    $('#trigger-menu').on( 'click', function(e){

        e.preventDefault();

            if(  $('#nav_container').hasClass( 'open' )){
				$(this).removeClass( 'open' );
                $('#nav_container').removeClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').removeClass( 'move' );

            }else{
               $('#nav_container').addClass( 'open' );
				$(this).addClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').addClass( 'move' );

            }

    });
	$('#trigger-menu-close').on( 'click', function(e){

		e.preventDefault();


			if(  $('#nav_container').hasClass( 'open' )){
				$(this).removeClass( 'open' );
				$('#nav_container').removeClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').removeClass( 'move' );

			}else{
			   $('#nav_container').addClass( 'open' );
				$(this).addClass( 'open' );
				//$('.contenido_gral, .bloque .title_sec, .arrow_left').addClass( 'move' );

			}

	});

	$( window ).resize(function() {
		anchoPantalla= $(window).width();
		altoPantallaGal = $(window).height();
		if(anchoPantalla>=980 && anchoPantalla>altoPantalla){
			$('.teaser').css("height",altoPantalla);
			$('.contacto').css("height",altoPantalla);
			$('.embed-container').css("padding-bottom","0");
			$('.embed-container').css("height","100%");
		}
		else{
			$('.teaser').css("height","auto");
			$('.contacto').css("height","auto");
			$('.embed-container').css("padding-bottom","56.25%");
			$('.embed-container').css("height","0");
		}
		if(anchoPantalla>=900){
			$(".inline").colorbox.resize({width:"770"});
		}
		else{
			$(".inline").colorbox.resize({width:'90%', maxWidth:"770", maxHeight:"770"});
		}
		/*Organizar proyectos*/
		altoProyectos(anchoPantalla, canProy, catInicial);
		altoProyectosS1(anchoPantalla);
		/*Galeria interna de proyectos*/
		$('.galeria .row_full').css("height",altoPantallaGal);
		$('.galeria .col_c').css("height",altoPantallaGal);
		$('.galeria .fig_1').css("height",(altoPantallaGal/2));
		$('.galeria  .fig_2').css("height",(altoPantallaGal/2));
		/*Nosotros*/
		altoNosotros(anchoPantalla);
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

	if( $('#play_btn').length > 0 ){
		$('#play_btn').on( 'click', function(e){
			e.preventDefault();
			var video = $(this).data('video');
			// alert( video );
			showVideo( video );
		});
	}

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
				  	//alert("Ha ocurrido un error desconocido");
					$(".inline").colorbox.close();
					$("#error_venta").fadeIn();
				  }else if( html == "error" ){
				  	//alert("Ha ocurrido un error conocido");
					$(".inline").colorbox.close();
					$("#error_venta").fadeIn();
				  }else{
				  	form.fadeOut();
				  	//alert( "Vendido!" );
					$(".inline").colorbox.close();
					$("#exito_venta").fadeIn();
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
function showVideo( video ){
	 $('#player').html('<iframe src="https://player.vimeo.com/video/'+video+'?autoplay=true" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen id="video_vimeo"></iframe>');
	 $('#title').fadeOut( "slow");
	 $('#play_btn').fadeOut( "slow");
}
function altoProyectos(ancho, filtro, categoria){

	if(ancho>=975){widthResp=4;}
	if(ancho<975){widthResp=3;}
	if(ancho<759){widthResp=2;}
	if(ancho<549){widthResp=1;}

	var canFilas = Math.ceil(filtro/widthResp);
	var altoConPro=(canFilas*180)+ 67;/*67 del borde inferior*/

	$("#list_proy").css('height', altoConPro+"px");

	ordenProyectos(canFilas, filtro-1,widthResp, categoria);
}
function ordenProyectos(f, p, w, c){
	var bottomP=67;
	var rightP=12;
	var fila=1;
	var items=1;
	for(i=p; i>=0; i--){

		$('#list_proy li.' + c).eq(i).css('bottom', bottomP+'px');
		$('#list_proy li.' + c).eq(i).css('right', rightP+'px');
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
function outPopExito(){
	$("#exito_venta").fadeOut();
}
function outPopError(){
	$("#error_venta").fadeOut();
}
/*Filtros proyectos*/
function filterProject(cat, linkEvent){
	 $(".filtros li a").removeClass("current");
	 $(linkEvent).addClass("current");
	catInicial=cat;
	var cont=0;
	$('#list_proy li').each(function (){
    if($(this).hasClass(cat)){
      $(this).css("display", "block");
	  cont++;
    }
    else{
      $(this).css("display", "none");
    }

  });
  canProy=cont;
altoProyectos(anchoPantalla, canProy, catInicial);
}
/*Nosotros*/
function altoNosotros(ancho){
	anchoInicial=1200;
	altoInicial=861;
	if(ancho <= 1200 && ancho >= 650){
		altoFinal= Math.round(((ancho*altoInicial)/anchoInicial));	}
	else{
		altoFinal= Math.round(((ancho*altoInicial)/anchoInicial)-200);
	}
	$(".nosotros").css("padding-bottom",altoFinal);
}
