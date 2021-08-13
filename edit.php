<?php
include('db.php');
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM guides WHERE idGuides = $id";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['Name_guides'];
        $direction = $row['Direction_guides'];
        $phone = $row['Phone_guides'];
        $date = $row['Datepark_guides'];

    }
    if (isset($_POST['update'])) {
        echo "actualizando";
        $id=$_GET['id'];
        $name2 = $_POST['name'];
        $direction2 = $_POST['direction'];
        $phone2 = $_POST['phone'];
        $date2 = $_POST['date'];
        echo $name2;
        echo $direction2;
        echo $phone2;
        echo $date2;
        $query2 = "UPDATE guides SET Name_guides='$name2', Direction_guides='$direction2', Phone_guides='$phone2', Datepark_guides='$date2' WHERE  idGuides= $id";

        mysqli_query($con, $query2);
        $_SESSION['message'] = 'Informacion actualizada correctamente';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');

    }
}
?>
<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="mx-auto col-md-4">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Actualiza el nombre">
                    </div>
                    <div class="form-group">
                        <input name="direction" type="text" class="form-control" value="<?php echo $direction; ?>" placeholder="Actualiza la direccion">
                    </div>
                    <div class="form-group">
                        <input name="phone" type="text" class="form-control" value="<?php echo $phone; ?>" placeholder="Actualiza el numero de telefono">
                    </div>
                    <div class="form-group">
                        <input name="date" type="text" class="form-control" value="<?php echo $date; ?>" placeholder="Actualiza la fecha en que inicio a trabajar">
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>