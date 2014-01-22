<?php

namespace Selenese\Tests\Value;

use Selenese\Tests\SeleneseTest;

class InputValueTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertValue
	//
	public function testPassAssert() {
		$this->executeTest(
			'input/assertValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertValue
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'input/assertValue_fail.html',
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
			'input/assertNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotValue
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'input/assertNotValue_fail.html',
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
			'input/verifyValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyValue
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'input/verifyValue_fail.html',
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
			'input/verifyNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotValue
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'input/verifyNotValue_fail.html',
			'value.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotValue
			)
		);
	}
}