<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['evaluador']) || empty($_POST['ano']) || empty($_POST['macroproceso']) || empty($_POST['proceso']) || empty($_POST['sub']) || empty($_POST['verificador']) || empty($_POST['tecnico']) || empty($_POST['fuente']) || empty($_POST['criterios'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
    $codproducto = $_REQUEST['id'];
    $evaluador = $_POST['evaluador'];
    $ano= $_POST['ano'];
    $macroproceso = $_POST['macroproceso'];
    $proceso = $_POST['proceso'];
    $sub = $_POST['sub'];
    $verificador  = $_POST['verificador'];
    $tecnico = $_POST['tecnico'];
    $fuente = $_POST['fuente'];
    $criterios = $_POST['criterios'];
    
    $query_update = mysqli_query($conexion, "UPDATE producto SET evaluador = '$evaluador', ano_periodo = '$ano', macroproceso = '$macroproceso', proceso = '$proceso', subproceso = '$sub', verificador = '$verificador', tecnico = '$tecnico', fuente = '$fuente', criterios = '$criterios' WHERE codproducto = $codproducto");
    
    if ($query_update) {
      $alert = '<div class="alert alert-primary" role="alert">
              Autoevaluacion Modificada
            </div>';
    } else {
      $alert = '<div class="alert alert-primary" role="alert">
                Error al Modificar
              </div>';
    }
  }
}

// Validar producto

if (empty($_REQUEST['id'])) {
  header("Location: lista_productos.php");
} else {
  $id_producto = $_REQUEST['id'];
  if (!is_numeric($id_producto)) {
    header("Location: lista_productos.php");
  }
  $query_producto = mysqli_query($conexion, "SELECT evaluador, ano_periodo, macroproceso, proceso, subproceso, verificador, tecnico, fuente, criterios FROM sis_venta.producto where codproducto = $id_producto");

  $result_producto = mysqli_num_rows($query_producto);
  if ($result_producto > 0) {
    $data_producto = mysqli_fetch_assoc($query_producto);
  } else {
    header("Location: lista_productos.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Autoevaluacion
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
              <label for="codigo">Evaluador</label>
              <input type="text" placeholder="Ingrese código de barras" name="evaluador" id="codigo" class="form-control" value="<?php   echo $data_producto['evaluador'];?>">
            </div>
             <div class="form-group">
              <label for="codigo">Año Periodo</label>
              <input type="text" placeholder="Ingrese código de barras" name="ano" id="codigo" class="form-control" value="<?php   echo $data_producto['ano_periodo'];?>">
            </div>
             <div class="form-group">
              <label for="codigo">Macro Proceso</label>
              <input type="text" placeholder="Ingrese código de barras" name="macroproceso" id="codigo" class="form-control" value="<?php   echo $data_producto['macroproceso'];?>">
            </div>
             <div class="form-group">
              <label for="codigo">Proceso</label>
              <input type="text" placeholder="Ingrese código de barras" name="proceso" id="codigo" class="form-control" value="<?php   echo $data_producto['proceso'];?>">
            </div>
             <div class="form-group">
              <label for="codigo">Sub Proceso</label>
              <input type="text" placeholder="Ingrese código de barras" name="sub" id="codigo" class="form-control" value="<?php   echo $data_producto['subproceso'];?>">
            </div>
             <div class="form-group">
              <label for="codigo">Verificador</label>
              <input type="text" placeholder="Ingrese código de barras" name="verificador" id="codigo" class="form-control" value="<?php   echo $data_producto['verificador'];?>">
            </div>

            <div class="form-group">
              <label for="producto">Tecnico</label>
              <input type="text" class="form-control" placeholder="Ingrese nombre del producto" name="tecnico" id="producto" value="<?php   echo $data_producto['tecnico'];?>">

            </div>
           
            <div class="form-group">
              <label for="producto">Fuente</label>
              <input type="text" class="form-control" placeholder="Ingrese nombre del producto" name="fuente" id="producto" value="<?php   echo $data_producto['fuente'];?>">

            </div>
            <div class="form-group">
              <label for="precio">Criterios</label>
              <input type="text" placeholder="Ingrese precio" class="form-control" name="criterios" id="precio" value="<?php   echo $data_producto['criterios'];?>">

            </div>
            <input type="submit" value="Actualizar Producto" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>