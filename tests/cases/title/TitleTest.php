<?php

namespace Selenese\Tests\Title;

use Selenese\Tests\SeleneseTest;

class TitleTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertTitle
	//
	public function testPassAssert() {
		$this->executeTest(
			'assertTitle_pass.html',
			'title.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertTitle
			)
		);
	}

	public function testFailAssert() {
		$this->executeTest(
			'assertTitle_fail.html',
			'title.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertTitle
			)
		);
	}

	//
	// assertNotTitle
	//
	public function testPassAssertNot() {
		$this->executeTest(
			'assertNotTitle_pass.html',
			'title.html',
			array(
				parent::PASS, // open
				parent::PASS  // assertNotTitle
			)
		);
	}

	public function testFailAssertNot() {
		$this->executeTest(
			'assertNotTitle_fail.html',
			'title.html',
			array(
				parent::PASS, // open
				parent::FAIL  // assertNotTitle
			)
		);
	}

	//
	// verifyTitle
	//
	public function testPassVerify() {
		$this->executeTest(
			'verifyTitle_pass.html',
			'title.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyTitle
			)
		);
	}

	public function testFailVerify() {
		$this->executeTest(
			'verifyTitle_fail.html',
			'title.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyTitle
			)
		);
	}

	//
	// verifyNotTitle
	//
	public function testPassVerifyNot() {
		$this->executeTest(
			'verifyNotTitle_pass.html',
			'title.html',
			array(
				parent::PASS, // open
				parent::PASS  // verifyNotTitle
			)
		);
	}

	public function testFailVerifyNot() {
		$this->executeTest(
			'verifyNotTitle_fail.html',
			'title.html',
			array(
				parent::PASS,         // open
				parent::FAIL_CONTINUE // verifyNotTitle
			)
		);
	}
}