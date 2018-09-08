$(document).ready(function() { 

	$('.loading').hide();

	$('.btn-agregar-equipo').click(function(event) {
		var item = $(this).attr('item');
		
	});


	$(".input-equipo").keypress(function(e) {
	 	var item = $(this).attr('item');
	 	var valor = $(this).val();
     if(e.which == 13) {
        $(this).attr('type','hidden');
        $('.nombre-equipo[item='+item+']').html(valor);
        $('.nombre-equipo[item='+item+']').show();
        $('.btn-editar-equipo[item='+item+']').show();
        $('.btn-color').hide();
        alert_page({text:'Cambio de nombre de equipo, relizado exitosamente.',
                     icon:'icn icn-checkmark-circle',
                     animation_in:'bounceInRight',
                     animation_out:'bounceOutRight',
                     tipe:'success',
                     time:'3500',
                     position:'bottom-left'});
    	}
  });

  

  $(".btn-color").click(function(event) {
  	var item = $(this).attr('item');
  	$('.box-tab-color[item='+item+']').html('<a class="btn-color-select" item="'+item+'" style="background-color:#536DAC" color="#536DAC"></a><a class="btn-color-select" item="'+item+'" style="background-color:#00BCD4" color="#00BCD4"></a><a class="btn-color-select" item="'+item+'" style="background-color:#8BC34A" color="#8BC34A"></a><a class="btn-color-select" item="'+item+'" style="background-color:#FFC107" color="#FFC107"></a><a class="btn-color-select" item="'+item+'" style="background-color:#F44336" color="#F44336"></a>');
    $('.box-tab-color[item='+item+']').show();

    $('.btn-color-select').click(function(event) {
  		var item = $(this).attr('item');
  		var color = $(this).attr('color');
  		$('.inputColor[item='+item+']').val(color);
  		$('.tab[item='+item+']').attr('style', 'border-color:'+color);
  		$('.btn-color[item='+item+']').attr('style', 'background-color:'+color);
  		$('.box-tab-color').hide();
  		$('.btn-color').show();
  	});

  });

	$(document).bind('keydown',function(e){
		if ( e.which == 27 ) {
    	$('.nombre-equipo').show();
    	$('.tab .input-equipo').attr('type', 'hidden');
    	$('.btn-editar-equipo').show();
  	}
	});

	$('.btn-editar-equipo').click(function(event) {
		var item = $(this).attr('item');
		$('.nombre-equipo').hide();
		$('.tab[item='+item+'] .input-equipo').attr('type', 'text');
		$('.tab[item='+item+'] .btn-color').show();
		$(this).hide();
	});
});