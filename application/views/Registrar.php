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
    <?= form_open("Welcome/registrar/true")?>
    <?= form_label('Tipo documento','')?>
    <?php
    $data = array('name'=> 'tipo_documento');
    echo form_input($data);?>
    <br>
    <?= form_label('Numero documento','')?>
    <?php
    $data = array('name'=> 'numero_documento');
    echo form_input($data);?>
    <br>
    <?= form_label('Nombre','')?>
    <?php
    $data = array('name'=> 'nombre');
    echo form_input($data);?>
    <br>
    <?= form_label('Apellido','')?>
    <?php
    $data = array('name'=> 'apellido');
    echo form_input($data);?>
    <br>
    <?= form_label('Sexo','')?>
    <?php
    $data = array('name'=> 'sexo');
    echo form_input($data);?>
    <br>
    <?= form_label('Fecha nacimiento','')?>
    <?php
    $data = array('name'=> 'fecha_nacimiento');
    echo form_input($data);?>
    <br>
    <?= form_label('Direccion','')?>
    <?php
    $data = array('name'=> 'direccion');
    echo form_input($data);?>
    <br>
    <?= form_label('Ciudad','')?>
    <?php
    $data = array('name'=> 'ciudad');
    echo form_input($data);?>
    <br>
    <?= form_label('Email','')?>
    <?php
    $data = array('name'=> 'email');
    echo form_input($data);?>
    <br>
    <?= form_label('Telefono','')?>
    <?php
    $data = array('name'=> 'telefono');
    echo form_input($data);?>
    <br>
    <?= form_label('Nacionalidad','')?>
    <?php
    $data = array('name'=> 'nacionalidad');
    echo form_input($data);?>
   <br>
   <br>
    <?= form_submit("registrar","Registrar"); ?><br>
   <?= form_close()?>
  </body>
</html>
