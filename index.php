<?php include("db.php") ?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <h2>Zoo <span class="badge bg-success">New</span>
    </h2>
    <p>Sistema de registro de datos</p>
</div>
<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MENSAJE DE ALERTA -->
            <!-- si la Sesion tiene almacenado el mensaje va a mostrar el codigo de alerta 
        traido de bootstrap -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <!--Para dar el color a la alerta segun lo guardado en la session de cada caso se la concadena la sda variavle del mesaje que nos determina este mismo en terminos de boostrap -->
                <?= $_SESSION['message'] ?> <!--muestra literalemente el mensaje-->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
                //*! libera todas las variables de sesión actualmente registradas
            } ?>

            <!-- formulario paea agregar guias-->
            <div class="card card-body">
                <form action="add.php" method="POST">
                    <!-- toda la informacion guardada va a ir a add.php por medio del metodo post -->
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre del guia" autofocus>
                        <input type="text" name="direction" class="form-control" placeholder="Direccion de recidencia">
                        <input type="text" name="phone" class="form-control" placeholder="Numero de telefono">
                        <input type="date" name="date" class="form-control">
                    </div>

                    <input type="submit" name="save" class="btn btn-success btn-block" value="Save">
                </form>
            </div>
        </div>
        <!--tabla que muestra los datos-->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Fecha de inicio</th>
                    </tr>
                </thead>
                <!--Este es el cuerpo de la tabla y dentro del mismo se hace una consulta para llamar los datos-->
                <tbody>
                    <?php
                    $query = "SELECT * FROM guides";
                    //* * En la variable $query se almacenan todos losa datos de la tabla guides
                    $result = mysqli_query($con, $query);
                    //* mysqli::query -- mysqli_query — Realiza una consulta a la base de datos
                    //! con-> variable que tiene la conexion a la base de datos
                    //! $query-> consulta que quiere llamar todos los datos

                    while ($row = mysqli_fetch_array($result)) { ?>
                    //* guarda en la variable row los datos de resultado como un array
                        <tr>
                            <td><?php echo $row['Name_guides']; ?></td>
                            <td><?php echo $row['Direction_guides']; ?></td>
                            <td><?php echo $row['Phone_guides']; ?></td>
                            <td><?php echo $row['Datepark_guides']; ?></td>
                            <!--De la variable row se llama cada dato en especifico-->
                            <td>
                                <a href="edit.php?id=<?php echo $row['idGuides']?>"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Editar</button></a>
                                <!--Este lo manda a la vista edit.php con el id de la variable row-->
                                <a href="delete.php?id=<?php echo $row['idGuides']?>"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Danger</button></a>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<?php include("includes/footer.php") ?>