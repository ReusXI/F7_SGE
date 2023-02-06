<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ROPSSCI".Date("Ymd").".xls");

if(isset($_REQUEST['opciones']) == 1){
?>

<table class="table table-striped table-hover" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead class="table-dark">
                        <tr class="table-dark" s>
                            <th data-field="ID">ID</th>
                            <th data-field="Usuario" data-editable="false">Usuario</th>
                            <th data-field="Contraseña" data-editable="false">Contraseña</th>
                            <th data-field="Rol" data-editable="false">Rol</th>
                            <th data-field="Estado" data-editable="false">Estado</th>
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
                                <td><?= $dato['Estado']; ?></td>
                                <td><a href="#editEmployeeModal" onclick="mod('<?= $dato['id']; ?>', '<?= $dato['Uss']; ?>', '<?= $dato['Pass']; ?>', '<?= $dato['rol']; ?>', '<?= $dato['Estado']; ?>')" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="del('<?= $dato['id']; ?>')"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>