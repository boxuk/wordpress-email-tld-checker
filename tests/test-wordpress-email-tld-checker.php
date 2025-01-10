<?php
/**
 * Class Test_WordPress_Email_Tld_Checker
 *
 * @package BoxUk\Plugins\WordPress_Email_Tld_Checker
 */

declare( strict_types=1 );

use BoxUk\Plugins\WordPress_Email_Tld_Checker;
use PHPUnit\Framework\TestCase;

/**
 * Test_WordPress_Email_Tld_Checker
 */
class Test_WordPress_Email_Tld_Checker extends TestCase {
	/**
	 * Test validation returns existing if already failed.
	 */
	public function test_returns_false_if_already_false(): void {
		self::assertFalse( WordPress_Email_Tld_Checker\email_ends_with_tld( false, 'example@example.com', 'context' ) );
	}

	/**
	 * Test validation returns existing if context is passed.
	 */
	public function test_returns_as_is_if_context_not_null(): void {
		self::assertFalse( WordPress_Email_Tld_Checker\email_ends_with_tld( false, 'example@example.com', 'context' ) );
		self::assertTrue( WordPress_Email_Tld_Checker\email_ends_with_tld( true, 'example@example.com', 'context' ) );
	}

	/**
	 * Test validation returns existing if context is passed.
	 *
	 * @dataProvider getTlds
	 * @param string $tld TLD to use for check.
	 * @param bool   $expected Expected outcome.
	 */
	public function test_expected_result_for_tld( string $tld, bool $expected ): void {
		self::assertEquals( $expected, WordPress_Email_Tld_Checker\email_ends_with_tld( true, 'example@example.' . $tld, null ) );
	}

	/**
	 * Tlds to check with their expected outcome
	 *
	 * @return array
	 */
	public function getTlds(): array {
		return [
			'.com'             => [ '.com', true ],
			'.co'              => [ '.co', true ],
			'.co.uk'           => [ '.co.uk', true ],
			'.co.u'            => [ '.co.u', false ],
			'.wofjoeijfoerijf' => [ '.wofjoeijfoerijf', false ],
		];
	}
}
