<div class="ui grid">
  <div class="row">
    <div class="column three wide"></div>
    <div class="column ten wide">

<div class="ui form segment teal">
  <div class="three fields">
    <div class="field">
        <input id="busqueda" type="text" placeholder="nombre / documento">
    </div>
    <div class="field">
      
      <div class="ui selection dropdown">
        <input type="hidden" name="gender">
        <div class="default text">Estado</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item active" data-value="3">Todos</div>
          <div class="item" data-value="1">Activo</div>
          <div class="item" data-value="2">Inactivo</div>
        </div>
      </div>

    </div>
    <div class="field">
      <div  id="consultarPer" class="ui teal labeled icon button">
        <i class="right arrow icon"></i>
        Consultar
      </div>      
    </div>
  </div>
</div>
<table class="ui celled table">
  <h4 class="ui dividing header">Informacion Personas</h4>
  <thead>
    <tr>
      <th>Tipo Documento</th>
      <th>Documento</th>
      <th>Nombre Completo</th>
      <th>Primer Apellido</th>
      <th>Segundo Apellido</th>
      <th>Tipo de Sangre</th>
      <th>Genero</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody id="respuesta">

  </tbody>
</table>

    <div class="column two wide"></div>
  </div>
</div>