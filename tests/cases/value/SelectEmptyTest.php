<?php

namespace Selenese\Tests\Value;

use Selenese\Tests\SeleneseTest;

class SelectEmptyTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertValue
	//
	public function testPassAssert() {
		$this->executeTest(
			'selectEmpty/assertValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertValue
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'selectEmpty/assertValue_fail.html',
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
			'selectEmpty/assertNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotValue
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'selectEmpty/assertNotValue_fail.html',
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
			'selectEmpty/verifyValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyValue
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'selectEmpty/verifyValue_fail.html',
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
			'selectEmpty/verifyNotValue_pass.html',
			'value.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotValue
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'selectEmpty/verifyNotValue_fail.html',
			'value.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotValue
			)
		);
	}
}