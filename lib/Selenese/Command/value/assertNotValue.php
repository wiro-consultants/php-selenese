<?php

namespace Selenese\Command;

// assertNotValue(locator,pattern)
class assertNotValue extends Command {
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

        return $this->assertNot($value, $this->arg2);
    }
}
