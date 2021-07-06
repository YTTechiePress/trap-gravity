<?php
/**
 * Plugin Name: Trap Gravity Forms
 * Plugin URI: https://github.com/yttechiepress/trap-gravity
 * Author: TechiePress
 * Author URI: https://github.com/yttechiepress/trap-gravity
 * Description: Collect Gravity forms to Webhook
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: trap-gravity
*/

defined( 'ABSPATH' ) or die( 'No entry' );

add_action( 'gform_after_submission_2', 'techiepress_after_submission', 10, 2 );

function techiepress_after_submission( $entry, $form ) {

    // error_log( print_r( $entry, true ) );

    if ( $entry['form_id'] == 2 ) {

        $info = [
            'name'   => $entry[1],
            'number' => $entry[3],
            'email'  => $entry[2],
        ];

        $url = 'https://hook.integromat.com/g7oli6aslhs210jmbt8hpyibb9dsndh4';

        $args = [
            'method' => 'POST',
            'body'   => $info,
        ];

        wp_remote_post( $url, $args );

    }

}