<?php

namespace Selenese\Command;

// selectWindow(windowID)
class selectWindow extends Command {
    public $command = "selectWindow";

    /**
     * @see Command::runWebDriver()
     */
    public function runWebDriver(\WebDriver $session)
    {
    	$session->switchTo()->window($this->arg1);
    	return $this->commandResult(true, true, 'Switched to window: ' . $this->arg1);
    }
}
