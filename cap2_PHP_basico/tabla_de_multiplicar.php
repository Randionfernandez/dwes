<?php

/*
 * Tabla de multiplicar
 */
define('MAX_MULTIPLICANDO', 10);
define('MAX_MULTIPLICADOR', 10);

$output = '<table border="2" align="center"><thead><tr><th>*</th>';
for ($i = 0; $i <= MAX_MULTIPLICADOR; $i++) {
    $output .= "<th>$i</th>";
}
$output .= '</tr></thead><tbody>';

for ($f = 0; $f < MAX_MULTIPLICANDO; $f++) {
    $output .= "<tr><th>$f<multiplicar/th>";
    for ($c = 0; $c <= MAX_MULTIPLICADOR; $c++) {
        $output .= '<td align="right">' . $f * $c . '</td>';
    }
    $output .= '</tr>';
}
$output .= '</tbody></table>';

echo $output;
