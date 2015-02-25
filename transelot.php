<?php

/**
 * Transelot
 *
 * @link https://github.com/kanellov/transelot
 * @copyright Copyright (c) 2015 Vassilis Kanellopoulos - contact@kanellov.com
 * @license https://raw.githubusercontent.com/kanellov/transelot/master/LICENSE
 */

namespace Knlv;

/**
 * Translitterates greek characters to latin based on iso 843
 * @param  string $value input string
 * @return string        output string
 */
function transelot($value)
{
    mb_internal_encoding("UTF-8");
    mb_regex_encoding("UTF-8");

    $value = mb_ereg_replace(
        "([αεηΑΕΗ])[υύ]([βγδζλμνραιυεοηωάίύέόήώϊϋΒΓΔΖΛΜΝΡΑΙΥΕΟΗΩΆΊΎΈΌΉΏΪΫ])",
        "\\1v\\2",
        $value
    );
    $value = mb_ereg_replace(
        "([αεηΑΕΗ])[ΥΎ]([βγδζλμνραιυεοηωάίύέόήώϊϋΑΒΓΔΖΛΜΝΡΑΙΥΕΟΗΩΆΊΎΈΌΉΏΪΫ])",
        "\\1V\\2",
        $value
    );
    $value = mb_ereg_replace(
        "([αεηΑΕΗ])[υύ]([θκξπστφχψΘΚΞΠΣΤΦΧΨ\b])",
        "\\1f\\2",
        $value
    );
    $value = mb_ereg_replace(
        "([αεηΑΕΗ])[ΥΎ]([θκξπστφχψΘΚΞΠΣΤΦΧΨ\b])",
        "\\1F\\2",
        $value
    );
    $value = mb_ereg_replace("ο[υύ]", "ou", $value);
    $value = mb_ereg_replace("Ο[ΥΎ]", "OU", $value);
    $value = mb_ereg_replace("Ο[υύ]", "Ou", $value);
    $value = mb_ereg_replace("γγ", "ng", $value);
    $value = mb_ereg_replace("ΓΓ", "NG", $value);
    $value = mb_ereg_replace("Γγ", "Ng", $value);
    $value = mb_ereg_replace("γχ", "nch", $value);
    $value = mb_ereg_replace("ΓΧ", "NCH", $value);
    $value = mb_ereg_replace("Γχ", "Nch", $value);
    $value = mb_ereg_replace("γξ", "nx", $value);
    $value = mb_ereg_replace("ΓΞ", "NX", $value);
    $value = mb_ereg_replace("Γξ", "Nx", $value);
    $value = mb_ereg_replace("(^μπ|μπ$)", "b", $value);
    $value = mb_ereg_replace("(^^ΜΠ|^Μπ|ΜΠ$)", "B", $value);
    $value = mb_ereg_replace("θ", "th", $value);
    $value = mb_ereg_replace(
        "Θ([ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩΆΊΎΈΌΉΏΪΫ ])",
        "TH\\1",
        $value
    );
    $value = mb_ereg_replace(
        "Θ([αβγδεζηθικλμνξοπρστυφχψωάίύέόήώϊϋΐΰς])",
        "Th\\1",
        $value
    );
    $value = mb_ereg_replace("Θ", "TH", $value);
    $value = mb_ereg_replace("χ", "ch", $value);
    $value = mb_ereg_replace(
        "Χ([ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩΆΊΎΈΌΉΏΪΫ ])",
        "CH\\1",
        $value
    );
    $value = mb_ereg_replace(
        "Χ([αβγδεζηθικλμνξοπρστυφχψωάίύέόήώϊϋΐΰς])",
        "Ch\\1",
        $value
    );
    $value = mb_ereg_replace("Χ", "CH", $value);
    $value = mb_ereg_replace("ψ", "ps", $value);
    $value = mb_ereg_replace(
        "Ψ([ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩΆΊΎΈΌΉΏΪΫ ])",
        "PS\\1",
        $value
    );
    $value = mb_ereg_replace(
        "Ψ([αβγδεζηθικλμνξοπρστυφχψωάίύέόήώϊϋΐΰς])",
        "Ps\\1",
        $value
    );
    $value = mb_ereg_replace("Ψ", "PS", $value);

    $greek = array(
        'α', 'β', 'γ', 'δ', 'ε', 'ζ', 'η', 'ι', 'κ', 'λ', 'μ', 'ν', 'ξ', 'ο',
        'π', 'ρ', 'σ', 'τ', 'υ', 'φ', 'ω', 'ά', 'ί', 'ύ', 'έ', 'ό', 'ή', 'ώ',
        'ϊ', 'ϋ', 'ΐ', 'ΰ', 'ς',
        'Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο',
        'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Ω', 'Ά', 'Ί', 'Ύ', 'Έ', 'Ό', 'Ή', 'Ώ',
        'Ϊ', 'Ϋ',
    );
    $latin = array(
        'a', 'v', 'g', 'd', 'e', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'x', 'o',
        'p', 'r', 's', 't', 'y', 'f', 'o', 'a', 'i', 'y', 'e', 'o', 'i', 'o',
        'i', 'e', 'i', 'y', 's',
        'A', 'V', 'G', 'D', 'E', 'Z', 'I', 'I', 'K', 'L', 'M', 'N', 'X', 'O',
        'P', 'R', 'S', 'T', 'Y', 'F', 'O', 'Α', 'I', 'Y', 'E', 'O', 'I', 'O',
        'I', 'Y',
    );
    $value = str_replace($greek, $latin, $value);

    return $value;
}
