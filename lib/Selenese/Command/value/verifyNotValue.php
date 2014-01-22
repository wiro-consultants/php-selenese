<?php

namespace Selenese\Command;

// verifyNotValue(locator,pattern)
class verifyNotValue extends Command {
    /**
     * @see Command::runWebDriver()
     */
    public function runWebDriver(\WebDriver $session)
    {
        try {
            $value = $this->getValue($session, $this->arg1);
        }
        catch (NoSuchElement $e) {
            return $this->commandResult(true, false, 'Element not found');
        }

        return $this->verifyNot($value, $this->arg2);
    }
}
