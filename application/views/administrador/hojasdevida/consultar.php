<div class="ui grid">
  <div class="row">
    <div class="column two wide"></div>
    <div class="column twelve wide">

<div class="ui form segment teal">
  <div class="three fields">
    <div class="field">
        <input id="busqueda" type="text" placeholder="Documento/Cargo al que aspira">
    </div>
    <div class="field">
      <div class="ui selection dropdown" id="estado">
        <input type="hidden" name="gender">
        <div class="default text">Estado</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item active" data-value="3">Todos</div>
          <div class="item" data-value="1">Vinculado</div>
          <div class="item" data-value="2">Desvinculado</div>
        </div>
      </div>
    </div>
    <div class="field">
      <div  id="consultarH" class="ui teal labeled icon button">
        <i class="search icon"></i>
        Consultar
      </div>      
    </div>
  </div>
</div>
<table class="ui celled table" id="respuesta">
  <h4 class="ui dividing header">Informacion de Hojas de Vida</h4>

</table>

    <div class="column one wide"></div>
  </div>
</div>
