<?php

namespace src\validationRules;

class ValidateMinimum implements \src\interfaces\ValidationRuleInterface {

    private $minimum;

    public function __construct( $minimum ) {
        $this->minimum = $minimum;
    }
    
    function validateRule($value) {
        if (strlen($value) < $this->minimum) {
            return false;
        }

        return true;
    }

    function getErrorMessage() {
        return "password should be more than" . $this->minimum;
    }
}