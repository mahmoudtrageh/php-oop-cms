<?php
namespace src\validationRules;
use src\interfaces\validationRuleInterface;

class ValidateMaximum implements ValidationRuleInterface {

    private $maximum;

    public function __construct( $maximum ) {
        $this->maximum = $maximum;
    }
    
    function validateRule($value) {
        if (strlen($value) > $this->maximum) {
            return false;
        }

        return true;
    }

    function getErrorMessage() {
        return "password should not be more than" . $this->maximum. " characters";
    }
}