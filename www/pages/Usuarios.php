<!DOCTYPE html>
<html lang="ES">
<!doctype html>
<html class="no-js" lang="es">
<?php
session_start();
$sesionrol = $_SESSION['rol'];
if ($sesionrol == null) {
	header('Location: Login.php');
}
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bulma.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<!-- SWEET ALERT-->
	<link rel="stylesheet" href="../assets/plugins/SweetAlert/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="../assets/plugins/SweetAlert/dist/sweetalert2.css">
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 800px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}
	</style>
	<script>
		function mod(id, usuario, clave, rol, estado) {
			document.getElementById("idE").value = id;
			document.getElementById("usuarioE").value = usuario;
			document.getElementById("claveE").value = clave;
			document.getElementById("rolE").value = rol;
			document.getElementById("estadoE").value = estado;
		}

		function del(id) {
			document.getElementById("lo").value = id;
		}
	</script>
	<script>
		$(document).ready(function() {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function() {
				if (this.checked) {
					checkbox.each(function() {
						this.checked = true;
					});
				} else {
					checkbox.each(function() {
						this.checked = false;
					});
				}
			});
			checkbox.click(function() {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
	<div class="table-responsive" style="margin: 0 0;">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-4">
						<h2>Administrar <b>Usuarios</b></h2>
					</div>
					<div class="col-sm-8">
						<!--			<input type="text" id="min" name="min" class="form-control" style="width: 250px; display: inline-block;">
					<span>Hasta</span>
                    <input type="text" id="max" class="form-control" style="width: 250px; display: inline-block;" name="max"> -->
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Usuario</span></a>
					</div>
				</div>
			</div>
			<table id="example" class="display nowrap" style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Rol</th>
						<th>Administrador</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include_once 'conexion.php';
					$sql_leer = 'select * from users ORDER BY id ASC;';
					$gsent = $pdo->prepare($sql_leer);
					$gsent->execute();
					$resultado = $gsent->fetchAll();
					foreach ($resultado as $dato) :
					?>
						<tr>
							<td><?= $dato['id']; ?></td>
							<td><?= $dato['Uss']; ?></td>
							<td><?= $dato['Pass']; ?></td>
							<td><?= $dato['rol']; ?></td>
							<td><?= $dato['admin']; ?></td>
							<td>
								<a style="color: yellow" href="#editEmployeeModal" onclick="mod('<?= $dato['id']; ?>', '<?= $dato['Uss']; ?>', '<?= $dato['Pass']; ?>', '<?= $dato['rol']; ?>', '<?= $dato['admin']; ?>')" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
								<a style="color: red;" href="#deleteEmployeeModal" onclick="del('<?= $dato['id']; ?>')" class="" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
							</td>
						<?php
					endforeach;
						?>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="ingresar" role="form">
					<div class="modal-header">
						<h4 class="modal-title">AGREGAR USUARIO</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>USUARIO</label>
							<input name="usuario" type="text" class="form-control" placeholder="User" required>
						</div>
						<div class="form-group">
							<label>CLAVE</label>
							<input name="clave" type="text" class="form-control" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label>ROL</label>
							<select name="rol" class="form-control" required>
								<option>TECNOLOGIA</option>
								<option>SEGURIDAD</option>
							</select>
						</div>
						<div class="form-group">
							<label>PERMISOS DE ADMINISTRADOR</label>
							<select name="estado" class="form-control" required>
								<option>No</option>
								<option>Si</option>
							</select>
						</div>
						<input name="inp_guardar" value="45" type="hidden">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" name="btn_guardar" id="btn_guardar" class="btn btn-success" value="Agregar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="editar">
					<div class="modal-header">
						<h4 class="modal-title">EDITAR USUARIO</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>USUARIO</label>
							<input id="usuarioE" name="usuario" type="text" class="form-control" required>
							<input id="idE" name="id" type="hidden" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CLAVE</label>
							<input id="claveE" name="clave" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ROL</label>
							<select id="rolE" name="rol" class="form-control" required>
								<option>TECNOLOGIA</option>
								<option>SEGURIDAD</option>
							</select>
						</div>
						<div class="form-group">
							<label>PERMISOS DE ADMINISTRADOR</label>
							<select id="estadoE" name="estado" class="form-control" required>
								<option>No</option>
								<option>Si</option>
							</select>
						</div>
						<input name="inp_editar" value="45" type="hidden">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input name="btn_editar" id="btn_editar" type="submit" class="btn btn-info" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="eliminar">
					<div class="modal-header">
						<h4 class="modal-title">ELIMINAR USUARIO</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input name="ide" type="hidden" id="lo">
						<input name="inp_eliminar" value="45" type="hidden">
						<p>ESTA SEGURO QUE QUIERE ELIMINAR?</p>
						<p class="text-warning"><small>Esta operacion no se podra rehacer.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" id="btn_eliminar" name="btn_eliminar" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
	<script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bulma.min.js"></script>
	<script src="../assets/plugins/SweetAlert/dist/sweetalert2.min.js"></script>
	<script src="../assets/plugins/SweetAlert/dist/sweetalert2.css"></script>
	<script src="./js/materialize.min.js"></script>
	<script>
		var minDate, maxDate;

		// Custom filtering function which will search data in column four between two values
		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
				var min = minDate.val();
				var max = maxDate.val();
				var date = new Date(data[4]);

				if (
					(min === null && max === null) ||
					(min === null && date <= max) ||
					(min <= date && max === null) ||
					(min <= date && date <= max)
				) {
					return true;
				}
				return false;
			}
		);

		$(document).ready(function() {
			// Create date inputs
			minDate = new DateTime($('#min'), {
				format: 'MMMM Do YYYY'
			});
			maxDate = new DateTime($('#max'), {
				format: 'MMMM Do YYYY'
			});

			// DataTables initialisation
			var table = $('#example').DataTable();

			// Refilter the table
			$('#min, #max').on('change', function() {
				table.draw();
			});
		});

		$(document).ready(function() {
			$("#ingresar").on('submit', function(e) {
				agregar_datos();
				e.preventDefault();
			});
		});
		$(document).ready(function() {
			$("#editar").on('submit', function(e) {
				modificar_datos();
				e.preventDefault();
			});
		});
		$(document).ready(function() {
			$("#eliminar").on('submit', function(e) {
				eliminar_datos();
				e.preventDefault();
			});
		});

		function agregar_datos() {
			var datos = $("#ingresar").serialize();
			$.ajax({
				method: "GET",
				url: "OP_USERS.php",
				data: datos,
				success: function(e) {
					Swal.fire({
						icon: 'success',
						title: 'Agregado con Exito',
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						location.reload();
					});
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Error, Algo Salio Mal' + errorThrown
					}).then(function() {
						location.reload();
					});
				}
			});
		}

		function modificar_datos() {
			var datos = $("#editar").serialize();
			$.ajax({
				method: "GET",
				url: "OP_USERS.php",
				data: datos,
				success: function(e) {
					Swal.fire({
						icon: 'success',
						title: 'Modificado con Exito',
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						location.reload();
					});
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Error, Algo Salio Mal' + errorThrown
					}).then(function() {
						location.reload();
					});
				}
			});
		}

		function eliminar_datos() {
			var datos = $("#eliminar").serialize();
			$.ajax({
				method: "GET",
				url: "OP_USERS.php",
				data: datos,
				success: function(e) {
					Swal.fire({
						icon: 'success',
						title: 'Eliminado con Exito',
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						location.reload();
					});
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Error, Algo Salio Mal' + errorThrown
					}).then(function() {
						location.reload();
					});
				}
			});
		}
	</script>
</body>

</html>