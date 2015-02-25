<?php
require __DIR__ . '/../vendor/autoload.php';

use \FUnit as fu;

fu::test("Test transelot works", function () {
    $input = "αβγδεζηικλμνξοπρστυφωάίύέόήώϊϋΐΰςΑΒΓΔΕΖΗΙΚΛΜΝΞΟΠΡΣΤΥΦΩΆΊΎΈΌΉΏΪΫ";
    $expected = "avgdeziiklmnxoprstyfoaiyeoioieiysAVGDEZIIKLMNXOPRSTYFOΑIYEOIOIY";
    fu::equal(\Knlv\transelot($input), $expected, "Assert translitteration works");
});
