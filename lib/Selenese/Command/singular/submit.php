<?php

namespace Selenese\Command;

// submit(formLocator)
class submit extends Command {
    public function runWebDriver(\WebDriver $session)
    {
        $this->getElement($session, $this->arg1)->submit();
        return $this->commandResult(true, true, 'Submitted '. $this->arg1);
    }
}