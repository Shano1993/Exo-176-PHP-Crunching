<?php

// Dictionnaire
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

// Nombre de mot dans le dictionnaire
echo "Le nombre de mot dans le dictionnaire est de : " . " " . count($dico) . '<br>';


// Nombre de mot en 15 lettres
$len15 = array_filter($dico, function($item) {
    return strlen($item) === 15;
});

echo "Le nombre de mot en 15 lettres est de : " . " " . count($len15) . '<br>';

// Nombre de mot avec un w
$countW = 0;
for ($i = 0; $i < count($dico); $i++) {
    if (strpos($dico[$i], 'w')) {
        $countW++;
    }
}

echo "Le nombre de mot avec un 'w' est de : " . " " . "$countW" . "<br>";

// Nombre de mot finissant par q
$countQ = 0;
for ($i = 0; $i < count($dico); $i++) {
    if(strrpos($dico[$i], 'q') === strlen($dico[$i]) - 2) {
        $countQ++;
    }
}

echo "Le nombre de mot finissant par un 'q' est de : " . " " . "$countQ" . "<br><br>";

// Liste des films
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"];

// Top 10 des films
for ($i = 0; $i < 10; $i++) {
    echo "TOP " . $i . " : " . $top[$i]['im:name']['label'] . "<br>";
}
echo "<br>";

// Position du film Gravity
$name = array_column($top, 'im:name');
$title = array_column($name, 'label');

echo "Le film 'Gravity' se trouve en position " . array_search('Gravity', $title) . "<br><br>";

// Realisateur du film The LEGO Movies
echo "Le réalisateur du film 'The LEGO Movies est : " . $top[array_search('The LEGO Movies', $title)]['im:artist']['label'] . "<br><br>";

// Nombres de films avant 2000







