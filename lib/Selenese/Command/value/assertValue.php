<?php

namespace Selenese\Command;

// assertValue(locator,pattern)
class assertValue extends Command {
    /**
     * @see Command::runWebDriver()
     */
    public function runWebDriver(\WebDriver $session)
    {
        try {
            $value = $this->getValue($session, $this->arg1);
        }
        catch (NoSuchElement $e) {
            return $this->commandResult(false, false, 'Element not found');
        }

        return $this->assert($value, $this->arg2);
    }
}
