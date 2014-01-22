<?php

namespace Selenese\Command;

// check(locator)
class check extends Command {
    /**
     * @see Command::runWebDriver()
     */
    public function runWebDriver(\WebDriver $session)
    {
        $this->getElement($session, $this->arg1)->click();
        return $this->commandResult(true, true, 'Clicked '. $this->arg1);
    }
}
