/**
 * Created by DanielW on 4/19/16.
 */

$("#formNewMovie").on("submit", function(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("formNewMovie"));
    $.ajax({
        url: "includes/inserciones/insertar_pelicula.php",
        type: "POST",
        //dataType: "json",
        encode: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    }).done(function(datos){
        console.log("CONSULTA: "+datos);
        /*if(datos.exito){
         console.log("Película insertada");
         swal({
         title: "¡Publicado!",
         text: '¡La película se ha <span style="color:#F8BB86">publicado</span>!',
         html: true,
         timer: 750,
         showConfirmButton: false
         });
         setTimeout(function() {
         parent.$.fancybox.close();
         }, 750);
         }else{
         swal({
         title: "¡No Publicado!",
         text: '¡Verifica los siguientes campos: <span style="color:#F8BB86">'+datos.errores.mensaje+'</span>!',
         html: true,
         showConfirmButton: true
         });
         }*/
    });
})