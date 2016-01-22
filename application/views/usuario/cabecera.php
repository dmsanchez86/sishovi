<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sishovi</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>publico/semantic.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>publico/css/master.css">
</head>
<div class="ui inverted teal menu">
<a href="<?php echo base_url() ?>index.php" class="active green item">
    <i class="home icon"></i> Sishovi
  </a>
  <a class="item">
   <i class="user icon"></i> Bienvenido/a <?php echo $this->session->userdata("nombre") ?>
  </a>
  <a href="<?php echo base_url() ?>index.php/usuarioC/menu/clave" class="item">
    <i class="settings icon"></i> 
    Configuracion
  </a>
  <a href="<?php echo base_url() ?>index.php/usuarioC/salir" class="item">
    <i class="external share icon"></i> 
    Cerrar Sesion
  </a>
</div>
<body>