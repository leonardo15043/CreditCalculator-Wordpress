<?php
/*
Plugin Name: Simulador
Description: Cotizador de comercio
Author: leonardo15043
*/

add_action("admin_menu", "menu_admin");
function menu_admin() {
  add_menu_page('Configuración Simulador', 'Configuración Simulador', 'manage_options', 'menu_config_calculator', 'controller_calculator');
}

function controller_calculator() {

  wp_enqueue_script('controller_calculator', plugins_url('/js/calculate.js',__FILE__ ));
  wp_enqueue_script('controller_calculator');

	if($_POST) {

    $price = update_option('hitch_value', $_POST['hitch'] );
    $three_term = update_option('three_term_value', $_POST['three_term'] );
    $six_term = update_option('six_term_value', $_POST['six_term'] );
    $nine_term = update_option('nine_term_value', $_POST['nine_term'] );
    $twelve_term = update_option('twelve_term_value', $_POST['twelve_term'] );
    $eighteen_term = update_option('eighteen_term_value', $_POST['eighteen_term'] );
    $twentyfour_term = update_option('twentyfour_term_value', $_POST['twentyfour_term'] );
    $thirtysix_term = update_option('thirtysix_term_value', $_POST['thirtysix_term'] );

    if($price || $three_term  || $six_term || $nine_term  || $twelve_term  || $eighteen_term  || $twentyfour_term  || $thirtysix_term){
      echo '<div class="updated notice"><p>Datos guardados correctamente</p></div>';
    }else{
      echo '<div class="error notice"><p>No se guardo ningun dato</p></div>';
    }

	}

  include('calculator.php');
}

add_action('loop_start', 'addCalculator');

function addCalculator() {

  wp_register_style('addCalculator', plugins_url('/css/style.css',__FILE__ ));
  wp_enqueue_script('addCalculator', plugins_url('/js/calculate.js',__FILE__ ));
  wp_localize_script('addCalculator','cms_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
  wp_enqueue_style('addCalculator');
  wp_enqueue_script('addCalculator');

    $content = "";
    $content .= "<div id='cont-calculator'>";

      $imgLogo = plugins_url('/img/logo.png',__FILE__ );
      $content .= "<div class='caj-head'><img src='".$imgLogo."'></div>";

      $content .= "<div class='caj-box'>";
        $content .= "<table>";
        $content .= "<tr><th colspan='2'>COTIZADOR COMERCIO AFILIADO</td></tr>";
        $content .= "<tr class='th-tit'>";
        $content .= "<td>RESUMEN DE COMPRA</td><td></td>";
        $content .= "</tr>";
        $content .= "<tr>";
        $content .= "<td>Precio</td><td> <input type='text' id='price' name='price' autocomplete='off'></td>";
        $content .= "</tr>";
        $content .= "<tr>";
        $content .= "<td>Plazo</td><td>";
          $content .= "<select name='num_term' id='num_term'>";
            $content .= "<option value=''>Seleccionar Plazo</option>";
            $content .= "<option value='3'>3</option>";
            $content .= "<option value='6'>6</option>";
            $content .= "<option value='9'>9</option>";
            $content .= "<option value='12'>12</option>";
            $content .= "<option value='18'>18</option>";
            $content .= "<option value='24'>24</option>";
            $content .= "<option value='36'>36</option>";
          $content .= "</select>";
        $content .= "</td>";
        $content .= "</tr>";
        $content .= "<tr>";
        $content .= "<td>Enganche</td><td id='num_hitch'> ".get_option('hitch_value')." </td>";
        $content .= "</tr>";
        $content .= "<tr>";
        $content .= "<td>Saldo a Financiar</td><td id='num_balance'>0</td>";
        $content .= "</tr>";
        $content .= "<tr class='cshare'>";
        $content .= "<td>VALOR CUOTA </td><td id='share_value'>0</td>";
        $content .= "</tr>";
        $content .= "<tr class='cpay'>";
        $content .= "<td>VALOR PAGARE</td><td id='pay_value'> 0 </td>";
        $content .= "</tr>";
        $content .= "</table>";
      $content .= "</div>";

      $imgFoot = plugins_url('/img/foot.png',__FILE__ );
      $content .= "<div class='caj-foot'><img src='".$imgFoot."'></div>";

    $content .= "</div>";

    echo  $content;

}

add_action('wp_ajax_nopriv_ajax_calculator','submit_fee');
add_action('wp_ajax_ajax_calculator','submit_fee');

function submit_fee()
{

    switch ($_POST['term']) {
      case 3:
        $term_value = get_option('three_term_value');
          break;
      case 6:
        $term_value = get_option('six_term_value');
          break;
      case 9:
        $term_value = get_option('nine_term_value');
          break;
      case 12:
        $term_value = get_option('twelve_term_value');
          break;
      case 18:
        $term_value = get_option('eighteen_term_value');
          break;
      case 24:
        $term_value = get_option('twentyfour_term_value');
          break;
      case 36:
        $term_value = get_option('thirtysix_term_value');
          break;

        }

        echo $term_value ;

	wp_die();
}
