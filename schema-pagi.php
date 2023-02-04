<?php

/*
Plugin Name: Schematize Pagi
Plugin URI: http://schematize.com.br/
Description: A partir da paginação nativa dentro de posts do wordpress, você poderá adicionar botões para deixar sua paginação mais agradável e intuitiva.
Version: 1.0.0
Author: Schematize
Author URI: http://schematize.com.br/
*/

add_filter( 'wp_link_pages_args', 'wpse_next_page_link_text' );
function wpse_next_page_link_text( $args ) {
    $args['next_or_number'] = 'next';
	$args['previouspagelink'] = __( '<button class="pagi"> PÁGINA ANTERIOR ← </button>' );
    $args['nextpagelink'] = __( '<button class="pagi"> PRÓXIMA PÁGINA → </button>
' );
	echo '<style>
				.page-links-title {	
					display: none;
				}
				.pagi {
					margin-left: auto;
					margin-right: auto;
					display: flex;
  					justify-content: center;
                    border-radius: 20px;
				}
			</style>
	';
    return $args;
}
?>