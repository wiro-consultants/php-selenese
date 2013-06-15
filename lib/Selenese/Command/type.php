<?php

namespace Selenese\Command;

// type(locator,value)
class type extends Command {
    public function runWebDriver(\WebDriverSession $session)
    {
        try {
            $this->getElement($session, $this->arg1)->value($this->split_keys($this->arg2));
            return $this->commandResult(true, true, 'Typed "'. $this->arg2 . '" into ' . $this->arg1);
        }
        catch (\Exception $e) {
            return $this->commandResult(false, false, 'Could not type "'. $this->arg2 . '" into ' . $this->arg1 . '. Error: ' . $e->getMessage());
        }
    }
    private function split_keys($toSend)
    {
        $payload = array("value" => preg_split("//u", $toSend, -1, PREG_SPLIT_NO_EMPTY));
        return $payload;
    }
}
