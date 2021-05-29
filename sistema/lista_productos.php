<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Productos</h1>
		<a href="registro_producto.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>EVALUADOR</th>
							<th>ANO PERIODO</th>
							<th>MACROPROCESO <br> NIVEL0</th>
							<th>PROCESO <br> NIVEL1</th>
							<th>SUBPROCESO <br> NIVEL2</th>
							<th>VERIFICADOR</th>
							<th>TECNICOS EVALUATIVOS</th>
							<th>FUENTE REFERENCIAL</th>
							<th>CRITERIOS DE PUNTUACION</th>
							<th>PUNTUACION</th>
							<th>OBSERVACIONES</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM producto");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['codproducto']; ?></td>
									<td><?php echo $data['evaluador']; ?></td>
									<td><?php echo $data['ano_periodo']; ?></td>
									<td><?php echo $data['macroproceso']; ?></td>
									<td><?php echo $data['proceso']; ?></td>
									<td><?php echo $data['subproceso']; ?></td>
									<td><?php echo $data['verificador']; ?></td>
									<td><?php echo $data['tecnico']; ?></td>
									<td><?php echo $data['fuente']; ?></td>
									<td><?php echo $data['criterios']; ?></td>
										<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="agregar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-primary"><i class='fas fa-audio-description'></i></a>

										<a href="editar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

										<form action="eliminar_producto.php?id=<?php echo $data['codproducto']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
										<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>

</div>
<!-- /.container-fluid -->


<?php include_once "includes/footer.php"; ?>