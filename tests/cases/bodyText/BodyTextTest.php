<?php

namespace Selenese\Tests\BodyText;

use Selenese\Tests\SeleneseTest;

class BodyTextTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertBodyText
	//
	public function testPassAssert() {
		$this->executeTest(
			'assertBodyText_pass.html',
			'bodyText.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertBodyText
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'assertBodyText_fail.html',
			'bodyText.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertBodyText
			)
		);
	}

	//
	// assertNotBodyText
	//
	public function testPassAssertNot() {
		$this->executeTest(
			'assertNotBodyText_pass.html',
			'bodyText.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotBodyText
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'assertNotBodyText_fail.html',
			'bodyText.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertNotBodyText
			)
		);
	}

	//
	// verifyBodyText
	//
	public function testPassVerify() {
		$this->executeTest(
			'verifyBodyText_pass.html',
			'bodyText.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyBodyText
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'verifyBodyText_fail.html',
			'bodyText.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyBodyText
			)
		);
	}

	//
	// verifyNotBodyText
	//
	public function testPassVerifyNot() {
		$this->executeTest(
			'verifyNotBodyText_pass.html',
			'bodyText.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotBodyText
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'verifyNotBodyText_fail.html',
			'bodyText.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotBodyText
			)
		);
	}
}