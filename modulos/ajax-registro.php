<?php
  require_once("../config.php");
  header("Content-Type: text/html;charset=utf-8");
  require_once(_RUTA_NUCLEO."clases/class-constructor.php");
  $fmt = new CONSTRUCTOR;

  $nombres =  $_POST["nombre"];
  $email =  $_POST["email"];
  $pw =  $_POST["password"];
  $cpw =   $_POST["confirmar_password"];
  $empresa =   $_POST["empresa"];
  $validacion =   $_POST["validacion"];

  if (!empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE){
      $sql="SELECT usu_email FROM usuario WHERE usu_email='".$email."'";
      $rs = $fmt->query->consulta($sql,__METHOD__);
      $num= $fmt->query->num_registros($rs);
      if($num > 0){
        echo "error:email-1:".$email;
      }else{
        if (!empty($nombres)){
          $nom = explode(" ",$nombres);
          $c_nom = count($nom);
          $num_c = strlen($nombres);
          if($c_nom >1 && $num_c > 6){
            if (!empty($pw)){
              if(strlen($pw) > 5){
                if($pw==$cpw){
                  $password = base64_encode( $pw );
                  if (!empty($empresa)){
                    if( strlen($empresa) > 2){
                      $sql="SELECT emp_nombre FROM empresa WHERE emp_nombre='".$empresa."'";
                      $rs = $fmt->query->consulta($sql,__METHOD__);
                      $num= $fmt->query->num_registros($rs);
                      if($num > 0){
                        echo "error:empresa-1:".$email;
                      }else{
                        if($validacion==true){
                          $codigo = crear_codigo($fmt,"",6);
                          if ($c_nom = 2){
                            $nomx = $nom[0];
                            $apellido = $nom[1];
                          }

                          if ($c_nom = 3){
                            $nomx = $nom[0];
                            $apellido = $nom[1]." ".$nom[2];
                          }

                          if ($c_nom > 3){
                            $nomx = $nom[0]." ".$nom[1];
                            $apellido = $nom[2]." ".$nom[3];
                          }
                          

                          $ingresar = "usu_nombre, usu_apellidos, usu_email, usu_password, usu_activar,usu_estado,usu_padre";
                          $valores  = "'".$nomx."','".
                                $apellido."','".
                                $email."','".
                                base64_encode($pw)."','1','1','1'";
                          $sql="insert into usuario (".$ingresar.") values (".$valores.")";
                          $fmt->query->consulta($sql,__METHOD__);

                          $sql="select max(usu_id) as id_usu from usuario";
                          $rs= $fmt->query->consulta($sql,__METHOD__);
                          $fila = $fmt->query->obt_fila($rs);
                          $id = $fila ["id_usu"];

                          // ingresar rol
                          $ingresar1 ="usu_rol_usu_id, usu_rol_rol_id";
                          $valores1 = "'".$id."','3'";
                          $sql1="insert into usuario_roles (".$ingresar1.") values (".$valores1.")";
                          $fmt->query->consulta($sql1,__METHOD__);
                          
                          $emp_ra = $fmt->get->convertir_url_amigable($empresa);
                          $ingresar1 ="emp_nombre,emp_ruta_amigable,emp_activar";
                          $valores1 = "'".$empresa."','".$emp_ra."','1'";
                          $sql1="insert into empresa (".$ingresar1.") values (".$valores1.")";
                          $fmt->query->consulta($sql1,__METHOD__);

                          $sql="select max(emp_id) as id_emp from empresa";
                          $rs= $fmt->query->consulta($sql,__METHOD__);
                          $fila = $fmt->query->obt_fila($rs);
                          $emp_id = $fila ["id_emp"];

                          $hoy =$fmt->class_modulo->fecha_hoy('America/La_Paz');
                          $ingresar3="mod_cnt_emp_id,mod_cnt_usu_id,mod_cnt_codigo,mod_cnt_estado,mod_cnt_fecha_registro,mod_cnt_tipo";
                          $valores3 = "'$emp_id','$id','$codigo','1','$hoy','1'";
                          $sql3="insert into mod_cuenta_empresa (".$ingresar3.") values (".$valores3.")";
                          $fmt->query->consulta($sql3,__METHOD__);

                          $mensaje = "Tu registro es: ".$codigo." </br>Definir activación en: "._RUTA_WEB."activar-cuenta";
                      
                          $fmt->mail->enviar($email,'Registro Zam',$mensaje,'Registro Empresa '.$empresa,'mail@zam.net');

                          echo "registrar:".$codigo;
                        }else{
                          echo "error:capcha";
                        }
                      }
                    }else{
                      echo "error:empresa-min";
                    }
                  }else{
                    echo "error:empresa";
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
          }else{
            echo "error:apellidos:".$c_nom.":".$num_c;
          }
        }else{
          echo "error:nombre";
        }
      }
    }else{
      echo "error:email-0";
    }
  }else{
    echo "error:email";
  }


function crear_codigo($fmt,$nom,$cant){
    $pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for($i = 0; $i < $cant; $i++) {

        $key .= $pattern{rand(0, 35)};

    }

    $codigo = $nom."".$key;

    if(codigo_repetido($fmt,$codigo)){
      crear_codigo();
    }else{
      return $codigo;
    }

}

function codigo_repetido($fmt,$codigo){
  $consulta = "SELECT * FROM mod_cuenta_empresa WHERE mod_cnt_codigo='$codigo'";
  $rs =$fmt->query->consulta($consulta);
  $num=$fmt->query->num_registros($rs);
  if($num>0){
    return true;
  }else{
    return false;
  }
  $fmt->query->liberar_consulta();
}

  
?>