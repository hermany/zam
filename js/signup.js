var sitio = "http://zam.wappcom.com/";
var validado = false;

function onSubmit(token) {
  // console.log("validado");
  validado = true;
}

var onloadCallback = function() {
  grecaptcha.render('html_element', {
    'sitekey' : '6Ld1DVAUAAAAAK7aaXLuokNQtnrWo3H6iI2fmZdT',
    'callback' : onSubmit
  });
};
  
$(document).ready(function() {

  $(".btn-validar").click(function(event) {

    var form_rg = new FormData();
    form_rg.append("codigo",$("#inputValidar").val());
    form_rg.append("valor",$(this).attr("valor"));
    var ruta = sitio + "modulos/ajax-validar.php";
      $.ajax({
        url:ruta,
        type:"post",
        data:form_rg,
        processData: false,
        contentType: false,
        success: function(msgx){
          
          var dat = msgx.split(":");
          console.log(msgx);
          if (dat[0]=="error"){
            if (dat[1]!=4){
              $(".btn-validar").attr("valor",dat[1]);
              $(".mensaje").html("Error en el código, intenta nuevamente");
              setTimeout(function() {
                $(".mensaje").html("");
              },2000);
            }else{
              $(".mensaje").html("Muchos intentos, intenta en media hora.");
              $(".contenido").addClass('disabled');
            }
          }
          if(dat[0]=='saltar'){
            location.href = sitio + "colaboradores";
          }
        }
      });
  });

  $(".btn-enviar-codigo").click(function(event) {
    var email = $(this).attr("email");
    var form_re = new FormData();
    form_re.append("email",email);
    $(this).addClass('animated flash')
    var ruta = sitio + "modulos/ajax-reenviar.php";
      $.ajax({
        url:ruta,
        type:"post",
        data:form_re,
        processData: false,
        contentType: false,
        success: function(msgx){
          console.log(msgx);
          
          if (msgx=="ok"){
            $(".btn-enviar-codigo").html("Código enviado.");
            $(".btn-enviar-codigo").removeClass('animated flash');
            $(".btn-enviar-codigo").addClass('disabled');
          }
        }
      });  
  });

  $( ".form-check-input" ).click(function(event) {
    if( !$( this ).is( ":checked" )) {
      $(".btn-crear-cuenta-form").addClass('disabled');
    }else{
      $(".btn-crear-cuenta-form").removeClass('disabled');
    }
  });

    $(".btn-crear-cuenta-form").click(function(event) {
      var form_rg = new FormData();

      form_rg.append("email",$("#inputEmail").val());
      form_rg.append("nombre",$("#inputNombre").val());
      form_rg.append("password",$("#inputPassword").val());
      form_rg.append("confirmar_password",$("#inputConfirmarPassword").val());
      form_rg.append("empresa",$("#inputEmpresa").val());
      form_rg.append("validacion",validado);

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
          if (dat[0]=="registrar"){
            // console.log("validado");
            location.href = sitio+ "validar-cuenta/p=1&e=" + $("#inputEmail").val();
          }
          if (dat[0]=="error"){
            switch(dat[1]) {
              case "nombre":
                $("#inputNombre").addClass('error');
                $("#inputNombre").attr("placeholder","Ingresa Nombre(s)");
              break;
              case "apellidos":
                $("#inputNombre").addClass('error');
                $(".mensajes-aux-nombre").html("El nombre no concide con uno valido.");
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
                $("#inputEmail").attr("placeholder","Ya existe este e-mail.");
                $(".mensajes-aux-inputEmail").html("<a href='"+sitio+"ingresar'>Ingresar</a> o <a href='"+sitio+"recordar-contrasena'>Recordar contraseña</a>");
              break;
              case "password":
                $("#inputPassword").addClass('error');
                $(".msg-pass").html("Agrega un password valido.");
              break;              
              case "password-min":
                $("#inputPassword").addClass('error');
                $(".msg-pass").html("Agrega un password de al menos 6 digitos.");
              break;              
              case "password-no":
                $("#inputConfirmarPassword").addClass('error');
                $(".msg-pass").html("El password no coincide de con la confirmación.");
              break;
              case "empresa":
                $("#inputEmpresa").addClass('error');
                $("#inputEmpresa").attr("placeholder","Ingresa un nombre de Empresa");
              break;

              case "empresa-min":
                $("#inputEmpresa").addClass('error');
                $(".msg-empresa").html("El nombre debe ser mayor a 2 caracteres.");
              break;
              case "captha":
                $(".msg-captha").html("Hay un error de captha. Intenta otra vez.");
              break;
            }

            

            $("#inputNombre").keydown(function(event) {
              $("#inputNombre").removeClass('error');
              $(".mensajes-aux-nombre").html("");
            });

            $("#inputEmpresa").keydown(function(event) {
              $("#inputEmpresa").removeClass('error');
              $(".msg-empresa").html("");
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