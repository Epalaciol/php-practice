<?php 

include "db_connection.php";
$conn = OpenCon();

$sql = "SELECT * FROM student";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista Estudiantes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Lista Estudiantes</h2>
        <table class="table">
            <thead>
                <tr>
                <th>Codigo</th>
                <th>Tipo Documento</th>
                <th>Numero Documento</th>
                <th>Nombre</th>
                <th>Numero de contacto</th>
                <th>email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr>
                            <td><?php echo $row['studentCode']; ?></td>
                            <td><?php echo $row['documentType']; ?></td>
                            <td><?php echo $row['documentNumber']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['contactNumber']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a class="btn btn-info" href="modificarStudent.php?studentCode=<?php echo $row['studentCode']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="borrarStudent.php?studentCode=<?php echo $row['studentCode']; ?>">Delete</a>
                            </td>
                            </tr>                       
                <?php       }
                    }
                ?>             
            </tbody>
        </table>
    </div> 
    <a href="./"> Inicio </a> <br>
</body>
</html>
<?php 
    $conn = OpenCon();
?>