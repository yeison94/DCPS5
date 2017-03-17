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
			if (confirm("¿Enserio desea eliminar el estudio?"))
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
					<th>
						TIPO DOC
					</th>
					<th>
						NUMERO DOC
					</th>
					<th>
						NOMBRE
					</th>
					<th>
						APELLIDO
					</th>
					<th>
						SEXO
					</th>
					<th>
						FECHA NACIM
					</th>
					<th>
						DIRECCION
					</th>
					<th>
						CIUDAD
					</th>
					<th>
						EMAIL
					</th>
					<th>
						TELEFONO
					</th>
					<th>
						NACIONALIDAD
					</th>
					<th>
						ESTUDIOS
					</th>
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
			 <td>
			 <table>
				 <tr>
				 <th>PREGRADO</th>
				 <th>POSGRADO</th>
				 </tr>
				 <tr>
				 <td><?php  
				 foreach ($estudios['pregrados'] as $estudio) {
					 settype($estudio, 'array');
					 echo "<ul>";
					 foreach ($estudio as $key => $value) {
						 if($key == "profesion"){?>
						 <li><?=$value?></li>
						 <a onclick="if(confirma() == false) return false" href="<?=base_url()?>/index.php/personas">Eliminar</a>
						<?php }
					 }
					 echo "</ul>";
				 }
				 
				 ?></td>
				 <td>
				 <?php  
				 foreach ($estudios['posgrados'] as $estudio) {
					 settype($estudio, 'array');
					 echo "<ul>";
					 foreach ($estudio as $key => $value) {
						 if($key == "area"){
								echo"<li>$value</li>";
						 }
					 }
					 echo "</ul>";
				 }
				 
				 ?>
				 </td>
				 </tr>
			 </table>
			 </td>
			 </tr>
	</table>
  </body>
</html>
