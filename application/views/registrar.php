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
    <?= form_open("Personas/registrar/true")?>


    <label for="tipo_documento">Tipo documento</label>
    <input type="input" name="tipo_documento" /><br />

    <label for="numero_documento">Numero documento</label>
    <input type="input" name="numero_documento" /><br />
    
    <label for="nombre">Nombre</label>
    <input type="input" name="nombre" /><br />

    <label for="apellido">Apellido</label>
    <input type="input" name="apellido" /><br />

    <label for="sexo">Sexo</label>
    <input type="input" name="sexo" /><br />

    <label for="fecha_nacimiento">Fecha nacimiento</label>
    <input type="input" name="fecha_nacimiento" /><br />

    <label for="direccion">Direccion</label>
    <input type="input" name="direccion" /><br />

    <label for="ciudad">Ciudad</label>
    <input type="input" name="ciudad" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <label for="telefono">Telefono</label>
    <input type="input" name="telefono" /><br />

    <label for="nacionalidad">Nacionalidad</label>
    <input type="input" name="nacionalidad" /><br />

   <input type="submit" name="registrar" value="Registrar" />

  <?= form_close()?>

  </body>
</html>
