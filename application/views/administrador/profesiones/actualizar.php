<div class="grid ui">
  <div class="row">
    <div class="column two wide"></div>
    <div class="column twelve wide">
<form>
<?php foreach ($profesion as $p): ?>
  <div class="ui warning form segment">
    <div class="field">
        <label>ID</label>
        <input class="text" id="idProfesion" value="<?php echo $p->idProfesion ?>" disabled>
    </div>
    <div class="field required">
        <label>Nombre Profesion</label>
        <input class="requerido" type="text" data-tipo="texto" data-minimo="5" data-maximo="30" 
        id="nombreProfesion" value="<?php echo $p->nombreProfesion ?>"> 
    </div>
    <div  id="mensajeProfesion"></div><br>
    <div  id="actualizarProfesion" class="button ui green">Actualizar</div>
      <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
        <div class="button ui red">Cancelar</div>
      </a>
  </div>
</form>
<?php endforeach ?>
<?php if (!$profesion): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron profesiones por el parametro de busqueda</td>
  </tr>
<?php endif ?>