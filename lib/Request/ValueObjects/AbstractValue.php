<?php

namespace Request\ValueObjects;

abstract class AbstractValue implements \Request\Interfaces\ValueInterface
{
    /**
     * Holds the value that should be checked and corrected if not matched to the given Data-Type.
     * @var mixed
     */
    protected $inputValue = null;

    /**
     * If defined, outputValue is set to this value if inputValue does not match the given Data-Type.
     * @var mixed
     */
    protected $defaultValue = null;

    /**
     * Holds the Value that has been parsed and corrected.
     * @var mixed
     */
    protected $correctedValue = null;

    /**
     * In every case, the value that is now safe to be used in your code is saved in this variable.
     * @var mixed
     */
    protected $outputValue = null;

    /**
     * $match is a boolean which indicates whether the inputValue passes the validation of the given Data-Type.
     * @var bool
     */
    protected $match = null;

    /**
     * Creates a new AbstractValue that checks and corrects your Request-Data. It sets the inputValue if given.
     * @param mixed $inputValue The Value that should be checked and corrected.
     */
    public function __construct($inputValue = null)
    {
        if (!is_null($inputValue)) {
            $this->setInputValue($inputValue);
        }
    }

    /**
     * Sets the inputValue that sould be checked and corrected.
     * @param mixed $inputValue The value that should be checked and corrected.
     */
    public function setInputValue($inputValue)
    {
        $this->inputValue = $inputValue;
    }

    /**
     * Gets the value that is proposed to be checked and corrected if there is no match.
     * @return mixed The inputValue
     */
    public function getInputValue()
    {
        return $this->inputValue;
    }

    /**
     * Sets the value to output if the check has failed.
     * @param mixed $defaultValue The default Value.
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

    /**
     * Gets the value that is proposed to be output if the check has failed.
     * @return mixed The default Value
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Resets the default value.
     */
    public function resetDefaultValue()
    {
        $this->defaultValue = null;
    }

    /**
     * Gets the value thas been corrected if the inputValue-match failed.
     * @return mixed The correted value
     */
    public function getCorrectedValue()
    {
        return $this->correctedValue;
    }

    /**
     * Gets the value that can be safely used in your code.
     * @return mixed The outputValue
     */
    public function getOutputValue()
    {
        return $this->outputValue;
    }

    /**
     * Gets wether the check has succeeded or not.
     * @return bool The match or mismatch of inputValue.
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Correct the inputValue to match the given Data-Type.
     */
    abstract public function doCorrection();

    /**
     * execute the whole sh**...
     */
    public function execute()
    {
        if (is_null($this->inputValue)) {
            throw new \Exception("Error: inputValue not set.", 1);
        }

        if (is_null($this->correctedValue)) {
            $this->doCorrection();
        }

        if ($this->inputValue === $this->correctedValue) {
            $this->match = true;
            $this->outputValue = $this->correctedValue;
        } else {
            $this->match = false;
            $this->outputValue = is_null($this->defaultValue) ? $this->correctedValue : $this->defaultValue;
        }

        return $this->match;
    }
}
