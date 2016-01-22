<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">
<form>
<?php foreach ($empresa as $e):?>
<div class="ui warning form segment">
  <h5 class="ui header red center aligned">(*) Los campos con este signo, son obligatorios!</h5>
    <div class="three fields">
      <div class="field">
        <label>ID</label>
        <input class="requerido" value="<?php echo $e->idEmpresa ?>" data-tipo="texto" type="text" id="idEmpresa" disabled>
      </div>
      <div class="field required">
        <label>Nombre Empresa</label>
        <input class="requerido" value="<?php echo $e->nombreEmpresa ?>" data-tipo="texto" data-minimo="3" data-maximo="16" placeholder="Nombre" type="text" id="nombreEmpresa">
      </div>
      <div class="field">
        <label>Nit</label>
        <input placeholder="NIT" value="<?php echo $e->nit ?>" type="text" id="nit">
      </div>
    </div>
    <div class="field">
        <label>Direccion</label>
        <input placeholder="Direccion" value="<?php echo $e->direccionEmpresa ?>" type="text" id="direccion">
    </div>
    <div  id="mensajeEmpresa"></div><br>
  <div id="actualizarEmpresa" class="button ui green">Actualizar</div>
  <a  href="<?php echo base_url() ?>index.php/usuarioC/inicio">
    <div class="button ui red">Cancelar</div>
  </a>
</div>
  </form>
  <?php endforeach ?>
<?php if (!$empresa): ?>
  <tr class="positive">
    <td colspan="8" >No se encontraron empresas por el parametro de busqueda</td>
  </tr>
<?php endif ?>