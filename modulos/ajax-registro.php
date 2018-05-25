<?php
  require_once("../config.php");
  header("Content-Type: text/html;charset=utf-8");
  require_once(_RUTA_NUCLEO."clases/class-constructor.php");
  $fmt = new CONSTRUCTOR;

  $nombres =  $_POST["nombres"];
  $apellidos =  $_POST["apellidos"];
  $email =  $_POST["email"];
  $pw =  $_POST["password"];
  $cpw =   $_POST["confirmar_password"];
  $envios =   $_POST["envios"];
  $ubicacion =   $_POST["ubicacion"];
  $telefono =   $_POST["telefono"];
 
  
  if (!empty($nombres)){
    if (!empty($apellidos)){
      if (filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE){
        if (!empty($email)){
          $sql="SELECT usu_email FROM usuario WHERE usu_email='".$email."'";
          $rs = $fmt->query->consulta($sql,__METHOD__);
          $num= $fmt->query->num_registros($rs);
          if($num > 0){
            echo "error:email-1:".$email;
          }else{
            if (!empty($pw)){
              if(strlen($pw) > 5){
                if($pw==$cpw){
                  $password = base64_encode( $pw );
      
                  if (!empty($ubicacion)){
                    if (!empty($telefono)){

                    }
                  }else{
                    echo "error:ubicacion";
                  }
                }else{
                  echo "error:password-no";
                }
              }else{
                echo "error:password-min";
              }
            }else{
              echo "error:password";
            }
          }
        }else{
          echo "error:email";
        }
      }else{
        echo "error:email-0";
      }
    }else{
      echo "error:apellidos";
    }
  }else{
    if (empty($apellidos)){
      echo "error:nombre-apellidos";
    }else{
      echo "error:nombre";
    }
  }
?>