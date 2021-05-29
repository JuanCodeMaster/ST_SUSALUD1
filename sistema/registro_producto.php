<?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['evaluador']) || empty($_POST['ano_periodo']) || empty($_POST['macroproceso']) || empty($_POST['proceso']) || empty($_POST['verificador']) || empty($_POST['subproceso']) || empty($_POST['tecnico']) || empty($_POST['fuente'])|| empty($_POST['criterios'])) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
      echo $alert;
    } else {
      $evaluador = $_POST['evaluador'];
      $ano_periodo = $_POST['ano_periodo'];
      $macroproceso = $_POST['macroproceso'];
      $proceso = $_POST['proceso'];
      $subproceso = $_POST['subproceso'];
      $verificador = $_POST['verificador'];
      $tecnico= $_POST['tecnico'];
      $fuente= $_POST['fuente'];
      $criterios= $_POST['criterios'];
      $query_insert = mysqli_query($conexion, "INSERT INTO producto(evaluador,ano_periodo,macroproceso,proceso,subproceso,verificador,tecnico,fuente,criterios) values ('$evaluador','$ano_periodo', '$macroproceso', '$proceso', '$subproceso','$verificador','$tecnico','$fuente','$criterios')");
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert">
                Producto Registrado
              </div>';
        echo $alert;
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
              </div>';
        echo $alert;
      }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
     <a href="lista_productos.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <div class="card">
         <div class="card-header bg-primary">
           Nuevo Registro
         </div>
         <div class="card-body">
           <form action="" method="post" autocomplete="off">                  
               </select>
             </div>
             <div class="form-group">
               <label for="evaluador">EVALUADOR</label>
               <input type="text" placeholder="Ingrese nombre del evaluador" name="evaluador" id="evaluador" class="form-control">
             </div>
             <div class="form-group">
               <label for="ano_producto">ANO PERIODO</label>
               <input type="text" placeholder="Ingrese el ano del periodo" class="form-control" name="ano_periodo" id="ano_periodo">
             </div>
             <div class="form-group">
               <label for="macroproceso">MACROPROCESO NIVEL 0</label>
               <input type="text" placeholder="Ingrese macroproceso" class="form-control" name="macroproceso" id="macroproceso">
             </div>
             <div class="form-group">
               <label for="proceso">PROCESO NIVEL 1</label>
               <input type="text" placeholder="Ingrese proceso" class="form-control" name="proceso" id="proceso">
             </div>
             <div class="form-group">
               <label for="subproceso">SUBPROCESO NIVEL 2</label>
               <input type="text" placeholder="Ingrese subproceso" class="form-control" name="subproceso" id="subproceso">
             </div>
             <div class="form-group">
               <label for="verificador">VERIFICADOR</label>
               <input type="text" placeholder="Ingrese codigo verificador" name="verificador" id="verificador" class="form-control">
             </div>
             <div class="form-group">
               <label for="tecnico">TECNICOS EVALUATIVOS</label>
               <input type="text" placeholder="Ingrese tecnico evaluativo" name="tecnico" id="tecnico" class="form-control">
             </div>
             <div class="form-group">
               <label for="fuente">FUENTE REFERENCIAL</label>
               <input type="text" placeholder="Ingrese fuente" name="fuente" id="fuente" class="form-control">
             </div>
             <div class="form-group">
               <label for="criterios">CRITERIOS DE PUNTUACION</label>
               <input type="text" placeholder="Ingrese criterios" name="criterios" id="criterios" class="form-control">
             </div>
             <input type="submit" value="Guardar Producto" class="btn btn-primary">
           </form>
         </div>
       </div>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->
 <?php include_once "includes/footer.php"; ?>