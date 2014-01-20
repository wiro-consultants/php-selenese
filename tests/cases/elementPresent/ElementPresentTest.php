<?php

namespace Selenese\Tests\ElementPresent;

use Selenese\Tests\SeleneseTest;

class ElementPresentTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertElementPresent
	//
	public function testPassAssert() {
		$this->executeTest(
			'assertElementPresent_pass.html',
			'elementPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertElementPresent
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'assertElementPresent_fail.html',
			'elementPresent.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertElementPresent
			)
		);
	}

	//
	// assertElementNotPresent
	//
	public function testPassAssertNot() {
		$this->executeTest(
			'assertElementNotPresent_pass.html',
			'elementPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertElementNotPresent
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'assertElementNotPresent_fail.html',
			'elementPresent.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertElementNotPresent
			)
		);
	}

	//
	// verifyElementPresent
	//
	public function testPassVerify() {
		$this->executeTest(
			'verifyElementPresent_pass.html',
			'elementPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyElementPresent
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'verifyElementPresent_fail.html',
			'elementPresent.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyElementPresent
			)
		);
	}

	//
	// verifyElementNotPresent
	//
	public function testPassVerifyNot() {
		$this->executeTest(
			'verifyElementNotPresent_pass.html',
			'elementPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyElementNotPresent
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'verifyElementNotPresent_fail.html',
			'elementPresent.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyElementNotPresent
			)
		);
	}
}