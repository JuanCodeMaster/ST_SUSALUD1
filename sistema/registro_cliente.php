<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } else {
        $id = $_POST['id'];
        $año = $_POST['año'];
        $etapa_del_año = $_POST['etapa_del_año'];
        $avance = $_POST['avance'];
        $estado = $_SESSION['estado'];

        $result = 0;
        if (is_numeric($id) and $id != 0) {
            $query = mysqli_query($conexion, "SELECT * FROM cliente where id = '$id'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                                    El dni ya existe
                                </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO cliente(id,año,etapa_del_año,avance,estado) values ('$id', '$año', '$etapa_del_año', '$avance', '$estado')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                                    Autoevaluación Registrada
                                </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
            }
        }
    }
    mysqli_close($conexion);
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_cliente.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    Nueva Autoevaluación
                </div>
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                        <?php echo isset($alert) ? $alert : ''; ?>
                        <div class="form-group">
                            <label for="dni">año</label>
                            <input type="number" placeholder="Ingrese el año" name="dni" id="dni" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">etapa_del_año</label>
                            <input type="text" placeholder="Ingrese etapa del año" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefono">avance</label>
                            <input type="number" placeholder="Ingrese avance" name="telefono" id="telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccion">estado</label>
                            <input type="text" placeholder="Ingrese estado" name="direccion" id="direccion" class="form-control">
                        </div>
                        <input type="submit" value="Guardar Cliente" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php include_once "includes/footer.php"; ?>