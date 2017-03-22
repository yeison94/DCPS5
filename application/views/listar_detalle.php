<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
	<script type="text/javascript">
		function confirma(){
			if (confirm("¿En serio desea eliminar el estudio?"))
			{ 
				alert("A Cristian le gusta eliminar estudios, se inteligente, no seas como Cristian."); 
			}
			else { 
				return false
			}
		}
	</script>
  </head>
  <body>
	<table>
		<tr>
			<th>TIPO DOC</th>
			<th>NUMERO DOC</th>
			<th>NOMBRE</th>
			<th>APELLIDO</th>
			<th>SEXO</th>
			<th>FECHA NACIM</th>
			<th>DIRECCION</th>
			<th>CIUDAD</th>
			<th>EMAIL</th>
			<th>TELEFONO</th>
			<th>NACIONALIDAD</th>
		</tr>

		<tr>
			<td><?= $persona->tipo_documento?></td>
			<td><?= $persona->numero_documento?></td>
			<td><?= $persona->nombre?></td>
			<td><?= $persona->apellido?></td>
			<td><?= $persona->sexo?></td>
			<td><?= $persona->fecha_nacimiento?></td>
			<td><?= $persona->direccion?></td>
			<td><?= $persona->ciudad?></td>
			<td><?= $persona->email?></td>
			<td><?= $persona->telefono?></td>
			<td><?= $persona->nacionalidad?></td>
		</tr>
	</table> </br>

	<table>
		<tr>
		<th>PREGRADO</th>
		</tr>
		<th>Profesión</th>					
		<th>Institución</th>
		<th>País</th>
		<th>Fecha Graduación</th>
		
			<?php  

			foreach ($estudios["pregrados"] as $pregrado) {
				echo "<tr>";
					echo "<td>" . $pregrado->profesion . "</td>";
					echo "<td>" . $pregrado->institucion . "</td>";
					echo "<td>" . $pregrado->pais . "</td>";
					echo "<td>" . $pregrado->fecha_graduacion . "</td>";
				echo "</tr>";
				}?>
		
	</table> </br>

	<table>
		<tr>
		<th>POSGRADO</th>
		</tr>
		<th>Area</th>
		<th>Nivel</th>
		<th>Institución</th>
		<th>País</th>
		<th>Fecha Graduación</th>
		
			<?php  

			foreach ($estudios["posgrados"] as $posgrado) {
				echo "<tr>";
					echo "<td>" . $posgrado->area . "</td>";
					echo "<td>" . $posgrado->nivel . "</td>";
					echo "<td>" . $posgrado->institucion . "</td>";					
					echo "<td>" . $posgrado->pais . "</td>";
					echo "<td>" . $posgrado->fecha_graduacion . "</td>";
				echo "</tr>";
				}?>
		
	</table>
  </body>
</html>
