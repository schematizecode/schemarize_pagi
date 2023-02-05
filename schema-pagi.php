<?php

/*
Plugin Name: Schematize Pagi
Plugin URI: http://schematize.com.br/
Description: A partir da paginação nativa dentro de posts do wordpress, você poderá adicionar botões para deixar sua paginação mais agradável e intuitiva.
Version: 1.0.1
Author: Schematize
Author URI: http://schematize.com.br/
*/
add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page() {
  add_menu_page(
    'Schematize Pagi',
    'Schematize Pagi',
    'manage_options',
    'custom-menu-page',
    'display_custom_menu_page',
    'dashicons-arrow-right-alt',
    6
  );
}

function display_custom_menu_page() {
  echo '<h1>Menu de personalização de botões</h1>';
  
  if ( isset( $_POST['save_text'])) {
    update_option( 'preenchimento', sanitize_text_field( $_POST['preenchimento'] ) );
  }
  $preenchimento = get_option( 'preenchimento' );
	
	  if ( isset( $_POST['save_text'])) {
    update_option( 'preenchimentoh', sanitize_text_field( $_POST['preenchimentoh'] ) );
  }
  $preenchimentoh = get_option( 'preenchimentoh' );
	
	if ( isset( $_POST['save_text'])) {
    update_option( 'textcolor', sanitize_text_field( $_POST['textcolor'] ) );
  }
  $textcolor = get_option( 'textcolor' );
	
	if ( isset( $_POST['save_text'])) {
    update_option( 'bgcolor', sanitize_text_field( $_POST['bgcolor'] ) );
  }
  $bgcolor = get_option( 'bgcolor' );
	
	if ( isset( $_POST['save_text'])) {
    update_option( 'bradius', sanitize_text_field( $_POST['bradius'] ) );
  }
  $bradius = get_option( 'bradius' );
	
	if ( isset( $_POST['save_text'])) {
    update_option( 'fonts', sanitize_text_field( $_POST['fonts'] ) );
  }
  $fonts = get_option( 'fonts' );
	//Bordas ainda não funcionam
	if (isset($_POST['save_text'])) {
  update_option('border_style', sanitize_text_field($_POST['border_style']));
}
	$border_style = get_option( 'border_style' );
	
if ( isset( $_POST['save_text'])) {
    update_option( 'txtnxt', sanitize_text_field( $_POST['txtnxt'] ) );
  }
  $txtnxt = get_option( 'txtnxt' );
	
if ( isset( $_POST['save_text'])) {
    update_option( 'prvtxt', sanitize_text_field( $_POST['prvtxt'] ) );
  }
  $prvtxt = get_option( 'prvtxt' );
	
	
	
	//SALVA O BOTÃO ESTILIZADO 
	if ( isset( $_POST['save_text'])) {
  update_option( 'button_style', sanitize_text_field( 'background-color: ' . $_POST['bgcolor'] . '; padding-left: ' . $_POST['preenchimento'] . 'px; padding-right: ' . $_POST['preenchimento'] . 'px; color: ' . $_POST['textcolor'] . '; padding-top: ' . $_POST['preenchimentoh'] . 'px; padding-bottom: ' . $_POST['preenchimentoh'] . 'px;'  . 'border-radius: ' . $_POST['bradius'] . 'px;' . 'font-size: ' . $_POST['fonts'] . 'px;') );
}
$button_style = get_option( 'button_style' );
	
  
  echo '<form action="" method="post">
  		<div class="contn">
		<label>Texto "Próxima Página": </label><input type="text" name="txtnxt" value="' . esc_attr($txtnxt) . '"><br>
		<label>Texto "Página Anterior": </label><input type="text" name="prvtxt" value="' . esc_attr($prvtxt) . '"><br>
  		<label>Preenchimento Lateral: </label><input type="number" name="preenchimento" value="' . esc_attr( $preenchimento ) . '" id="prl"><br>
		<label>Preenchimento Vertical: </label><input type="number" name="preenchimentoh" value="' . esc_attr( $preenchimentoh ) . '" id="prh"><br>
		<label>Arredondar bordas: </label><input type="number" name="bradius" value="' . esc_attr( $bradius ) . '" id="bradius"><br>
		<!-- <label>Tipo de borda: </label><select name="border_style">
 			 <option value="none">Sem borda</option>
 			 <option value="solid">Sólida</option>
  			 <option value="dashed">Pontilhada</option>
  			 <option value="dotted">Tracejada</option>
		</select><br> -->
		<label>Tamanho da fonte: </label><input type="number" name="fonts" value="' . esc_attr( $fonts ) . '" id="fonts"><br>
		<label>Cor do Texto: </label><input type="color" name="textcolor" value="' . esc_attr( $textcolor ) . '" id="txtcolor"><br>
		<label>Cor de Fundo: </label><input type="color" name="bgcolor" value="' . esc_attr( $bgcolor ) . '" id="bgcolor"><br>
		<input type="submit" name="save_text" value="Salvar" onclick="teste()">
		<hr>
		<input type="button" value="' . esc_attr( $txtnxt ) . '" style="' . esc_attr( $button_style ) . '" id="nxt2" name="nxt2" class="btback">
		</div>
		</form>';

	echo '
	<script>
	function teste() {
		var prl = document.getElementById("prl").value;
		var prh = document.getElementById("prh").value;
		var txtcolor = document.getElementById("txtcolor").value;
		var bgcolor = document.getElementById("bgcolor").value;
		var nxt = document.getElementById("nxt");
		var stylo = "padding-left: " + prl + "px";
		nxt.style.backgroundColor = bgcolor;
    }
</script>
	';
	echo '
	<style>
		.btback {
			border: none;
		}
		#nxt {
			border: none;
			margin: 0 auto;
		}
		label {
			 display: inline-block;
   			 width: 150px;
		}
		.contn {
			line-height: 40px;
		}
	</style>
	';
}
add_filter( 'wp_link_pages_args', 'wpse_next_page_link_text' );
function wpse_next_page_link_text( $args ) {
	$prvtxt_e = get_option( 'prvtxt' );
	$txtnxt_e = get_option( 'txtnxt' );
	$button_style = get_option( 'button_style' );
    $args['next_or_number'] = 'next';
	$args['previouspagelink'] = __( '<input type="button" value="' . esc_attr( $prvtxt_e ) . '" style="' . esc_attr( $button_style ) . '" class="btfront">' );
    $args['nextpagelink'] = __( '<input type="button" value="' . esc_attr( $txtnxt_e ) . '" style="' . esc_attr( $button_style ) . '" class="btfront">
' );
    return $args;
}
function custom_css() {
  echo '<style>
    .page-links-title {
		display: none;
	}
	.page-links {
			text-align: center;
		}
		.btfront {
			border: none;
		}
  </style>';
}
add_action( 'wp_head', 'custom_css' );
?>
