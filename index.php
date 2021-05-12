<?php    include("db.php") ?>

<?php    include("includes/header.php") ?>

<div class="container p-5">
    <div class = "row">
        <div class = "col-md-4">

            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?>
                alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dismiss = "alert"
                aria-label="Close"></button>
                </div>
            <?php session_unset(); }?>

            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="mb-4">
                        <span class="input-group-text" id="basic-addon1">Nombre: </span>
                        <input type="text" name="nombre" class="form-control"
                        placeholder="nombre y apellidos" autofocus>
                    </div>
                    <div class="mb-4">
                        <span class="input-group-text" id="basic-addon1">Bs:</span>
                        <input type="text" name="monto" class="form-control"
                        placeholder="0" >
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success" 
                        name="registrar" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <table class=" table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE COMPLETO</th>
                        <th>MONTO CANCELADO</th>
                        <th>ACCIONES A EJECUTAR</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php 
                        $query = "SELECT * FROM registro";
                        $resultado_registro = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($resultado_registro)){ ?>
                             <tr>
                                <td> <?php echo $row['nombre'] ?></td>
                                <td> <?php echo $row['monto'] ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                             </tr>
                    <?php } ?>
                </tbody>                         
            </table>
        </div>
    </div>
</div>

<?php    include("includes/footer.php") ?>


