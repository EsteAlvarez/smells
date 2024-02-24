$(document).ready(function () {

	$('#registrar').on('click', function(){
		window.location.href= 'registro.php';
	});
	//Saludo de bienvenida
	var fecha = new Date();
	var hora = fecha.getHours();
	function mostrarSaludo() {
		if (hora >= 0 && hora < 12) {
			$('#saludo-bienvenida').html('Buenos días')
		} else if (hora >= 12 && hora < 20) {
			$('#saludo-bienvenida').html('Buenas tardes')
		} else if (hora >= 20 && hora < 24) {
			$('#saludo-bienvenida').html('Buenas noches')
		}
	};
	mostrarSaludo();
	//Saludo de bienvenida

	//Mensaje de bienvenida
	var dia = fecha.getDay();
	var mensajesDeBienvenida = [
		'¡Feliz domingo aromático! Hoy te animamos a reflexionar sobre la semana que pasó y prepararte para una nueva semana llena de aromas y positividad. ¡Disfruta de un día relajante!',
		'¡Bienvenidos a una nueva semana llena de aromas y bienestar! Empecemos este lunes con energía y una bocanada de inspiración aromática. Descubre cómo los aceites esenciales pueden transformar tu día.',
		'Esperamos que estés listo para explorar el mundo de la aromaterapia hoy. Cada aroma tiene una historia que contar y un beneficio que ofrecer. ¡Acompáñanos en este viaje aromático!',
		'¡Mitad de semana y estamos aquí para brindarte equilibrio y relajación con nuestros aceites esenciales favoritos! Descubre cómo la aromaterapia puede aliviar el estrés y revitalizarte.',
		'Bienvenidos a un jueves aromático. Hoy, exploraremos la magia de los aceites esenciales y cómo pueden mejorar tu calidad de vida. ¡Aprovecha al máximo estos aromas naturales!',
		'¡Viernes aromático para relajarse y disfrutar! Te invitamos a sumergirte en los aromas que te ayudarán a desconectar y prepararte para un fin de semana de bienestar.',
		'Es fin de semana y el momento perfecto para mimarte con la aromaterapia. Permítete un día de tranquilidad y auto-cuidado con nuestros consejos y aceites esenciales.'
	]
	function mostrarMensaje() {
		$('#mensaje-bienvenida').html(mensajesDeBienvenida[dia]);
	};
	mostrarMensaje();
	//Mensaje de bienvenida



	//se trae por JSON todo lo que esta en la base de datos
	$.post('productos-json.php?a=lista', function (data, stage) {
		data = $.parseJSON(data);
		//console.log(data);
		//se define la variable $productos para guardar el id del div donde iran guardadas las tarjetas

		

		var $productos = $('#destacados');
		$.each(data, function (key, value) {
			var $precio = Intl.NumberFormat("de-DE", { style: "currency", currency: "CLP" }).format(value.precio);
			//aquí se crean las tarjetas, value.categoria es una clase para usar en los filtros. value.id es para conectar por metodo GET a la ficha del producto
			//value.codigo es para conectar las imagenes a su respectiva tarjeta. value.nombre se utiliza tanto en el alt de la imagen cómo en el titulo de la ficha
			//y value.precio muestra el precio definido en la base de datos. Todo es traido por JSON
			var card = '<div class="card col-md-3 col-8 m-md-2 mb-md-5 mb-5 m-auto hover-card ' + value.categoria + '"><div><a href="ficha.php?id=' + value.id + '"><img class="card-img-top" src="assets/img/productos/frascos-principales/' + value.codigo + '.jpeg" alt="' + value.nombre + '" data-hover-src="assets/img/productos/imagenes-contextuales/' + value.codigo + '.jpeg" data-original-src="assets/img/productos/frascos-principales/' + value.codigo + '.jpeg"></div><div class="card-body d-flex flex-md-column flex-column justify-content-between"><p class="card-text texto-card">' + value.nombre + '</p><p class="card-text texto-card">Precio: <span class="fw-bold"> $' + $precio + '</span></p></div></a></div>';
			$productos.append(card);

			$('.card').on('mouseenter', function() {
				var hoverSrc = $(this).find('img').data('hover-src');
				$(this).find('img').attr('src', hoverSrc);
			}).on('mouseleave', function() {
				var originalSrc = $(this).find('img').data('original-src');
				$(this).find('img').attr('src', originalSrc);
			});
			
		});



		//se define la variable $fichas para guardar la variable anterior $productos y todos sus "hijos" con la clase .card
		var $fichas = $productos.find('.card');
		// Mostrar todas las tarjetas al cargar la página
		$fichas.show();
		var categoriaSeleccionada = ''; // Variable para almacenar la categoría seleccionada
		$('#categorias button').on('click', function () {
			var nuevaCategoriaSeleccionada = $(this).data('categoria');
			// Si la nueva categoría seleccionada es la misma que la anterior, desactiva el filtro
			if (nuevaCategoriaSeleccionada === categoriaSeleccionada) {
				$fichas.show(); // Mostrar todos los productos
				categoriaSeleccionada = ''; // Borrar la categoría seleccionada

				// Quitar la clase de enfoque solo del botón actual
				$(this).removeClass('botones-focus').addClass('botones');
				$('#vermas').hide();
			} else {
				// Ocultar todas las tarjetas que no coincidan con la nueva categoría
				$fichas.hide();
				$('#vermas').show();
				
			$('#vermas').on('click', function () {
				window.location.href = 'catalogo-productos.php?categoria=' + nuevaCategoriaSeleccionada;
			});
				// Mostrar solo las tarjetas que contengan la clase de la categoría seleccionada
				$('.' + nuevaCategoriaSeleccionada).show();

				categoriaSeleccionada = nuevaCategoriaSeleccionada; // Actualizar la categoría seleccionada

				// Quitar la clase de enfoque de todos los botones y agregarla solo al botón actual
				$('#categorias button').removeClass('botones-focus').addClass('botones');
				$(this).removeClass('botones').addClass('botones-focus');
			}

		});
	});
	//se trae por JSON todo lo que esta en la base de datos



	//script para formulario personalizado
	$.post('controlador-formulario-personalizado.php?tipo=malestar').done(function (data, stage) {
		data = $.parseJSON(data);
		$.each(data, function (key, value) {
			$('#malestar').append('<option value="' + value.id + '">' + value.malestar + '</option>')
		});
	});
	// Selección del malestar o dolencia


	// Selección del aroma asociado al malestar
	$('#malestar').change(function () {
		$('#label_solucion').empty().html('¿Qué aroma es de tu preferencia?').hide();
		$('#solucion_malestar').empty().html('<option value="">Por favor seleccione algún aroma</option>').hide();
		$('#agregado').empty().html('<option value="">Por favor seleccione algún aceite portador o crema</option>').hide();
		$('#label_agregado').empty().html('Selecciona alguna crema o aceite portador para diluir tu esencia').hide();
		$('#contenedor-boton').hide();
		$('#descripcion_solucion').hide();
		$('#descripcion_agregado').hide();
		

		var malestar_id = $(this).val();
		$.post('controlador-formulario-personalizado.php?tipo=solucion', { 'malestar_id': malestar_id }).done(function (data, stage) {
			data = $.parseJSON(data);
			$.each(data, function (key, value) {
				$('#solucion_malestar').append('<option data-descripcion="' + value.descripcion + '" data-precio="' + value.precio + '" value="' + value.id + '">' + value.nombre + '</option>');
			});
			$('#label_solucion').show();
			$('#solucion_malestar').show();
		});
	});
	// Selección del aroma asociado al malestar


	// Selección del agregado (aceite portador o crema neutra)
	$('#solucion_malestar').change(function () {
		$('#agregado').empty().html('<option value="">Por favor seleccione algún aceite portador o crema</option>').hide();
		$('#label_agregado').empty().html('Selecciona alguna crema o aceite portador para diluir tu esencia').hide();
		$('#descripcion_agregado').hide();
		var descripcionSolucion = $('#solucion_malestar').find(':selected').data('descripcion');
		$('#contenedor-boton').hide();
		//console.log(descripcionSolucion);

		// var solucion_id = $(this).val();
		// $.post('formulario-personalizado.php?tipo=agregado', { 'codigo_solucion': solucion_id }).done(function(data, stage) {
		// });
		$.post('controlador-formulario-personalizado.php?tipo=agregado').done(function (data, stage) {
			data = $.parseJSON(data);
			$.each(data, function (key, value) {
				$('#agregado').append('<option data-descripcion="' + value.descripcion + '" data-precio="' + value.precio + '" value="' + value.id + '">' + value.nombre + '</option>');
			});
			$('#label_agregado').show();
			$('#agregado').show();
			$('#descripcion_solucion').show().html(descripcionSolucion);
		});
	});
	// Selección del agregado (aceite portador o crema neutra)

	//Boton para confirmar
	$('#agregado').change(function () {
		var descripcionAgregado = $('#agregado').find(':selected').data('descripcion');
		$('#descripcion_agregado').show().html(descripcionAgregado);
		$('#contenedor-boton').show();
	})
	//Boton para confirmar
	
	//mensaje de formulario enviado
    $("#p_personalizado").submit(function (event) {
        //event.preventDefault();
		alert('Su solicitud fue recibida con éxito');
    });


	var precioSolucion = 0;
	var precioAgregado = 0;
	//Precio del aroma (solucion a malestar)
	$(document).on('change', '#solucion_malestar', function () {
		var precioSeleccionado = parseFloat($(this).find(':selected').data('precio'));
		if (!isNaN(precioSeleccionado)) {
			precioSolucion = precioSeleccionado;
			//console.log('Precio de #solucion: ' + precioSolucion);
		}
	});
	//Precio del aroma (solucion a malestar)

	//Precio del agregado
	$(document).on('change', '#agregado', function () {
		var precioSeleccionado = parseFloat($(this).find(':selected').data('precio')); // Obtener el precio del elemento seleccionado
		if (!isNaN(precioSeleccionado)) {
			precioAgregado = precioSeleccionado; // Actualizar el precio de #agregado
			//console.log('Precio de #agregado: ' + precioAgregado);
		}
	});
	//Precio del agregado

	var precioTotal = 0;

	function calcularPrecioTotal() {
		var iva = (precioSolucion + precioAgregado) * 0.19;
		precioTotal = precioSolucion + precioAgregado + iva;
		precioTotal = parseInt(precioTotal);

		// Agrega un separador de coma en miles al precioTotal
		var precioFormateado = precioTotal.toLocaleString();

		$('#precio_total').html('Precio total = ' + '$' + precioFormateado);
		//console.log('Precio Total: ' + precioTotal);
	}

	//Calcular precio total

	$(document).on('change', '#solucion_malestar, #agregado', function () {
		calcularPrecioTotal();
		$('#precio_personalizado').val(precioTotal);
	});
	//script para formulario personalizado



	//script para productos relacionados en la ficha
	$.post('productos-json.php?a=lista', function (data, stage) {
		data = $.parseJSON(data);

		// Función para aleatorizar un arreglo
		function shuffleArray(array) {
			for (let i = array.length - 1; i > 0; i--) {
				const j = Math.floor(Math.random() * (i + 1));
				[array[i], array[j]] = [array[j], array[i]];
			}
		}

		// Aleatoriza los datos antes de crear las tarjetas
		shuffleArray(data);

		// Limita los datos a los primeros 3 elementos
		var limitedData = data.slice(0, 3);
		datosJson = data;
		var $relacionadosFicha = $('#relacionados-ficha');
		$.each(limitedData, function (key, value) {
			$id = value.id;
			$codigoSec = value.codigo_sec;
			var $precioFicha = Intl.NumberFormat("de-DE", { style: "currency", currency: "CLP" }).format(value.precio);
			var cardFicha = '<div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-3"><div class="card mx-auto ' + value.categoria + $id + '" style="width: 18rem;"><a href="ficha.php?id=' + $id + '"><img class="card-img-top" src="assets/img/productos/frascos-principales/' + value.codigo + '.jpeg" alt="' + value.nombre + '" data-hover-src="assets/img/productos/imagenes-contextuales/' + value.codigo + '.jpeg" data-original-src="assets/img/productos/frascos-principales/' + value.codigo + '.jpeg"><div class="card-body d-flex justify-content-between flex-column flex-md-column"><p class="card-text fw-bold texto-card">' + value.nombre + '</p><p class="card-text texto-card">Precio: <span class="fw-bold">$ ' + $precioFicha + '</span></p></div></a></div></div>';
			$relacionadosFicha.append(cardFicha);

			// Hover de imagenes contextuales de pagina ficha de producto
			$relacionadosFicha.find('.card').on('mouseenter', function() {
				var hoverSrc = $(this).find('img').data('hover-src');
				$(this).find('img').attr('src', hoverSrc);
			}).on('mouseleave', function() {
				var originalSrc = $(this).find('img').data('original-src');
				$(this).find('img').attr('src', originalSrc);
			});


		});
		
		
		

		//reemplazar la imagen principal de la ficha con las imagenes laterales
		$('#lateral1').on('click', function () {
			$.post('productos-json.php?a=ficha', { 'producto_id': $(this).data('id') }).done(function (data, stage) {
				data = $.parseJSON(data);
				$('#imagen-principal').attr('src', "assets/img/productos/frascos-secundarios/" + data.codigo_sec + ".jpeg");
			});
		});
		$('#lateral2').on('click', function () {
			$.post('productos-json.php?a=ficha', { 'producto_id': $(this).data('id') }).done(function (data, stage) {
				data = $.parseJSON(data);
				$('#imagen-principal').attr('src', "assets/img/productos/frascos-secundarios/" + data.codigo_ter + ".jpeg");
			});
		});
		$('#lateral3').on('click', function () {
			$.post('productos-json.php?a=ficha', { 'producto_id': $(this).data('id') }).done(function (data, stage) {
				data = $.parseJSON(data);
				$('#imagen-principal').attr('src', "assets/img/productos/frascos-secundarios/" + data.codigo_cuar + ".jpeg");
			});
		});
		//reemplazar la imagen principal de la ficha con las imagenes laterales
	});
	//script para productos relacionados en la ficha



	// boton que añade el producto al carrito
	$("#compra").submit(function(e) {
		e.preventDefault(); // Evita que el formulario se envíe de forma convencional

		// Crea un objeto de datos para enviar al servidor
		var datos = {
			cantidad: $("#cantidad").val(),
			precio: $("#precio").val(),
			codigo: $("#codigo").val(),
			nombre: $("#nombre").val(),
			producto_id: $("#producto_id").val(),
			cliente: $("#cliente").val(),
		};

		// Realiza la solicitud AJAX
		$.post("carrito.php", datos, function(respuesta) {
		}, "json");
			
		// alerta que confirma la acción
		Swal.fire({
			title: 'Producto añadido a la cesta',
			icon: 'success',
			footer: '<a href="carrito.php">Ir a la Cesta</a>',
			backdrop: false,
			timer: 5000,
			timerProgressBar: true,
			toast: true,
			position: 'bottom-end',
			showConfirmButton: false
		});
	});
	// boton que añade el producto al carrito

		$.post('compra-json.php?a=carrito', function(data,stage){
			data=$.parseJSON(data);
			console.log(data)
			var totalPrecio = 0;
			$.each(data,function(key,value){
				var cuerpo='<div class="row mt-3 m-auto fondo-carrito border"><div class="col-lg-2 d-lg-block d-md-none"><img id="imagen-principal" class="imagen-carrito d-lg-block d-none img-fluid" src="assets/img/productos/frascos-principales/' + value.codigo + '.jpeg" alt="' + value.nombre + '"></div><div class="col-lg-3 col-md-5 text-start p-3"><h2 class="h3">' + value.nombre + '</h2><span class="fw-bold">$' + Intl.NumberFormat("de-DE", { style: "currency", currency: "CLP" }).format(value.precio) + '</span></div><div class="col-lg-7 col-md-7 p-0 m-0 d-flex justify-content-center "><form class="text-start col-12 m-0 p-0 d-flex align-items-center flex-wrap" name="cantidadProducto" method="post" action="compra-json.php"><div class="text-center col-6 m-0 p-0"><label for="cantidad">Cantidad: ' + value.cantidad + '</label><div class="d-flex p-2"><span class="btn disminuir"><i class="bi bi-dash"></i></span><input type="number" name="cantidad" value="' + value.cantidad + '" min="1" max="10" class="text-black cantidad form-control"><input name="producto_id" type="hidden" value="' + value.producto_id + '"><span class="btn aumentar"><i class="bi bi-plus"></i></span></div></div><div class="col-6 m-0 p-0 text-center"><button type="submit" name="modificar" value="modificar" class="ver-mas p-2 me-3">Modificar</button><a href="carrito.php?idElm=' + value.id + '" class="eliminar ver-mas p-2"><i class="bi bi-trash-fill"></i></a></div></form></div></div>';
				$('#carritoJson').append(cuerpo);
				totalPrecio += parseFloat(value.precio*value.cantidad);
			});
			$('#totalPrecio').text('Total: $' + Intl.NumberFormat("de-DE", { style: "currency", currency: "CLP" }).format(totalPrecio));
			$(".aumentar").click(function() {
				var inputNumero = $(this).prev().prev($(".cantidad"));
				inputNumero.val(Math.max(0, parseInt(inputNumero.val()) + 1));
				if (inputNumero.val() > 10) {
					inputNumero.val(10);
				}
			});
			$(".disminuir").click(function() {
				var inputNumero = $(this).next($(".cantidad"));
				inputNumero.val(Math.max(0, parseInt(inputNumero.val()) - 1));
			});
			$('.eliminar').click(function() {
				return confirm('¿Estas seguro de eliminar el producto?')
			});
		});


		// alimentacion para la modal de compra finalizada
		$.post('compra-json.php?a=carrito', function(data,stage){
			data=$.parseJSON(data);
			console.log(data)
			var totalPrecio = 0;
			$.each(data,function(key,value){
				var cuerpo='<div class="card border-0 mb-3 col-12 col-lg-6"><div class="row g-0"><img id="imagen-principal" class="col-12 col-lg-6 pb-5 pt-5"src="assets/img/productos/frascos-principales/'+value.codigo+'.jpeg"alt="'+value.nombre+'"><div class="col-lg-6 ps-5 pt-5"><h2 class="p-1">'+value.nombre+'</h2><p class="fw-bold" style="font-size: 18px;">$'+Intl.NumberFormat("de-DE", { style: "currency", currency: "CLP" }).format(value.precio)+'</p><p>Cantidad: '+value.cantidad+'</p></div></div></div>';
				$('#finalizado').append(cuerpo);
				totalPrecio += parseFloat(value.precio*value.cantidad);
			});
			$('#totalPrecio').text('Total: $' + Intl.NumberFormat("de-DE", { style: "currency", currency: "CLP" }).format(totalPrecio));
		});


		// plugin de Mapeo de img responsive
		$('img[usemap]').rwdImageMaps();
		// plugin de Mapeo de img responsive


});

