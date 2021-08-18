<?php
include('db.php');

//* si se reciben datos por medio del metodo post en el input con el name save
if (isset($_POST['save'])) {
    echo "inicio";
    $name = $_POST['name'];
    $direction = $_POST['direction'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    //* Guarda los datos del metodo post en una nueva variable para manejar los datos

    echo $name;
    
    $query = "INSERT INTO guides(Name_guides, Direction_guides, Phone_guides, Datepark_guides) VALUES ('$name', '$direction', '$phone', '$date')";
    //* en la variable $query se guarda la consulta que inserta lod datos del formulario a la tabla
    $result = mysqli_query($con, $query);
    //* mysqli::query -- mysqli_query — Realiza una consulta a la base de datos
    //! con-> variable que tiene la conexion a la base de datos
    
    //* si la variable result esta vacia se muestra el quey failed
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Agregado';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}
