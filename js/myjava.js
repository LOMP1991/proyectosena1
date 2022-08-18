$(document).ready(pagination(1));
$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#nuevo-novedad').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro de novedades');
		$('#edi').hide();
		$('#reg').show();

		$('#registra-novedad').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-proapr').on('keyup',function(){
		var dato = $('#bs-proapr').val();
		var url = '../admin/busca_aprendices2.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../admin/busca_aprendices.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function agregaNovedades(){
	var url = '../admin/agregarnovedad.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarProducto(id){
	var url = '../admin/elimina_producto.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id_novedad='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function NovedaSelecionada(id_aprendiz){
	
	var url = '../admin/SelectNoveAprendiz.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id_aprendiz='+id_aprendiz,
		success: function(valores){
				var datos = eval(valores);
				$('#formulario')[0].reset();
				$('#reg').show();
				$('#edi').hide();
				$('#pro').val('Registro');
				$('#id-aprendiz').val(id_aprendiz);
				$('#primer-nombre').val(datos[0]);
				$('#segundoN-apr').val(datos[1]);
				$('#primerApe-apr').val(datos[2]);
				$('#segundoApe-apr').val(datos[3]);
				$('#id-complejo').val(datos[4]);
				$('#registra-novedad').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../admin/edita_novedad.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id_novedad='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar Novedad');
				$('#id-novedad').val(id);
				$('#primer-nombre').val(datos[0]);
				$('#segundoN-apr').val(datos[1]);
				$('#primerApe-apr').val(datos[2]);
				$('#segundoApe-apr').val(datos[3]);
				$('#primer-Nom').val(datos[4]);
				$('#segundo-Nom').val(datos[5]);
				$('#primer-apell').val(datos[6]);
				$('#segundo-apell').val(datos[7]);
				$('#descripcion-tipo-novedad').val(datos[8]);
				$('#descripcion-motivo').val(datos[9]);
				$('#id-instructor').val(datos[10]);
				$('#id-aprendiz').val(datos[11]);
				$('#id-complejo').val(datos[12]);
				$('#id-tipo-novedad').val(datos[13]);
				$('#id-motivo').val(datos[14]);
				$('#registra-novedad').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	var url = '../paginarProductos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}