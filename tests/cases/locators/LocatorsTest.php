<?php

namespace Selenese\Tests\Locators;

use Selenese\Tests\SeleneseTest;

class LocatorsTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	public function testLocatorsPass() {
		$this->executeTest(
			'locators_pass.html',
			'locators.html',
			array(
				parent::PASS, // open
				parent::PASS, // css locator
				parent::PASS, // id locator
				parent::PASS  // name locator
			)
		);
	}

	public function testLocatorsFail() {
		$this->executeTest(
			'locators_fail.html',
			'locators.html',
			array(
				parent::PASS,          // open
				parent::FAIL_CONTINUE, // css locator
				parent::FAIL_CONTINUE, // id locator
				parent::FAIL_CONTINUE  // name locator
			)
		);
	}
}