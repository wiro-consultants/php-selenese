<?php

namespace Selenese\Tests\Value;

use Selenese\Tests\SeleneseTest;

class SelectMultiTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertValue
	//
	public function testPassAssert() {
		$this->executeTest(
			'selectMulti/assertValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertValue
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'selectMulti/assertValue_fail.html',
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
			'selectMulti/assertNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotValue
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'selectMulti/assertNotValue_fail.html',
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
			'selectMulti/verifyValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyValue
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'selectMulti/verifyValue_fail.html',
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
			'selectMulti/verifyNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotValue
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'selectMulti/verifyNotValue_fail.html',
			'value.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotValue
			)
		);
	}
}