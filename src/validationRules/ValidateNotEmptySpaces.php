<?php
namespace src\validateRules;

class ValidateNotEmptySpaces implements ValidationRuleInterface {

    function validateRule($value) {
        if(strpos($value, " ") === false) {
            return true;
        }
        return false;
    }

    function getErrorMessage() {
        return "No Empty Spaced Allowed";
    }
}