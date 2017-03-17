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

    <?php $documento = $persona['numero_documento']; ?>

    <?= form_open("Personas/modificar/"."$documento"."/true")?>

    <label for="tipo_documento">Tipo documento</label>
    <input type="input" name="tipo_documento" value="<?php echo $persona['tipo_documento'];?>" /><br />

    <label for="numero_documento">Numero documento</label>
    <input type="input" name="numero_documento" value="<?php echo $persona['numero_documento'];?>" /><br />
    
    <label for="nombre">Nombre</label>
    <input type="input" name="nombre" value="<?php echo $persona['nombre'];?>" /><br />

    <label for="apellido">Apellido</label>
    <input type="input" name="apellido" value="<?php echo $persona['apellido'];?>" /><br />

    <label for="sexo">Sexo</label>
    <input type="input" name="sexo" value="<?php echo $persona['sexo'];?>" /><br />

    <label for="fecha_nacimiento">Fecha nacimiento</label>
    <input type="input" name="fecha_nacimiento" value="<?php echo $persona['fecha_nacimiento'];?>" /><br />

    <label for="direccion">Direccion</label>
    <input type="input" name="direccion" value="<?php echo $persona['direccion'];?>" /><br />

    <label for="ciudad">Ciudad</label>
    <input type="input" name="ciudad" value="<?php echo $persona['ciudad'];?>" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" value="<?php echo $persona['email'];?>" /><br />

    <label for="telefono">Telefono</label>
    <input type="input" name="telefono" value="<?php echo $persona['telefono'];?>" /><br />

    <label for="nacionalidad">Nacionalidad</label>
    <input type="input" name="nacionalidad" value="<?php echo $persona['nacionalidad'];?>" /><br />

   <input type="submit" name="modificar" value="Modificar" />

  <?= form_close()?>

  </body>
</html>
