<?php

namespace Selenese\Command;

// verifyValue(locator,pattern)
class verifyValue extends Command {
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

        return $this->verify($value, $this->arg2);
    }
}
