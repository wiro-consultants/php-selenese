<?php

namespace Selenese\Tests\TextPresent;

use Selenese\Tests\SeleneseTest;

class TextPresentTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertTextPresent
	//
	public function testPassAssert() {
		$this->executeTest(
			'assertTextPresent_pass.html',
			'textPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertTextPresent
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'assertTextPresent_fail.html',
			'textPresent.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertTextPresent
			)
		);
	}

	//
	// assertTextNotPresent
	//
	public function testPassAssertNot() {
		$this->executeTest(
			'assertTextNotPresent_pass.html',
			'textPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertTextNotPresent
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'assertTextNotPresent_fail.html',
			'textPresent.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertTextNotPresent
			)
		);
	}

	//
	// verifyTextPresent
	//
	public function testPassVerify() {
		$this->executeTest(
			'verifyTextPresent_pass.html',
			'textPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyTextPresent
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'verifyTextPresent_fail.html',
			'textPresent.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyTextPresent
			)
		);
	}

	//
	// verifyTextNotPresent
	//
	public function testPassVerifyNot() {
		$this->executeTest(
			'verifyTextNotPresent_pass.html',
			'textPresent.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyTextNotPresent
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'verifyTextNotPresent_fail.html',
			'textPresent.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyTextNotPresent
			)
		);
	}
}