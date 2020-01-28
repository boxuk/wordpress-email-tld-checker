<?php
declare( strict_types=1 );

namespace BoxUk\Plugins\WordPress_Email_Tld_Checker;

use Arubacao\TldChecker\Validator;

/**
 * Filter to check email ends with a valid TLD.
 *
 * @param bool|mixed  $is_email Pre-existing validation result.
 * @param string      $email Email address to check.
 * @param string|null $context Context of the validation.
 *
 * @return bool|string Valid or not or sometimes the email address as a string.
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
