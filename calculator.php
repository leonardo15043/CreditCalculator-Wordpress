<div class="wrap">

<h1>Configuración del Simulador</h1>
<form method="post">

  <table class="form-table">
    <tbody>
      <tr>
      <th scope="row"><label>Enganche</label></th>
      <td><input name="hitch" type="text" id="hitch_calculator" value="<?php echo ($hitch_calculator = get_option('hitch_value'))? $hitch_calculator : ''; ?>" ></td>
      </tr>
        <tr>
        <th scope="row"><label>Plazo - Valor </label></th>
          <tr>
          <td>3 - <br><input class="val_term" name="three_term" type="text" id="three_term" value="<?php echo ($three_term = get_option('three_term_value'))? $three_term : ''; ?>" ></td>
          </tr>
          <tr>
          <td>6 - <br><input class="val_term" name="six_term" type="text" id="six_term" value="<?php echo ($six_term = get_option('six_term_value'))? $six_term : ''; ?>" ></td>
          </tr>
          <tr>
          <td>9 - <br><input class="val_term" name="nine_term" type="text" id="nine_term" value="<?php echo ($nine_term = get_option('nine_term_value'))? $nine_term : ''; ?>" ></td>
          </tr>
          <tr>
          <td>12 - <br><input class="val_term" name="twelve_term" type="text" id="twelve_term" value="<?php echo ($twelve_term = get_option('twelve_term_value'))? $twelve_term : ''; ?>" ></td>
          </tr>
          <tr>
          <td>18 - <br><input class="val_term" name="eighteen_term" type="text" id="eighteen_term" value="<?php echo ($eighteen_term = get_option('eighteen_term_value'))? $eighteen_term : ''; ?>" ></td>
          </tr>
          <tr>
          <td>24 - <br><input class="val_term" name="twentyfour_term" type="text" id="twentyfour_term" value="<?php echo ($twentyfour_term = get_option('twentyfour_term_value'))? $twentyfour_term : ''; ?>" ></td>
          </tr>
          <tr>
          <td>36 - <br><input class="val_term" name="thirtysix_term" type="text" id="thirtysix_term" value="<?php echo ($thirtysix_term = get_option('thirtysix_term_value'))? $thirtysix_term : ''; ?>" ></td>
          </tr>
        </tr>
    </tbody>
  </table>

  <p class="submit">
    <input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar cambios">
  </p>

</form>

</div>
