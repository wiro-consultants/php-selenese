<?php

namespace Selenese\Tests\Invalid;

use Selenese\Tests\SeleneseTest;

class InvalidTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	//
	// assertElementPresent
	//
	public function testPassAssert() {
		$this->executeTest(
			'invalid_fail.html',
			'invalid.html',
			array(
				parent::PASS,          // open
				parent::FAIL_CONTINUE, // invalid command
				parent::FAIL_CONTINUE  // another invalid command
			)
		);
	}
}