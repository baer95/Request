<?php

namespace Frick\Request\Types;

class Email_DNS extends Type
{
    /**
     * The E-Mail Syntax is defined by RFC822 and RFC5321 which can be found here:
     *
     * @see http://tools.ietf.org/html/rfc822
     * @see http://tools.ietf.org/html/rfc5321
     */
    public function checkValue()
    {
        $dnsCheck = checkdnsrr(substr($match, strpos($match, "@")+1), "MX");

        if ($dnsCheck) {
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
            // return false;
        }
        return $this;
    }
}
