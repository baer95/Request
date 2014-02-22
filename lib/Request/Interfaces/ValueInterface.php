<?php

namespace Request\Interfaces;

Interface ValueInterface
{
    /**
     * Creates a new AbstractValue that checks and corrects your Request-Data. It sets the inputValue if given.
     * @param mixed $inputValue The Value that should be checked and corrected.
     */
    public function __construct($inputValue = null);

    /**
     * Sets the inputValue that sould be checked and corrected.
     * @param mixed $inputValue The value that should be checked and corrected.
     */
    public function setInputValue($inputValue);

    /**
     * Gets the value that is proposed to be checked and corrected if there is no match.
     * @return mixed The inputValue
     */
    public function getInputValue();

    /**
     * Sets the value to output if the check has failed.
     * @param mixed $defaultValue The default Value.
     */
    public function setDefaultValue($defaultValue);

    /**
     * Gets the value that is proposed to be output if the check has failed.
     * @return mixed The default Value
     */
    public function getDefaultValue();

    /**
     * Resets the default value.
     */
    public function resetDefaultValue();

    /**
     * Gets the value thas been corrected if the inputValue-match failed.
     * @return mixed The correted value
     */
    public function getCorrectedValue();

    /**
     * Gets the value that can be safely used in your code.
     * @return mixed The outputValue
     */
    public function getOutputValue();

    /**
     * Gets wether the check has succeeded or not.
     * @return bool The match or mismatch of inputValue.
     */
    public function getMatch();

    /**
     * Check whether the inputValue matches the given Data-Type and do corrections if not matched.
     */
    public function doCorrection();

    /**
     * Manages the correcting and matching-process
     * @return bool True if the input matches the given data-type
     */
    public function execute();
}
