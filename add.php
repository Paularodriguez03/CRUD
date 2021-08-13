<?php
include('db.php');

if (isset($_POST['save'])) {
    echo "inicio";
    $name = $_POST['name'];
    $direction = $_POST['direction'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    echo $name;
    
    $query = "INSERT INTO guides(Name_guides, Direction_guides, Phone_guides, Datepark_guides) VALUES ('$name', '$direction', '$phone', '$date')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Agregado';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}
