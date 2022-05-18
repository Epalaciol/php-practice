<?php
  include "db_connection.php";
  $conn = OpenCon();

  if (isset($_POST['submit'])) {

    $documentType = $_POST['documentType'];
    $documentNumber = $_POST['documentNumber'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];

    $consultaById  = "SELECT * FROM `student` WHERE `documentType` = '$documentType' AND `documentNumber` = '$documentNumber' ";
    
    if(($conn->query($consultaById))->num_rows >0) {
      echo "Ya existe";


    }else{

      $insertSql = "INSERT INTO `student` (`documentType`, `documentNumber`, `name`,
                  `password`,`contactNumber`, `email`) 
                  VALUES ('$documentType', '$documentNumber', '$name',
                  '$password', '$contactNumber', '$email')";

      $result = $conn->query($insertSql);    
    
      if($result){
        echo "Estudiante guardado de manera exitosa";
      }
      else {
        echo "El estudiante no ha podido ser guardado \n Causa: ". $conn -> error;
      }
    }
    $conn->close();
  };
?>
<!DOCTYPE html>
<html>
<body>
  <h2>Registro Estudiante</h2>
  <form action="" method="POST">
    <fieldset>
      <legend>Personal information:</legend>

      <label for="documentType">Escoga tipo de documento:</label>
      <select name="documentType" id="documentType">
        <option value="CC">Cedula</option>
        <option value="CE">Cedula de extranjeria</option>
        <option value="TI">Tarjeta de identidad</option>
        <option value=" ">Registro civil</option>
        <option value="PT">Pasaporte</option>
      </select>
      <br>
      <br>
      Numero de documento: <input type="text" name="documentNumber">
      <br>
      <br>
      Nombre Completo: <input type="text" name="name" placeholder="Pedro Diaz">
      <br>
      <br>
      Contrasena: <input type="password" name="password">
      <br>
      <br>
      numero de contacto: <input type="text" name="contactNumber">
      <br>
      <br>
      Email: <input type="email" name="email">
      <br>
      <br>
      <input type="submit" name="submit" value="submit">
    </fieldset>
  </form>
</body>
</html>