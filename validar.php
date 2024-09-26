<?php
include('conexion.php');

$usuario = $_POST['usuario'];
$pass = md5($_POST['pass']);

$query =$conn -> prepare( "SELECT * FROM registros 
WHERE rut=:usuario AND contraseña= :pass"); 
$query->bindParam(":usuario",$usuario);
$query->bindParam(":pass",$pass);
$query->execute();
$count=$query->rowCount();
$result = $query -> fetch(PDO:: FETCH_ASSOC);

if($count > 0){
   session_start();

   $_SESSION['activo']= true;
   $_SESSION['usuario']= $usuario;

   if($usuario == '153412977'){

    header("Location:eliminar.php");

   }else if ($usuario == '132497123') {

      header("Location:modificar.php");  	

  }else if ($usuario == '91273320') {
      header("Location:mostrar.php");
  }

}else{
header("Location:formulario.php?error=si");
}
?>

