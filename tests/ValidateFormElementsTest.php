<?php
require_once( dirname(dirname(__FILE__)) . "/includes/ValidateFormElements.php");

class ValidateFormElementsTest extends PHPUnit_Framework_TestCase {

	/**
	 * [setUp description]
	 */
	public function setUp() {
		$this->ValidateFormElements = new ValidateFormElements();
	}

	/**
	 *
	 * @dataProvider providerValidateName
	 * @param  [type] $expectedOut [description]
	 * @param  [type] $input       [description]
	 * @return [type]              [description]
	 */
	public function testValidateName($expectedOut, $input) {
		$this->assertSame($expectedOut, $this->ValidateFormElements->validateName($input));
	}

	public function providerValidateName() {
		return array(
			'Null Value' => array(
				false,
				null,
			),
			'Empty String' => array(
				false,
				"",
			),
			'Non Safe String' => array(
				false,
				"<>",
			),
			'Non Empty String' => array(
				true,
				"asdfasdf",
			),
		);
	}

	/**
	 *
	 * @dataProvider providerValidateEmail
	 * @param  [type] $expectedOut [description]
	 * @param  [type] $input       [description]
	 * @return [type]              [description]
	 */
	public function testValidateEmail($expectedOut, $input) {
		$this->assertSame($expectedOut, $this->ValidateFormElements->validateEmail($input));
	}

	public function providerValidateEmail() {
		return array(
			'Null Value' => array(
				false,
				null,
			),
			'Empty String' => array(
				false,
				"",
			),
			'Int' => array(
				false,
				1,
			),
			'Non Safe String' => array(
				false,
				"<>",
			),
			'Non Empty String' => array(
				false,
				"asdfasdf",
			),
			'Fake Email' => array(
				true,
				"test@testing.com",
			),
		);
	}

	/**
	 *
	 * @dataProvider providerValidateWishlist
	 * @param  [type] $expectedOut [description]
	 * @param  [type] $input       [description]
	 * @return [type]              [description]
	 */
	public function testValidateWishlist($expectedOut, $input) {
		$this->assertSame($expectedOut, $this->ValidateFormElements->validateWishlist($input));
	}

	public function providerValidateWishlist() {
		return array(
			'Null Value' => array(
				true,
				null,
			),
			'Empty String' => array(
				true,
				"",
			),
			'Non Safe String' => array(
				true,
				"<>",
			),
			'URL in string' => array(
				true,
				"https://www.testing.com/",
			),
			'Non Empty String' => array(
				true,
				"asdfasdf",
			),
		);
	}
}