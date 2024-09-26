<?php
include('conexion.php');

if ($_POST['contrasena1'] == $_POST['contrasena2']) {
			
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contraseña = md5($_POST['contrasena2']);
    
    $sql =  "INSERT INTO REGISTROS (rut,nombre,apellido,email,contraseña)
    VALUES ( '$rut', '$nombre', '$apellido', '$email', '$contraseña')";    
    $query= $conn -> prepare($sql);    
    $query ->execute() ;
         
    header("Location:formulario.php?valida=si");    
} else {
    header("Location:formulario.php?error=si");
}
?>




