<?php
// Márk megoldása
// https://gist.github.com/sagikazarmark/d6a3ff9036cedd75e993cc7eed17a34e/0567c33bdb0d3fa0feedc8183c6d538610007401

$file = file_get_contents('https://bet.szerencsejatek.hu/cmsfiles/otos.csv');
// Tömbbe rakjuk soronként
$huzasok = explode("\r\n", trim($file));
// Ide rakjuk a huzasokat
$utolsok = [];
foreach ($huzasok as $het => $huzas) {
    $norm = explode(';', $huzas);
    for ($i=11; $i < 16; $i++) {
        if (!isset($utolsok[$norm[$i]])) {
            $utolsok[$norm[$i]] = $het + 1;
        }
/*        if (count($utolsok) == 90) {
            break 2;
        }*/
    }
}
var_dump($utolsok);
