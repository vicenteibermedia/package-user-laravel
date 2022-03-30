var pagina_actual;
var filtros=[];

function IniciaBotonesBuscador()
{
	obtenerFiltros();
	if(filtros.length == 0 ){
		$(".filtros_busqueda").toggle();
	}
	$(".pagination a").unbind('click');
	$(".pagination a").click(function (e){
		e.preventDefault();
		var url_string = $(this).attr("href");
		var url = new URL(url_string);
		var page = url.searchParams.get("page");
		RealizaBusqueda(page);
	});

  $("#q").unbind('keyup');
	$("#q").on('keyup',function(event){
		// Busqueda si al menos 2 caracteres
		//if ($('#q').val().length==0 || $('#q').val().length>1)
		if (event.keyCode==13)
		{
			RealizaBusqueda();
		}
	});

  //$("#boton_filtros").unbind("click");
	$(document).on('click',"#boton_filtros",function (e){
		e.preventDefault();
		$(".filtros_busqueda").toggle();
	});

	// $('.filtros_busqueda select.select2').unbind('change');//esto quita ña funcion de o change
	$('.filtros_busqueda select.select2').change(function() {
		var currentTypeFilter = $(this).attr("name");
		var currentValue = $(this).val();
		/*console.log(currentTypeFilter);
		console.log(currentValue);
		console.log(jQuery.type(currentValue));
		console.log(filtros);
		console.log(filtros.includes(currentTypeFilter));*/
		if ($(this).val()!=null && $(this).val()!='')
		{
			if(filtros.includes(currentTypeFilter))
			{
				var posicion = filtros.indexOf(currentTypeFilter);
				filtros[posicion+1] = (jQuery.type(currentValue)=='string')?currentValue:currentValue.join("#");
			}
			else
			{
				filtros.push(currentTypeFilter);
				if (jQuery.type(currentValue)=='string') filtros.push(currentValue);
				else filtros.push(currentValue.join("#"));
			}
		}
		else
		{
			var pos = filtros.indexOf(currentTypeFilter);
			filtros[pos+1] = "";
			if(filtros[pos+1] == "")
			{
				filtros.splice(pos,2);
			}
		}
		//RealizaBusqueda();
	});

	$('.filtros_busqueda select.select4').change(function() {
		//console.log($(this).val()+" "+$(this).val().length);
		var currentTypeFilter = $(this).attr("name");
		var currentValue = $(this).val();
		console.log(currentTypeFilter+" "+currentValue);
		console.log(filtros.includes(currentTypeFilter));
		console.log(($(this).val()!=null));
		if ($(this).val()!=null && $(this).val()!='')
		{
			if(filtros.includes(currentTypeFilter))
			{
				var posicion = filtros.indexOf(currentTypeFilter);
				filtros[posicion+1] = currentValue;
			}
			else
			{
				filtros.push(currentTypeFilter);
				filtros.push(currentValue);
			}
		}
		else
		{
			var pos = filtros.indexOf(currentTypeFilter);
			/*
			filtros[pos+1] = filtros[pos+1].replace(currentValue+'#','');
			filtros[pos+1] = filtros[pos+1].replace('#'+currentValue,'');
			filtros[pos+1] = filtros[pos+1].replace(currentValue,'');
			*/
			filtros[pos+1] = "";
			if(filtros[pos+1] == "")
			{
				filtros.splice(pos,2);
			}
		}
		//RealizaBusqueda();
	});

	$(".filtros_busqueda .fecha, .filtros_busqueda .txt").unbind('change');
	$(".filtros_busqueda .fecha, .filtros_busqueda .txt").on('change',function(){
		if (!$(this).hasClass('fecha') || $(this).val().length==0 || $(this).val().length==10)
		{
			var currentTypeFilter = $(this).attr("name");
			var currentValue = $(this).val();
			if ($(this).val().length!=0)
			{
				if(filtros.includes(currentTypeFilter))
				{
					var posicion = filtros.indexOf(currentTypeFilter);
					filtros[posicion+1] = currentValue;
				}
				else
				{
					filtros.push(currentTypeFilter);
					filtros.push(currentValue);
				}
			}else{
				var pos = filtros.indexOf(currentTypeFilter);
				filtros.splice(pos,2);
			}
			//RealizaBusqueda();
		}
	});

	//Para añadir filtros debemos de indicar en el name del input del checkbox la columna de la tabla donde se encuentra el valor que corresponde.
	$('.check_filtros').unbind('change');
	$('.check_filtros').on('change', function() {
		var currentTypeFilter = $(this).attr("name");
		var currentValue = $(this).attr('value');

		//Si lo checkeamos
		if ($(this).prop('checked'))
		{
			if(filtros.includes(currentTypeFilter))
			{
				var posicion = filtros.indexOf(currentTypeFilter);
				filtros[posicion+1] = filtros[posicion+1].concat('#'+currentValue);
			}
			else
			{
				filtros.push(currentTypeFilter);
				filtros.push(currentValue);
			}
		}
		else
		{
			var pos = filtros.indexOf(currentTypeFilter);
			filtros[pos+1] = filtros[pos+1].replace(currentValue+'#','');
			filtros[pos+1] = filtros[pos+1].replace('#'+currentValue,'');
			filtros[pos+1] = filtros[pos+1].replace(currentValue,'');
			if(filtros[pos+1] == "")
			{
				filtros.splice(pos,2);
			}
		}
		//RealizaBusqueda();
	});

	$('.fecha').datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
		changeYear: true,
		yearRange: "-10:+10",
		}
	);
}

function RealizaBusqueda(){
	$("[name=filtros]").val(filtros);
 	$("[name=filtros]").closest('form').submit();
}

function ReiniciarFiltro(){
	$("[name=filtros]").val('');
	$("[name=filtros]").closest('form').submit();
}

$(document).ready(function() {
	$( document ).on( 'focus', '.filtros_busqueda input', function(){
      $( this ).attr( 'autocomplete', 'new-password' );
  });
});

function obtenerFiltros(){
	$('select.select2').each(function() {
			name = $(this).attr("name");
			$('[name='+name+']').each(function() {
				$('option:selected',this).each(function(){
					if(filtros.includes(name))
					{
						var posicion = filtros.indexOf(name);
						filtros[posicion+1] = filtros[posicion+1].concat('#'+$(this).val());
					}
					else
					{
						filtros.push(name);
						filtros.push($(this).val());
					}
				})
			});
	});
}
