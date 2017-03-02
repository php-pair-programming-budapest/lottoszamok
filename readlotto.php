<?php

// neten lévő csv-fájl betöltése fájlként
$file = fopen("https://bet.szerencsejatek.hu/cmsfiles/otos.csv","r");

// tömb definiálás
$szamok = [];

// végig megyünk a betöltött fájlon
while(! feof($file))
  {
  // csv-fájl sora betölt $olvas-ba
  $olvas = fgetcsv($file, 200, ";");
  //print_r($olvas);

  //végigmegyünk az 5 számoszlopon, feltöltjük a $szamok-tömböt a kihúzott számokkal
  for ($i = 11; $i <=15; $i++) {
      if (!isset($szamok[$olvas[$i]])) {
            $szamok[$olvas[$i]] = 1; 
      } else {
         $szamok[$olvas[$i]]++;
      }
  }
  //echo $felbont[11]." ".$felbont[12]." ".$felbont[13]." ".$felbont[14]." ".$felbont[15]."\n";
  //
  //$eredm[] = $felbont[12];
  }

// rendezzük a tömböt a key szerint
ksort($szamok);
// print_r($szamok);

// összes előfordulás számítása & kiirása
$osszeg = array_sum($szamok);
echo "\n".$osszeg."\n";

$osszvsz = 0;

// $szamok tömbön végigmenve egyes számok valoszinuségének számmitása & kirása
// figyelem!! global változók használata függvényben !!
array_walk($szamok, function($item, $key) {
   global $osszeg;
   global $osszvsz;
   
   // valoszinusegek osszegzése
   $osszvsz += $item/$osszeg;
   echo $key." ".$item." ".($item/$osszeg)."\n";
});

echo "\n>>".$osszvsz."<<\n";
