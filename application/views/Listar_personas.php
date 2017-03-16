<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <?= form_open("Welcome/opciones")?>
    <table>
      <tr>
        <th>
          TIPO DOCUMENTO
        </th>
        <th>
          NUMERO DOCUMENTO
        </th>
        <th>
          NOMBRE
        </th>
        <th>
          APELLIDO
        </th>
        <th>
          EMAIL
        </th>
        <th>
          TELEFONO
        </th>
        <th>
          OPCIONES
        </th>
        <?php //print_r($res->tipo_documento);
        for ($i=0; $i < $cantidad ; $i++) {

          $nueva = ${"persona".($i+1)} ;?>
          <tr><td><?= $nueva->tipo_documento?></td>
          <td><?= $nueva->numero_documento?></td>
          <td><?= $nueva->nombre ?></td>
          <td><?= $nueva->apellido?></td>
          <td><?=$nueva->email?></td>
          <td><?=$nueva->telefono?></td>
          <td>
            <a href="<?php echo site_url("personas/listar_detalle/") .$nueva->numero_documento?>">
            <button type="button" name="button">Ver detalle</button>
            </a>
            <a href="<?php echo site_url("personas/agregar_pregrado/").$nueva->numero_documento?>">
            <button type="button" name="button">Añadir pregrado</button>
            </a>
            <a href="<?php echo "http://localhost/DCPS5/index.php/Welcome/listar_detalle/".$nueva->numero_documento?>">
            <button type="button" name="button">Añadir posgrado</button>
            </a>
        </td><tr>
        <?php  } ?>
          </tr>
    </table>
      <?= form_close()?>
  </body>
</html>
