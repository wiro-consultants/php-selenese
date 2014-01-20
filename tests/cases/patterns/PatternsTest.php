<?php

namespace Selenese\Tests\Patterns;

use Selenese\Tests\SeleneseTest;

class PatternsTest extends SeleneseTest {
	protected $caseFile = __FILE__;

	public function testPatternsPass() {
		$this->executeTest(
			'patterns_pass.html',
			'patterns.html',
			array(
				parent::PASS, // open
				parent::PASS, // exact pattern
				parent::PASS, // regex pattern
				parent::PASS, // regexp pattern
				parent::PASS, // glob without wildcard
				parent::PASS, // glob with single character wildcard
				parent::PASS  // glob with multi character wildcard
			)
		);
	}

	public function testPatternsFail() {
		$this->executeTest(
			'patterns_fail.html',
			'patterns.html',
			array(
				parent::PASS,          // open
				parent::FAIL_CONTINUE, // glob pattern
				parent::FAIL_CONTINUE, // regex pattern
				parent::FAIL_CONTINUE  // exact pattern
			)
		);
	}

	public function testPatternsLongGlobFail() {
		$this->executeTest(
			'patterns_fail.html',
			'patternsLongGlob.html',
			array(
				parent::PASS,          // open
				parent::FAIL_CONTINUE, // glob pattern
				parent::FAIL_CONTINUE, // regex pattern
				parent::FAIL_CONTINUE  // exact pattern
			)
		);
	}
}