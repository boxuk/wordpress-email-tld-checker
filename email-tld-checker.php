<?php
/**
 * Plugin Name: WordPress Email TLD Checker
 * Plugin URI:  https://github.com/boxuk/wordpress-email-tld-checker
 * Description: A small WordPress plugin to validate email addresses against valid TLDs.
 * Version:     0.1.1
 * Author:      Box UK
 * Author URI:  https://boxuk.com
 * License:     MIT
 * 
 * @wordpress-plugin
 * @package BoxUk\Plugins\WordPress_Email_Tld_Checker
 */

declare( strict_types=1 );

namespace BoxUk\Plugins\WordPress_Email_Tld_Checker;

use Arubacao\TldChecker\Validator;

// Include composer autoloader from this plugin dir if it exists, otherwise assume the autoloader is already included.
if ( \file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! \function_exists( 'BoxUk\Plugins\WordPress_Email_Tld_Checker\email_ends_with_tld' ) ) {
	throw new \RuntimeException( 'WordPress Email TLD Checker not installed! Please install with Composer and ensure you are using the autoloader.' );
}

\add_filter( 'is_email', __NAMESPACE__ . '\\email_ends_with_tld', 10, 3 );

/**
 * Filter to check email ends with a valid TLD.
 * 
 * @template T
 *
 * @param bool|T      $is_email Pre-existing validation result.
 * @param string      $email Email address to check.
 * @param string|null $context Context of the validation.
 *
 * @return bool|T Valid or not or sometimes the email address as a string.
 *
 * phpcs:disable NeutronStandard.Functions.TypeHint.NoArgumentType
 * phpcs:disable NeutronStandard.Functions.TypeHint.NoReturnType
 */
function email_ends_with_tld( $is_email, string $email, ?string $context ) {
	// If it's already failed validation just return.
	if ( false === $is_email ) {
		return $is_email;
	}

	// We only want to kick in if no context is set.
	if ( null !== $context ) {
		return $is_email;
	}

	// Only proceed if the intl extension is installed.
	if ( ! \function_exists( 'idn_to_ascii' ) ) {
		return $is_email;
	}

	return Validator::endsWithTld( $email );
}
// phpcs:enable NeutronStandard.Functions.TypeHint.NoArgumentType
// phpcs:enable NeutronStandard.Functions.TypeHint.NoReturnType