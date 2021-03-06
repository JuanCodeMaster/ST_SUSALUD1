<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['modalidad']) || empty($_POST['intervencion']) || empty($_POST['avance']) || empty($_POST['estado'])) {
    $alert = '<div class="alert alert-danger" role="alert">Todo los campos son requeridos</div>';
  } else {
    $idproveedor = $_GET['id'];
    $proveedor = $_POST['proveedor'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $modalidad  = $_POST['modalidad'];
    $intervencion = $_POST['intervencion'];
    $avance = $_POST['avance'];
    $estado = $_POST['estado'];

    $sql_update = mysqli_query($conexion, "UPDATE proveedor SET proveedor = '$proveedor', contacto = '$contacto' , telefono = '$telefono', direccion = '$direccion' , modalidad = '$modalidad', intervencion = '$intervencion', avance = '$avance', estado = '$estado' WHERE codproveedor = $idproveedor");

    if ($sql_update) {
      $alert = '<div class="alert alert-success" role="alert">Proveedor Actualizado correctamente</div>';
    } else {
      $alert = '
      <div class="alert alert-danger" role="alert">
 Error al Actualizar el Proveedor
</div>';
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_proveedor.php");
  mysqli_close($conexion);
}
$idproveedor = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM proveedor WHERE codproveedor = $idproveedor");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql > 0) {
  $j = mysqli_fetch_assoc($sql);
}else{
  header("Location: lista_proveedor.php");

}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary">
          <b style="color:white;">Modificar Supervisión</b>
        </div>
        <div class="card-body">
          <?php echo isset($alert) ? $alert : ''; ?>
          <form class="" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $idproveedor; ?>">
            <div class="form-group">
              <label for="proveedor">Periodo</label>
              <input type="text" placeholder="Ingrese proveedor" name="proveedor" class="form-control" id="proveedor" value="<?php echo $j["proveedor"]; ?>">
            </div>
            <div class="form-group">
              <label for="nombre">Año</label>
              <input type="text" placeholder="Ingrese contacto" name="contacto" class="form-control" id="contacto" value="<?php echo $j["contacto"]; ?>">
            </div>
            <div class="form-group">
              <label for="telefono">Entidad</label>
              <input type="text" placeholder="Ingrese Teléfono" name="telefono" class="form-control" id="telefono" value="<?php echo $j["telefono"]; ?>">
            </div>
            <div class="form-group">
              <label for="direccion">Tipo de Supervicion</label>
              <input type="text" placeholder="Ingrese Direccion" name="direccion" class="form-control" id="direccion" value="<?php echo $j["direccion"]; ?>">
            </div>
            <div class="form-group">
              <label for="direccion">Modalidad</label>
              <input type="text" placeholder="Ingrese Direccion" name="modalidad" class="form-control" id="direccion" value="<?php echo $j["modalidad"]; ?>">
            </div>
            <div class="form-group">
              <label for="direccion">Tipo de Intervención</label>
              <input type="text" placeholder="Ingrese Direccion" name="intervencion" class="form-control" id="direccion" value="<?php echo $j["intervencion"]; ?>">
            </div>
            <div class="form-group">
              <label for="direccion">Avance</label>
              <input type="text" placeholder="Ingrese Direccion" name="avance" class="form-control" id="direccion" value="<?php echo $j["avance"]; ?>">
            </div>
            <div class="form-group">
              <label for="direccion">Estado</label>
              <input type="text" placeholder="Ingrese Direccion" name="estado" class="form-control" id="direccion" value="<?php echo $j["estado"]; ?>">
            </div>

            <input type="submit" value="Editar Proveedor" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->
<?php include_once "includes/footer.php"; ?>