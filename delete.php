<?php
    include("db.php");

    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $query = "DELETE FROM guides WHERE idGuides = $id";

        $result = mysqli_query($con, $query);
        if (!$result) {
            echo "Query Failed.";
        }
    
        $_SESSION['message'] = 'Eliminado correctamente';
        $_SESSION['message_type'] = 'danger';

        header('Location: index.php');
    }
