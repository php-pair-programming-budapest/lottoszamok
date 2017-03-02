<?php
//számokat melyik héten húzták utoljára?

// neten lévő csv-fájl betöltése fájlként
$file = file_get_contents("https://bet.szerencsejatek.hu/cmsfiles/otos.csv");
$huzasok = explode ("\r\n", trim($file));

$utolsok = [];
echo $file;

foreach ($huzasok as $het =>  $huzas) {
   $norm = explode(";", $huzas);

   for ($i = 11; $i < 15; $i++) {
      if(!isset($utolsok[(int)$norm[$i]])) {
         $utolsok[(int)$norm[$i]] = $het;
      }
   }
}

var_dump ($utolsok);

/*
fclose($file);
// végig megyünk a betöltött fájlon
for ($i = 1; $i <= 90; $i++) {
   $file = fopen("https://bet.szerencsejatek.hu/cmsfiles/otos.csv","r");
   //fseek($file, 0);
   $j = 0;
   while(! feof($file)) {
      $j++;
      $olvas = fgetcsv($file, 200, ";");
      if ($olvas[11] == $i OR $olvas[12] == $i OR $olvas[13] == $i OR $olvas[14] == $i OR $olvas[15] == $i) {
         echo $i." ".$olvas[2]." ".$j."\n";
         fclose($file);
         break;
      }
   }
}
*/