<?php

namespace Selenese\Tests\Text;

use Selenese\Tests\SeleneseTest;

class TextTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertText
	//
	public function testPassAssert() {
		$this->executeTest(
			'assertText_pass.html',
			'text.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertText
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'assertText_fail.html',
			'text.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertText
			)
		);
	}

	//
	// assertNotText
	//
	public function testPassAssertNot() {
		$this->executeTest(
			'assertNotText_pass.html',
			'text.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotText
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'assertNotText_fail.html',
			'text.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertNotText
			)
		);
	}

	//
	// verifyText
	//
	public function testPassVerify() {
		$this->executeTest(
			'verifyText_pass.html',
			'text.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyText
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'verifyText_fail.html',
			'text.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyText
			)
		);
	}

	//
	// verifyNotText
	//
	public function testPassVerifyNot() {
		$this->executeTest(
			'verifyNotText_pass.html',
			'text.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotText
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'verifyNotText_fail.html',
			'text.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotText
			)
		);
	}
}