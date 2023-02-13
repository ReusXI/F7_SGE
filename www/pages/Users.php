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
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administracion en tabla</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="/www/table/css/bootstrap.min.css">
    <link rel="stylesheet" href="/www/table/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- SWEET ALERT-->
    <link rel="stylesheet" href="../assets/plugins/SweetAlert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/plugins/SweetAlert/dist/sweetalert2.css">
</head>

<style>
    body {
        color: #566787;
        background: #fff;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
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

    .table-danger,
    .table-danger>th,
    .table-danger>td {
        background-color: #f5c6cb;
    }

    .table-danger th,
    .table-danger td,
    .table-danger thead th,
    .table-danger tbody+tbody {
        border-color: #ed969e;
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
        background-color: #f1b0b7;
    }

    .table-success,
    .table-success>th,
    .table-success>td {
        background-color: #c3e6cb;
    }

    .table-success th,
    .table-success td,
    .table-success thead th,
    .table-success tbody+tbody {
        border-color: #8fd19e;
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb;
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
        background-color: #b1dfbb;
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
        max-width: 400px;
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

    .table-dark,
    .table-dark>th,
    .table-dark>td {
        background-color: #c6c8ca;
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

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Administrar <b>Usuarios</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Usuario</span></a>
                            <!--    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                                -->
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark">
                        <tr class="table-dark" s>
                            <th data-field="ID">ID</th>
                            <th data-field="Usuario" data-editable="false">Usuario</th>
                            <th data-field="Contraseña" data-editable="false">Contraseña</th>
                            <th data-field="Rol" data-editable="false">Rol</th>
                            <th data-field="Estado" data-editable="false">Administrador</th>
                            <th data-field="Accion" data-editable="false">Accion</th>
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
                                <td><a href="#editEmployeeModal" onclick="mod('<?= $dato['id']; ?>', '<?= $dato['Uss']; ?>', '<?= $dato['Pass']; ?>', '<?= $dato['rol']; ?>', '<?= $dato['admin']; ?>')" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="del('<?= $dato['id']; ?>')"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Agregar Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="ingresar">
                    <div class="modal-header">
                        <h4 class="modal-title">AGREGAR USUARIO</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>USUARIO</label>
                            <input name="usuario" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>CLAVE</label>
                            <input name="clave" type="text" class="form-control" required>
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


    <!-- jquery
                    ============================================ -->
    <script src="/www/table/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
                    ============================================ -->
    <script src="/www/table/js/bootstrap.min.js">
        function selectedRow() {
            var index, table = document.getElementById("table");

            for (var i = 0; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    index = this.rowIndex;
                    this.classList.toggle("table-success");
                    console.log(index);
                }
            }
        }
    </script>

    <!-- data table JS
                    ============================================ -->
    <script src="/www/table/js/data-table/bootstrap-table.js"></script>
    <script src="/www/table/js/modal.js"></script>
    <script src="/www/table/js/data-table/tableExport.js"></script>
    <script src="/www/table/js/data-table/data-table-active.js"></script>
    <script src="/www/table/js/data-table/bootstrap-table-editable.js"></script>
    <script src="/www/table/js/data-table/bootstrap-editable.js"></script>
    <script src="/www/table/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="/www/table/js/data-table/colResizable-1.5.source.js"></script>
    <script src="/www/table/js/data-table/bootstrap-table-export.js"></script>

    <!-- tab JS
                    ============================================ -->
    <script src="/www//table/js/tab.js"></script>
    <script src="../assets/plugins/SweetAlert/dist/sweetalert2.min.js"></script>
    <script src="../assets/plugins/SweetAlert/dist/sweetalert2.css"></script>
    <script src="../table/js/jquery-3.6.0.min.js"></script>
    <script src="../table/js/materialize.min.js"></script>

</body>

<script>
    $(document).ready(function() {
        $("#btn_guardar").on('click', function(e) {
            agregar_datos();
            e.preventDefault();
        });
    });
    $(document).ready(function() {
        $("#btn_editar").on('click', function(e) {
            modificar_datos();
            e.preventDefault();
        });
    });
    $(document).ready(function() {
        $("#btn_eliminar").on('click', function(e) {
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
                Swal.fire("EXITO!", "Registro Exitoso", "success").then(function() {
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
                Swal.fire("EXITO!", "Registro Exitoso", "success").then(function() {
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
                Swal.fire("EXITO!", "Registro Exitoso", "success").then(function() {
                    location.reload();
                });
            }
        });
    }
</script>

</html>