<?php
/**
 * Plugin Name: WordPress Email TLD Checker
 * Plugin URI: https://github.com/boxuk/wordpress-email-tld-checker
 * Description: A small WordPress plugin to validate email addresses against valid TLDs.
 * Version:     0.1.0
 * Author:      Box UK
 * Author URI:  https://boxuk.com
 * License: MIT
 *
 * @package BoxUk\Plugins\WordPress_Email_Tld_Checker
 */

declare( strict_types=1 );

namespace BoxUk\Plugins\WordPress_Email_Tld_Checker;

// Include composer autoloader from this plugin dir if it exists, otherwise assume the autoloader is already included.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

require_once __DIR__ . '/functions.php';

add_filter( 'is_email', __NAMESPACE__ . '\\email_ends_with_tld', 10, 3 );
