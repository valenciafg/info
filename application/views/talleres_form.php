<form class="form-horizontal">
  <div class="form-group">
    <label for="select_estado" class="col-md-4 control-label">Estado</label>
    <div class="col-md-5">
      <select class="form-control select_estado" id="select_estado">          
          <?php
          foreach ($estados as $estado) {
            echo "<option value=\"".$estado['CODESTADO']."\">".$estado['DESCESTADO']."</option>";
          }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="select_ciudad" class="col-md-4 control-label">Cuidad</label>
    <div class="col-md-5">
      <select class="form-control select_ciudad" id="select_ciudad">
          <option>--Seleccionev--</option>          
      </select>
    </div>
  </div>
  
  <!--<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>-->
</form>