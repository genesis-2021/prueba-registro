<?php
include("db.php");

    if (isset($_POST['registrar']))
    {
        $nombre = $_POST['nombre'];
        $monto = $_POST['monto'];
        
        $query = "INSERT INTO registro(nombre, monto) VALUES ('$nombre', '$monto')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        }
        
        $_SESSION['message'] = 'Guardado Correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php" );
    }

?>