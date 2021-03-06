<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['modalidad']) || empty($_POST['intervencion']) || empty($_POST['avance']) || empty($_POST['estado'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todo los campos son obligatorios
                    </div>';
    } else {



        $result = 0;

        $proveedor = $_POST['proveedor'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $Direccion = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];
        $modalidad = $_POST['modalidad'];
        $intervencion = $_POST['intervencion'];
        $avance = $_POST['avance'];
        $estado = $_POST['estado'];

        $query = mysqli_query($conexion, "SELECT * FROM proveedor where contacto = '$contacto'");
        $result = mysqli_fetch_array($query);


        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El Ruc ya esta registrado
                    </div>';
        }else{


        $query_insert = mysqli_query($conexion, "INSERT INTO proveedor(proveedor,contacto,telefono,direccion,usuario_id,modalidad,intervencion,avance,estado) values ('$proveedor', '$contacto', '$telefono', '$Direccion','$usuario_id','$modalidad','$intervencion','$avance','$estado')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Supervisión Registrado
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

            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar supervisón
                    </div>';
        }

        }
    }
}
mysqli_close($conexion);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header bg-primary text-white">
                Registro de Supervisión
            </div>
            <div class="card">

               

                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="nombre">PERIODO</label>
                        <input type="text" placeholder="Ingrese periodo" name="proveedor" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contacto">AÑO</label>
                        <input type="text" placeholder="Ingrese el año" name="contacto" id="contacto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">ENTIDAD</label>
                        <input type="text" placeholder="Ingrese la entidad" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">TIPO DE SUPERVISIÓN</label>
                        <input type="text" placeholder="Ingrese el tipo de supervisión" name="direccion" id="direcion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="modalidad">MODALIDAD</label>
                        <input type="text" placeholder="Ingrese la modalidad" name="modalidad" id="direcion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="intervencion">TIPO DE INTERVENCIÓN</label>
                        <input type="text" placeholder="Ingrese el tipo de intervención" name="intervencion" id="direcion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="avance">AVANCE</label>
                        <input type="text" placeholder="Ingrese el avance" name="avance" id="direcion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="estado">ESTADO</label>
                        <input type="text" placeholder="Ingrese el estado" name="estado" id="direcion" class="form-control">
                    </div>
                    <input type="submit" value="Guardar Supervisión" class="btn btn-primary">
                    <a href="lista_proveedor.php" class="btn btn-danger">Regresar</a>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php include_once "includes/footer.php"; ?>
