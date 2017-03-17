<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	 <?= validation_errors(); ?>
    <?= form_open("Personas/agregar_pregrado/".$cedula."/agregar")?>


    <label for="institucion">Institución</label>
    <input type="input" name="institucion" /><br />

    <label for="pais">País</label>
    <input type="input" name="pais" /><br />
    
    <label for="fecha_graduacion">Fecha graduación</label>
    <input type="input" name="fecha_graduacion" /><br />

    <label for="profesion">Profesion</label>
    <input type="input" name="profesion" /><br />

   <input type="submit" name="registrar" value="Añadir pregrado" />

  <?= form_close()?>
	</body>
</html>
