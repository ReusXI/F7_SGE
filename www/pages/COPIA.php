<!doctype html>
<html class="no-js" lang="es">

<?php
session_start();
$sesionrol = $_SESSION['rol'];
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
    function mod(t_institucion, c_institucion, codigo_incidente, asunto, f_incidente, f_deteccion_incidente, descripcion_incidente,
        r_t_afectados, codigo_clasificacion_1, codigo_clasificacion_2, impacto_economico_estimado, daño_reputacional,
        afecto_procesos_criticos, tiempo_interrupcion, tiempo_resolucion_incidente, usuario, fecha_registro) {
        document.getElementById("t_institucion").value = t_institucion;
        document.getElementById("c_institucion").value = c_institucion;
        document.getElementById("c_incidente").value = codigo_incidente;
        document.getElementById("asunto").value = asunto;
        document.getElementById("f_incidente").value = f_incidente;
        document.getElementById("f_deteccion").value = f_deteccion_incidente;
        document.getElementById("descripcion").value = descripcion_incidente;
        document.getElementById("r_t_afectados").value = r_t_afectados;
        document.getElementById("c_clasificacion1").value = codigo_clasificacion_1;
        document.getElementById("c_clasificacion2").value = codigo_clasificacion_2;
        document.getElementById("economico").value = impacto_economico_estimado;
        document.getElementById("daño").value = daño_reputacional;
        document.getElementById("procesos").value = afecto_procesos_criticos;
        document.getElementById("t_interrupcion").value = tiempo_interrupcion;
        document.getElementById("t_resolucion").value = tiempo_resolucion_incidente;
        document.querySelector('#Label1').innerText = 'Registrado el: ' + fecha_registro + ' por el Usuario: ' + usuario;
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
                        <div class="col-sm-6" style="width: 400px;">
                            <h2>Administrar <b>Incidentes</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <form style="width: 600px; padding-right: 0px; display:inline-block">
                                <input type="date" class="form-control" name="fecha_inicio" style="width: 33%; display:inline-block;">
                                <span> Hasta </span>
                                <input type="date" name="fecha_fin" class="form-control" style="width: 33%; display:inline-block;">
                                <button type="button" class="btn btn-success" name="Todo" onclick="window.location = 'Eventos.php';" value="Todo">Todo</button>
                                <button class="btn btn-success" name="buscar" style="display: inline-block;" value="buscar">Buscar</button>

                            </form>
                            <!--    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                                -->
                        </div>
                        <a href="#addEmployeeModal" class="btn btn-success" style="margin-left: 50px;" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Incidente</span></a>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark">
                        <tr class="table-dark">
                            <th data-field="Tipo Institucion" data-editable="false">TI</th>
                            <th data-field="Codigo Institucion" data-editable="false">CI</th>
                            <th data-field="Fecha de Reporte de datos" data-editable="false">Fecha</th>
                            <th data-field="Codigo Incidente" data-editable="false">Codigo</th>
                            <th data-field="Asunto" data-editable="false">Asunto</th>
                            <th data-field="Fecha de Incidente" data-editable="false">Fecha Incidente</th>
                            <th data-field="Fecha de Deteccion" data-editable="false">Fecha Deteccion</th>
                            <th data-field="Descripcion" data-editable="false">Descripcion</th>
                            <th data-field="Recursos Tecnologicos Afectados" data-editable="false">Recursos Tecnologicos Afectados</th>
                            <th data-field="Codigo de Clasificacion(Nivel I)" data-editable="false">Clasificacion(Nivel I)</th>
                            <th data-field="Codigo de Clasificacion(Nivel II)" data-editable="false">Clasificacion(Nivel II)</th>
                            <th data-field="Impacto Economico Estimado" data-editable="false">Impacto Economico</th>
                            <th data-field="Daño Reputacional" data-editable="false">Daño</th>
                            <th data-field="Afectó Procesos Criticos" data-editable="false">Procesos Criticos</th>
                            <th data-field="Tiempo de Interrupcion" data-editable="false">Tiempo Interrupcion</th>
                            <th data-field="Tiempo de Resolucion del Incidente" data-editable="false">Tiempo de Resolucion</th>
                            <th data-field="Usuario">Usuario</th>
                            <th data-field="Fecha de Registro" data-editable="false">Fecha de Registro</th>
                            <th data-field="Accion" data-editable="false">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'conexion.php';
                        $sql_leer = "SELECT * FROM evento ORDER BY codigo_incidente DESC;";
                        if (isset($_GET['fecha_inicio']) == "AFASFAS") {
                            $sql_leer = "SELECT * FROM evento WHERE f_incidente BETWEEN '" . $_GET['fecha_inicio'] . "' AND '" . $_GET['fecha_fin'] . "' ORDER BY codigo_incidente DESC;";
                        }

                        $gsent = $pdo->prepare($sql_leer);
                        $gsent->execute();
                        $resultado = $gsent->fetchAll();
                        foreach ($resultado as $dato) :
                        ?>
                            <tr>
                                <td><?= $dato['t_institucion']; ?></td>
                                <td><?= $dato['c_institucion']; ?></td>
                                <td><?= date('Y-m-d') ?></td>
                                <td><?= $dato['codigo_incidente']; ?></td>
                                <td><?= $dato['asunto']; ?></td>
                                <td><?= $dato['f_incidente']; ?></td>
                                <td><?= $dato['f_deteccion_incidente']; ?></td>
                                <td><?= $dato['descripcion_incidente']; ?></td>
                                <td><?= $dato['r_t_afectados']; ?></td>
                                <td><?= $dato['codigo_clasificacion_1']; ?></td>
                                <td><?= $dato['codigo_clasificacion_2']; ?></td>
                                <td><?= $dato['impacto_economico_estimado']; ?></td>
                                <td><?= $dato['daño_reputacional']; ?></td>
                                <td><?= $dato['afecto_procesos_criticos']; ?></td>
                                <td><?= $dato['tiempo_interrupcion']; ?></td>
                                <td><?= $dato['tiempo_resolucion_incidente']; ?></td>
                                <td><?= $dato['usuario']; ?></td>
                                <td><?= $dato['fecha_registro']; ?></td>
                                <td><a href="#editEmployeeModal" onclick="mod('<?= $dato['t_institucion']; ?>', '<?= $dato['c_institucion']; ?>',
                                '<?= $dato['codigo_incidente']; ?>', '<?= $dato['asunto']; ?>','<?= $dato['f_incidente']; ?>',
                                '<?= $dato['f_deteccion_incidente']; ?>','<?= $dato['descripcion_incidente']; ?>',
                                '<?= $dato['r_t_afectados']; ?>','<?= $dato['codigo_clasificacion_1']; ?>','<?= $dato['codigo_clasificacion_2']; ?>',
                                '<?= $dato['impacto_economico_estimado']; ?>','<?= $dato['daño_reputacional']; ?>','<?= $dato['afecto_procesos_criticos']; ?>',
                                '<?= $dato['tiempo_interrupcion']; ?>','<?= $dato['tiempo_resolucion_incidente']; ?>','<?= $dato['usuario']; ?>', '<?= $dato['fecha_registro']; ?>')" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                    <!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="del('// $dato['codigo_incidente']; ?>')"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a> -->
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
                        <h4 class="modal-title">AGREGAR EVENTO</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tipo de Institucion</label>
                            <input maxlength="2" name="t_institucion" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Codigo de Institucion</label>
                            <input maxlength="2" name="c_institucion" type="text" class="form-control" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Codigo del Incidente</label>
                            <input name="c_incidente" type="text" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label>Asunto</label>
                            <textarea maxlength="100" name="asunto" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fecha del Incidente</label>
                            <input name="f_incidente" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Deteccion del Incidente</label>
                            <input name="f_deteccion" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripcion del Incidente</label>
                            <textarea cols="40" rows="10" maxlength="1000" name="descripcion" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Recursos Tecnologicos Afectados</label>
                            <textarea cols="40" rows="10" maxlength="1000" name="r_t_afectados" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Codigo de Clasificacion (Nivel I)</label>
                            <select name="c_clasificacion1" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM taxonomia1;";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['id'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Codigo de Clasificacion (Nivel II)</label>
                            <select name="c_clasificacion2" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM taxonomia2 WHERE usuario = '$sesionrol';";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['codigo'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Impacto Economico Estimado</label>
                            <input name="economico" type="number" maxlength="17" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Daño Reputacional</label>
                            <select name="dano" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM opciones;";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['id'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Afecto Procesos Criticos</label>
                            <select name="procesos" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM opciones;";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['id'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiempo de Interrupcion</label>
                            <input name="t_interrupcion" maxlength="17" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tiempo de Resolucion del Incidente</label>
                            <input maxlength="17" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="t_resolucion" type="number" class="form-control" required>
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
                        <h4 class="modal-title">EDITAR EVENTO</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <label id="Label1" style="padding-left: 5px;" name="Label1">AQUI VA LA FECHA DEL REGISTRO</label>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tipo de Institucion</label>
                            <input id="t_institucion" maxlength="2" name="t_institucion" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Codigo de Institucion</label>
                            <input id="c_institucion" maxlength="2" name="c_institucion" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Codigo del Incidente</label>
                            <input id="c_incidente" readonly="" maxlength="50" name="c_incidente" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Asunto</label>
                            <textarea id="asunto" maxlength="100" name="asunto" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fecha del Incidente</label>
                            <input id="f_incidente" name="f_incidente" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Deteccion del Incidente</label>
                            <input id="f_deteccion" name="f_deteccion" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripcion del Incidente</label>
                            <textarea id="descripcion" maxlength="1000" cols="40" rows="10" name="descripcion" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Recursos Tecnologicos Afectados</label>
                            <textarea cols="40" maxlength="1000" rows="10" id="r_t_afectados" name="r_t_afectados" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Codigo de Clasificacion (Nivel I)</label>
                            <select id="c_clasificacion1" name="c_clasificacion1" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM taxonomia1;";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['id'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Codigo de Clasificacion (Nivel II)</label>
                            <select id="c_clasificacion2" name="c_clasificacion2" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM taxonomia2 WHERE usuario = '$sesionrol';";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['codigo'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Impacto Economico Estimado</label>
                            <input name="economico" maxlength="17" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="economico" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Daño Reputacional</label>
                            <select name="dano" id="daño" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM opciones;";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['id'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Afecto Procesos Criticos</label>
                            <select name="procesos" id="procesos" class="form-control" required>
                                <?php
                                include_once 'conexion.php';
                                $sql_leer = "SELECT * FROM opciones;";
                                $gsent = $pdo->prepare($sql_leer);
                                $gsent->execute();
                                $resultado = $gsent->fetchAll();
                                foreach ($resultado as $dato) :
                                    echo "<option> " . $dato['id'] . " </option>";
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiempo de Interrupcion</label>
                            <input name="t_interrupcion" id="t_interrupcion" maxlength="17" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tiempo de Resolucion del Incidente</label>
                            <input name="t_resolucion" maxlength="17" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="t_resolucion" type="number" class="form-control" required>
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
    <!--  <div id="deleteEmployeeModal" class="modal fade">
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
                            -->

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
            url: "Operaciones.php",
            data: datos,
            success: function(e) {
                Swal.fire("EXITO!", "Se Registro el Incidente Exitosamente", "success").then(function() {
                    location.reload();
                });
            }
        });
    }

    function modificar_datos() {
        var datos = $("#editar").serialize();
        $.ajax({
            method: "GET",
            url: "Operaciones.php",
            data: datos,
            success: function(e) {
                Swal.fire("EXITO!", "Se Modifico el Incidente Exitosamente", "success").then(function() {
                    location.reload();
                });
            }
        });
    }

    function eliminar_datos() {
        var datos = $("#eliminar").serialize();
        $.ajax({
            method: "GET",
            url: "Operaciones.php",
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