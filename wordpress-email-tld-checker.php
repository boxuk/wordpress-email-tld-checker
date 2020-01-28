<?php
/**
 * @package BoxUk\Plugins\WordPress_Email_Tld_Checker
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Email TLD Checker
 * Plugin URI:  https://github.com/boxuk/wordpress-email-tld-checker
 * Description: A small WordPress plugin to validate email addresses against valid TLDs.
 * Version:     0.1.0
 * Author:      Box UK
 * Author URI:  https://boxuk.com
 * License:     MIT
 */

declare( strict_types=1 );

namespace BoxUk\Plugins\WordPress_Email_Tld_Checker;

// Include composer autoloader from this plugin dir if it exists, otherwise assume the autoloader is already included.
if ( \file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! \function_exists( 'BoxUk\Plugins\WordPress_Email_Tld_Checker\email_ends_with_tld' ) ) {
	throw new \RuntimeException( 'WordPress Email TLD Checker not installed! Please install with Composer and ensure you are using the autoloader.' );
}

\add_filter( 'is_email', __NAMESPACE__ . '\\email_ends_with_tld', 10, 3 );
