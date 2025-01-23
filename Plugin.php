<?php
/**
 * Plugin Name:     Client Customization
 * Plugin URI:      https://www.yogh.com.br/
 * Description:     Plugin with project customization for displaying additional content.
 * Author:          Yogh Soluções
 * Author URI:      https://www.yogh.com.br/
 * Text Domain:     client-customization
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Client_Customization
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Access not allowed.' );
}

/**
* Carregue o domínio de texto do plugin para traduções.
 */
function client_customization_load_textdomain() {
    load_plugin_textdomain( 'client-customization', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'client_customization_load_textdomain' );

/**
* Anexe uma mensagem personalizada ao conteúdo.
 *
 * @param string $content O conteúdo original.
 * @return string O conteúdo com a mensagem anexada.
 */
function client_customization_append_message( $content ) {
  // Compõe a mensagem com suporte de tradução.
    $message = sprintf(
        '<p><b>%s: %s (%s)</b></p>',
        __( 'This content is created by', 'client-customization' ),
        get_bloginfo( 'name' ),
        get_bloginfo( 'url' )
    );

    return $content . $message;
}
add_filter( 'the_content', 'client_customization_message', 10 );
