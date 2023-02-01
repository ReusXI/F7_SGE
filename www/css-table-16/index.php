<!doctype html>
<html lang="en">

<?php
if (!function_exists('getShortedString')) {
  function getShortedString($text, $length = null)
  {
    $formatedString = ucwords($text);

    if ($length != null) {
      if (strlen($formatedString) <= $length) {
        return $formatedString;
      } else {
        $y = substr($formatedString, 0, $length) . '...';
        return $y;
      }
    } else {
      return $formatedString;
    }
  }
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Table #6</title>
</head>

<body>


  <div class="content">
    <div class="">
      <h2 class="">Table #6</h2>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">Codigo Incidente</th>
              <th scope="col">Asunto</th>
              <th scope="col">Fecha Incidente</th>
              <th scope="col">Fecha Deteccion</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Recursos Tecnologicos Afectados</th>
              <th scope="col">Clasificacion (Nivel I)</th>
              <th scope="col">Clasificacion (Nivel II)</th>
              <th scope="col">Impacto Economico Estimado</th>
              <th scope="col">Daño Reputacional</th>
              <th scope="col">Afectó Procesos Criticos</th>
              <th scope="col">Tiempo Interrupcion</th>
              <th scope="col">Tiempo Resolucion Incidente Hrs</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody><?php
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
              <tr scope="row" class="col-md-auto">
                <td><?= $dato['codigo_incidente']; ?></td>
                <td><?= $dato['asunto']; ?></td>
                <td><?= $dato['f_incidente']; ?></td>
                <td><?= $dato['f_deteccion_incidente']; ?></td>
                <td><?= getShortedString($dato['descripcion_incidente'], 50); ?></td>
                <td><?= getShortedString($dato['r_t_afectados'], 50); ?></td>
                <td><?= $dato['codigo_clasificacion_1']; ?></td>
                <td><?= $dato['codigo_clasificacion_2']; ?></td>
                <td><?= $dato['impacto_economico_estimado']; ?></td>
                <td><?= $dato['daño_reputacional']; ?></td>
                <td><?= $dato['afecto_procesos_criticos']; ?></td>
                <td><?= $dato['tiempo_interrupcion']; ?></td>
                <td><?= $dato['tiempo_resolucion_incidente']; ?></td>
                <td><a href="#editEmployeeModal" onclick="mod('<?= $dato['t_institucion']; ?>', '<?= $dato['c_institucion']; ?>',
                                '<?= $dato['codigo_incidente']; ?>', '<?= $dato['asunto']; ?>','<?= $dato['f_incidente']; ?>',
                                '<?= $dato['f_deteccion_incidente']; ?>','<?= $dato['descripcion_incidente']; ?>',
                                '<?= $dato['r_t_afectados']; ?>','<?= $dato['codigo_clasificacion_1']; ?>','<?= $dato['codigo_clasificacion_2']; ?>',
                                '<?= $dato['impacto_economico_estimado']; ?>','<?= $dato['daño_reputacional']; ?>','<?= $dato['afecto_procesos_criticos']; ?>',
                                '<?= $dato['tiempo_interrupcion']; ?>','<?= $dato['tiempo_resolucion_incidente']; ?>','<?= $dato['usuario']; ?>', '<?= $dato['fecha_registro']; ?>')" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">DETALLES</i></a>
                  <!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="del('// $dato['codigo_incidente']; ?>')"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a> -->
                </td>
              </tr>
            <?php endforeach
            ?>
          </tbody>
        </table>
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


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
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

</html>