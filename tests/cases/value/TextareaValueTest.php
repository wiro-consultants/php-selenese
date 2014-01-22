<?php

namespace Selenese\Tests\Value;

use Selenese\Tests\SeleneseTest;

class TextareaValueTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertValue
	//
	public function testPassAssert() {
		$this->executeTest(
			'textarea/assertValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertValue
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'textarea/assertValue_fail.html',
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
			'textarea/assertNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotValue
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'textarea/assertNotValue_fail.html',
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
			'textarea/verifyValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyValue
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'textarea/verifyValue_fail.html',
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
			'textarea/verifyNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotValue
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'textarea/verifyNotValue_fail.html',
			'value.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotValue
			)
		);
	}
}