<?php 

include "db_connection.php"; 
$conn = OpenCon();

if (isset($_GET['studentCode'])) {

    $student_id = $_GET['studentCode'];
    $sql = "DELETE FROM `student` WHERE `studentCode`='$student_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Estudiante eliminado satisfactoriamente";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

} 
echo "<a href=\".\"> Inicio </a> <br>";
$conn->close();

?>