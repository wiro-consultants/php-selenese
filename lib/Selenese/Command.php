<?php

namespace Selenese\Command;

use Selenese\CommandResult,
    Selenese\Pattern,
    Selenese\Locator,
    Selenese\Exception\NoSuchElement
    ;

abstract class Command {

    public $arg1;
    public $arg2;

    /**
     * @param \WebDriverSession $session
     * @return CommandResult
     */
    abstract public function runWebDriver(\WebDriver $session);

    /**
     * Utility function to fetch an element or throw an error
     *
     * @param \WebDriverSession $session
     * @param string $locator
     * @throws \Exception
     * @throws \NoSuchElementWebDriverError
     * @return \WebDriverElement
     */
    protected function getElement(\WebDriver $session, $locator) {
        try {
            $locatorObj = new Locator($locator);
            $element = $session->findElement($locatorObj->by);
        }
        catch (\NoSuchElementWebDriverError $e) {
            $element = null;
        }
        if ($element === null) {
            throw new NoSuchElement($locator);
        }
        return $element;
    }

    /**
     * Utility function to fetch an element attribute or throw an error
     *
     * @param \WebDriverSession $session
     * @param string $locator
     * @throws \Exception
     * @throws \NoSuchElementWebDriverError
     * @return string
     */
    protected function getAttribute(\WebDriver $session, $locator) {
        $pos = strrpos($locator, '@');

        if ($pos === false) {
            throw new NoSuchAttribute($locator);
        }

        $elementLocator = substr($locator, 0, $pos - 1);
        $attributeName = substr($locator, $pos);

        $this->getElement($session, $elementLocator);

        $attribute = $element->getAttribute($attributeName);
        if ($attribute === null) {
            throw new NoSuchAttribute($locator);
        }
        return $attribute;
    }

    protected function getSelectOptions(\WebDriver $session, $locator) {
        $element = $this->getElement($session, $locator);
        try {
            $options = $element->findElements(
                \WebDriverBy::tagName('option')
            );
        }
        catch (\NoSuchElementWebDriverError $e) {
            throw new NoSuchOptions($locator);
        }

        return $options;
    }

    protected function getValue(\WebDriver $session, $locator) {
        $element = $this->getElement($session, $locator);
        switch ($element->getTagName()) {
            case 'input':
            case 'button':
                $element = $this->getElement($session, $locator);
                return $element->getAttribute('value');

            case 'textarea':
                $element = $this->getElement($session, $locator);
                return $element->getText();

            case 'select':
                $values = array();

                $options = $this->getSelectOptions($session, $locator);
                foreach ($options as $option) {
                    if ($option->isSelected()) {
                        try {
                            $value = $option->getAttribute('value');
                        } catch (NoSuchAttribute $e) {
                            $value = $option->getText();
                        }

                        $values[] = $value;
                    }
                }

                return implode(';', $values);
        }
    }

    // these are all mostly simliar
    protected function assert($valueis, $pattern) {
        $patternobj = new Pattern($pattern);
        $matched = $patternobj->match($valueis);
        return new CommandResult($matched, $matched, $matched ? 'Matched' : 'Did not match');
    }

    protected function assertNot($valueis, $pattern) {
        $patternobj = new Pattern($pattern);
        $matched = $patternobj->match($valueis);
        return new CommandResult(!$matched, !$matched, $matched ? 'Matched and should not have' : 'Correctly did not match');
    }

    protected function verify($valueis, $pattern) {
        $patternobj = new Pattern($pattern);
        $matched = $patternobj->match($valueis);
        return new CommandResult(true, $matched, $matched ? 'Matched' : 'Did not match');
    }

    protected function verifyNot($valueis, $pattern) {
        $patternobj = new Pattern($pattern);
        $matched = $patternobj->match($valueis);
        return new CommandResult(true, !$matched, $matched ? 'Matched and should not have' : 'Correctly did not match');
    }

    /**
     * @see Selenese\CommandResult::__construct()
     */
    protected function commandResult($continue, $success, $message) {
        return new CommandResult($continue, $success, $message);
    }

}
