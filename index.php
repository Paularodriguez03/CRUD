<?php include("db.php") ?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <h2>Zoo <span class="badge bg-success">New</span></h2>
    <p>Sistema de registro de datos</p>
</div>
<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MESSAGES -->

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>

            <!-- ADD TASK FORM -->
            <div class="card card-body">
                <form action="add.php" method="POST">
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
                <tbody>
                    <?php
                    $query = "SELECT * FROM guides";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['Name_guides']; ?></td>
                            <td><?php echo $row['Direction_guides']; ?></td>
                            <td><?php echo $row['Phone_guides']; ?></td>
                            <td><?php echo $row['Datepark_guides']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['idGuides']?>"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Editar</button></a>
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