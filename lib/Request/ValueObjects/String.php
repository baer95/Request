<?php

namespace Request\ValueObjects;

class String extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        // remove all non-printable characters except CR(0a) and LF(0b) and TAB(9)
        $string = preg_replace('/([\x00-\x08]|[\x0b-\x0c]|[\x0e-\x19])/', "", $this->inputValue);

        // A normal user does not need those hex- and unicode-Characters since they are normal characters
        $hexEncoded = "/&#[xX]0{0,8}(21|22|23|24|25|26|27|28|29|2a|2b|2d|2f|30|31|32|33|34|35|36|37|38|39|3a|3b|3d|3f|40|41|42|43|44|45|46|47|48|49|4a|4b|4c|4d|4e|4f|50|51|52|53|54|55|56|57|58|59|5a|5b|5c|5d|5e|5f|60|61|62|63|64|65|66|67|68|69|6a|6b|6c|6d|6e|6f|70|71|72|73|74|75|76|77|78|79|7a|7b|7c|7d|7e);?/i";
        $unicodeEncoded = "/&#0{0,8}(33|34|35|36|37|38|39|40|41|42|43|45|47|48|49|50|51|52|53|54|55|56|57|58|59|61|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|86|87|88|89|90|91|92|93|94|95|96|97|98|99|100|101|102|103|104|105|106|107|108|109|110|111|112|113|114|115|116|117|118|119|120|121|122|123|124|125|126);?/i";
        $string = preg_replace($hexEncoded, "", $string);
        $string = preg_replace($unicodeEncoded, "", $string);

        // remove php- and html-tags
        $string = strip_tags($string);

        // encode characters with special meaning in html
        $string = htmlspecialchars($string);

        // escape single and double quotes, backslashes and the null-byte
        $this->correctedValue = addslashes($string);
    }
}
