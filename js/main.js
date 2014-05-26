/*
 * Main JS
 * Jonathan Sánchez
 */
//Scroll para Navbar
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

$(function() {
    //Scroll Para las secciones    
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    /*Script para envío del formulario*/
    /*var inputs = $(".string");
    $.each(inputs,function(k,v){
        formularioContacto($(v));
    });*/
    //Envío de formulario
    $(".mensajeRespuesta").hide();
    
    $("#form-contacto").submit(function(){
        $.post("contacto.php", $("#form-contacto").serialize(),function(data){
            if(data=='ok'){
                $('#form-contacto').fadeOut(1000);
                $('.mensajeRespuesta').fadeIn(4000);
            }
        });
        return false;
    });

});