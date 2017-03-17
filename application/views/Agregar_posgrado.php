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
    <?= form_open("Personas/agregar_posgrado/".$cedula."/agregar")?>


    <label for="institucion">Institución</label>
    <input type="input" name="institucion" /><br/>

    <label for="pais">País</label>
    <input type="input" name="pais" /><br/>
    
    <label for="fecha_graduacion">Fecha de Graduación</label>
    <input type="input" name="fecha_graduacion" /><br />

    <label for="area">Área</label>
    <input type="input" name="area" /><br/>

    <label for="nivel">Nivel</label>
    <input type="input" name="nivel" /><br/>

   <input type="submit" name="registrar" value="Añadir posgrado" />

  <?= form_close()?>
	</body>
</html>
