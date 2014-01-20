<?php

namespace Selenese\Tests;

use Selenese\Test,
    Selenese\Runner;

abstract class SeleneseTest extends \PHPUnit_Framework_TestCase {
	const PASS = 1;
	const FAIL = 2;
	const FAIL_CONTINUE = 3;

	// Stores the pid of the phantomjs instance
	protected $phantomJsPid;

	/**
	 * Execute a selenese file and check its results
	 * @param  string $seleneseFile   selenese file name
	 * @param  string $htmlFile       file name of html file where the tests should be run
	 * @param  array  $expectedResult the expected results of the various test steps, defined
	 *                                by the class constants PASS, FAIL and FAIL_CONTINUE (for verify)
	 *                                note that the runner will automatically add an "open" command
	 *                                to the test steps, so the first expected result should probably
	 *                                be PASS
	 * @return array                  result array of the test runner
	 */
	public function executeTest($seleneseFile, $htmlFile, $expectedResult) {
		$htmlFile = $this->getHtmlPath($htmlFile);

		// Load selenese file
		$test = new Test();
		$commandList = $test->loadFromSeleneseHtml($this->getSelenesePath($seleneseFile));

		// Set local base url
		$test->baseUrl = 'file://' . $htmlFile;

		// Run test on local phantom js
		$runner = new Runner($test, 'http://localhost:5555');
		$results = $runner->run(false);

		// Check results
		foreach ($expectedResult as $i => $status) {
			list($command, $commandResult) = $results[$i];
			$commandString = get_class($command) . ' | ' . $command->arg1 . ' | ' . $command->arg2;

			switch ($status) {
				case self::PASS:
					$this->assertTrue($commandResult->success, 'Command "' . $commandString . '" failed.');
					break;

				case self::FAIL:
				case self::FAIL_CONTINUE:
					$this->assertFalse($commandResult->success, 'Command "' . $commandString . '" was successful, but should fail.');

					if ($status === self::FAIL_CONTINUE) {
						$this->assertTrue($commandResult->continue, 'Command "' . $commandString . '" failed and stopped the test, but test should continue.');
					}
					break;
			}
		}

		return $results;
	}

	/**
	 * Start up phantomjs webdriver before test
	 */
	protected function setUp() {
		// start phantom
		$cmd = 'phantomjs --webdriver=5555 > "' . $this->getLogPath('phantom.log') . '" 2>&1 & echo $!';
		//echo "Starting phantomjs ($cmd)...\n";
		$this->phantomJsPid = exec($cmd);
		//echo "...pid $pid, waiting on readyness...\n";

		// ensure it's ready
		$startWait = time();
		while (true) {
			$fileContents = file($this->getLogPath('phantom.log'));
			$lastline = trim(array_pop($fileContents));
			//echo $lastline . "\n";
			if (strpos($lastline, 'running on port 5555') !== false) {
				break;
			}
			usleep(1000000 / 100); // 1000000 == 1 second; sleep for .01 seconds
			if ($startWait + 5 < time()) {
				throw new \Exception("Unable to determine that phantomjs process was ready after 5 seconds, giving up");
			}
		}
		//echo "...ready\n";
	}

	/**
	 * Shut down phantomjs webdriver after test
	 */
	protected function tearDown() {
		// clean up the phantom instance
		exec('kill -9 ' . $this->phantomJsPid);
		//echo "Killed phantom\n";
	}

	/**
	 * Get full path of the test html.
	 */
	protected function getHtmlPath($path) {
		return dirname($this->caseFile).'/html/'.$path;
	}

	/**
	 * Get full path of the selenium html file.
	 */
	protected function getSelenesePath($path) {
		return dirname($this->caseFile).'/selenese/'.$path;
	}

	/**
	 * Get full path of a log file
	 */
	public function getLogPath($path) {
		return dirname(__FILE__).'/logs/'.$path;
	}
}