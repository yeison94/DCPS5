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
    <?= validation_errors(); ?>

    <?php $estudio_id = $estudio['id']; ?>

    <?= form_open("estudios/modificar/"."$estudio_id"."/true")?>


    <label for="institucion">Institución</label>
    <input type="input" name="institucion" value="<?php echo $estudio['institucion'];?>" /><br />
    
    <label for="pais">País</label>
    <input type="input" name="pais" value="<?php echo $estudio['pais'];?>" /><br />

    <label for="fecha_graduacion">Fecha Graduación</label>
    <input type="input" name="fecha_graduacion" value="<?php echo $estudio['fecha_graduacion'];?>" /><br />

   <input type="submit" name="modificar" value="Modificar" />

  <?= form_close()?>

  </body>
</html>
