<?php

namespace Selenese\Tests\Value;

use Selenese\Tests\SeleneseTest;

class ButtonValueTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertValue
	//
	public function testPassAssert() {
		$this->executeTest(
			'button/assertValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertValue
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'button/assertValue_fail.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertValue
			)
		);
	}

	//
	// assertNotValue
	//
	public function testPassAssertNot() {
		$this->executeTest(
			'button/assertNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotValue
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'button/assertNotValue_fail.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertNotValue
			)
		);
	}

	//
	// verifyValue
	//
	public function testPassVerify() {
		$this->executeTest(
			'button/verifyValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyValue
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'button/verifyValue_fail.html',
			'value.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyValue
			)
		);
	}

	//
	// verifyNotValue
	//
	public function testPassVerifyNot() {
		$this->executeTest(
			'button/verifyNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotValue
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'button/verifyNotValue_fail.html',
			'value.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotValue
			)
		);
	}
}