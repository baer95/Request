<?php

namespace Request\Types;

class Json extends AbstractType
{
    public function checkValue()
    {
        json_decode($this->value);
        if (json_last_error() === JSON_ERROR_NONE) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            // $this->value korrigieren.
            // zusätzliche protected var erstellen, in der json error gespeichert wird
            // return "{\"ErrorCode\": ".json_last_error().",\"ErrorMessage\": \"".json_last_error_msg()."\"}";
        }
        return $this;
    }
}
