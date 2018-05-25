var sitio = "http://zam.wappcom.com/";

var onloadCallback = function() {
  grecaptcha.render('html_element', {
    'sitekey' : '6Ld1DVAUAAAAAK7aaXLuokNQtnrWo3H6iI2fmZdT'
  });
};
  
$(document).ready(function() {
    $(".btn-crear-cuenta-form").click(function(event) {
      var form_rg = new FormData();

      form_rg.append("email",$("#inputEmail").val());
      form_rg.append("nombre",$("#inputNombre").val());
      form_rg.append("password",$("#inputPassword").val());
      form_rg.append("confirmar_password",$("#inputConfirmarPassword").val());
      form_rg.append("empresa",$("#inputEmpresa").val());

      var ruta = sitio + "modulos/ajax-registro.php";
      $.ajax({
        url:ruta,
        type:"post",
        data:form_rg,
        processData: false,
        contentType: false,
        success: function(msgx){
          console.log(msgx);
          var dat = msgx.split(":");
          if (dat[0]=="error"){
            switch(dat[1]) {
              case "nombre":
                $("#inputNombre").parent().addClass('error');
                $("#inputNombre").attr("placeholder","Ingresa Nombre(s)");
              break;
              case "apellidos":
                $("#inputApellidos").parent().addClass('error');
                $("#inputApellidos").attr("placeholder","Ingresa Apellido(s)")
              break;
              case "nombre-apellidos":
                $("#inputNombre").parent().addClass('error');
                $("#inputNombre").attr("placeholder","Ingresa Nombre(s)");
                $("#inputApellidos").parent().addClass('error');
                $("#inputApellidos").attr("placeholder","Ingresa Apellido(s)")
              break;
              case "email":
                $("#inputEmail").addClass('error');
                $("#inputEmail").attr("placeholder","Ingresa un e-mail");
              break;
              case "email-0":
                $("#inputEmail").val("");
                $("#inputEmail").addClass('error');
                $("#inputEmail").attr("placeholder","Email no valido, intenta con otro. ");
              break;
              case "email-1":
                $("#inputEmail").val("");
                $("#inputEmail").addClass('error');
                $("#inputEmail").attr("placeholder","Ya existe este e-mail: "+dat[2]);
                $(".mensajes-aux-inputEmail").html("<a href='<?php echo _RUTA_WEB; ?>ingresar'>Ingresar</a> o <a href='<?php echo _RUTA_WEB; ?>recordar-contrasena'>Recordar contraseña</a>");
              break;
              case "password":
                $("#inputPassword").addClass('error');
                $("#msg-pass-inputPassword").html("Agrega un password valido.");
              break;              
              case "password-min":
                $("#inputPassword").addClass('error');
                $("#msg-pass-inputPassword").html("Agrega un password de al menos 6 digitos.");
              break;              
              case "password-no":
                $("#inputConfirmarPassword").addClass('error');
                $("#msg-pass-inputConfirmarPassword").html("El password no coincide de con la confirmación.");
              break;
            }

            $("#inputNombre").keydown(function(event) {
              $("#inputNombre").parent().removeClass('error');
            });            
            $("#inputApellidos").keydown(function(event) {
              $("#inputApellidos").parent().removeClass('error');
            });            
            $("#inputApellidos").keydown(function(event) {
              $("#inputApellidos").parent().removeClass('error');
            });            
            $("#inputEmail").keydown(function(event) {
              $("#inputEmail").removeClass('error');
              $(".mensajes-aux-inputEmail").html("");
            });           
            $("#inputPassword").keydown(function(event) {
              $("#inputPassword").removeClass('error');
              $("#msg-pass-inputPassword").html("");
            });            
            $("#inputConfirmarPassword").keydown(function(event) {
              $("#inputConfirmarPassword").removeClass('error');
              $("#msg-pass-inputConfirmarPassword").html("");
            });
          }
        }
      });
    });
  });