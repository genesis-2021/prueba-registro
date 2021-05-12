<?php 
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM registro WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $monto = $row['monto'];
        }
    }
    if(isset($_POST['modificar'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $monto = $_POST['monto'];

        $query = "UPDATE registro set nombre = '$nombre', monto = '$monto' WHERE id = '$id'";       
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Modificado Correctamente';
        $_SESSION['message_type'] = 'info';
        header("Location: index.php");
    }
?>
<?php include("includes/header.php");?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-5">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>"
                        class="form-control" placeholder="nuevo nombre">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="monto" value="<?php echo $monto; ?>"
                        class="form-control" placeholder="nuevo monto">
                    </div>
                    <button class="btn btn-success" name="modificar">
                        Modificar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php");?>