<?php
    include 'db_connection.php';

    $conn = OpenCon();
    $query = "SELECT * FROM student"; //You don't need a ; like you do in SQL
    $result = $conn->query($query);

    $tipoTabla = "Profesor";
    
    echo "<h1> Este es una prueba de " .$tipoTabla." </h1>";
    
    
    echo "<table  border=\"1\" cellspacing=\"0\" cellpadding=\"10\">"; // start a table tag in the HTML
    
    if ($result->num_rows > 0) {
        // output data of each row'
        while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
            echo "<tr> <td>" . htmlspecialchars($row['name']) . "</td> <td>" . htmlspecialchars($row['contactNumber']) . "</td> <td>" . htmlspecialchars($row['email']) ."</td> </tr>";  //$row['index'] the index here is a field name
         }
    
        echo "</table>";

    } else {
        echo "0 results";
    }

    echo "<a href=\"registrarStudent.php\"> Registrar Estudiante </a> <br>";

    echo "<a href=\"https://www.google.com\"> Ir a Google </a>";
    $conn->close();;
?>