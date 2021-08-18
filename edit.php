<?php
include('db.php');

//* si se trae un dato por medio del metodo get 
if (isset($_GET['id'])) {

    //* eset dato del id que se llama por el metodo get  en una variable para poder procesar el dato
    $id = $_GET['id'];

    //TODO: consulta a la base de datos que llamara los datos si esta variale de arriba es igual al uno de los id de la columan idGuides
    $query = "SELECT * FROM guides WHERE idGuides = $id";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        //* mysqli_num_rows — Obtiene el número de filas de un resultado
        //! es decir si el numero de finas que me llam la consulta es 1
        $row = mysqli_fetch_array($result);
        //* almaceno todos los datos de nuevo en una variable row
        $name = $row['Name_guides'];
        $direction = $row['Direction_guides'];
        $phone = $row['Phone_guides'];
        $date = $row['Datepark_guides'];
        //* almceno los datos que se llaman de la base en nuevas variables
    }
    //TODO: todo este primero codigo es para tener los datos previos que quiero actualizar y poder visualizar lo en el formulario de actualizacion 

    //! esta parte del codigo es para actualizar los datos por medio del formulario de abajo
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

<!--Este formulario es el que me permite actualizar los datos-->
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