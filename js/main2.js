$(document).on('ready', funcPrincipal);

function funcPrincipal()
{
	$('#formLogin').on('submit', ejecutarAjax);
	//$('#btnLogin').on('click', funcVerificar);
}

function ejecutarAjax(event)
{
	var datosEnviados =
	{
		'user' : $('#user').val(),
		'pass' : $('#password').val(),
	}

	$.ajax({
		type      : 'POST',
		url       : 'includes/login/checklogin.php',
		data      : datosEnviados,
		dataType  : 'json',
		encode    : true
	}).done(function(datos){
		console.log(datos);
		if(datos.exito){
			console.log(datos.mensaje);
			swal({
		      title: "¡Hola "+datos.nombre+"!",
		      text: '¡<span style="color:#F8BB86">Bienvenido</span>! :)',
		      html: true,
		      timer: 1500,
		      showConfirmButton: false,
		      imageUrl: "img/thumbs-up.jpg",
		    });
		    var millisecondsToWait = 1000;
			setTimeout(function() {
			    location.href="inicio.php";
			}, millisecondsToWait);

		}else{
			if(!datos.errores.usuario && !datos.errores.contrasena){
				console.log("Verificar credenciales");
				swal({
		          title: ":(",
		          text: '<span style="color:#F8BB86">Verifica</span> tus credenciales!',
		          html: true,
		          timer: 1500,
		          showConfirmButton: false,
		          imageUrl: "img/thumbs-down.jpg",
		        });
			}else if(datos.errores.usuario){
				console.log(datos.errores.usuario);
				swal({
		          title: ":(",
		          text: '<span style="color:#F8BB86">Verifica</span> tu usuario!',
		          html: true,
		          timer: 1500,
		          showConfirmButton: false,
		          imageUrl: "img/thumbs-down.jpg",
		        });
			}else if(datos.errores.contrasena){
				console.log(datos.errores.contrasena);
				swal({
		          title: ":(",
		          text: '<span style="color:#F8BB86">Verifica</span> tu contraseña!',
		          html: true,
		          timer: 1500,
		          showConfirmButton: false,
		          imageUrl: "img/thumbs-down.jpg",
		        });
			}
		}
	});

	event.preventDefault();
}