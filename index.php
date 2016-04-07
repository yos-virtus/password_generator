<?php 

require __DIR__ . '/vendor/autoload.php';

$characterSetsToUse = [
    'upper' => false,
    'numbers' => false,
    'symbols' => false
];

$passwordGen = new Yos\PasswordGenerator\PasswordGeneratorService($characterSetsToUse);

$passwordGen
    ->useSpecialCharacters()
    ->useUppercase()
    ->useNumbers();

$count = 0;

var_dump($passwordGen);

while ($count <= 30) {
    echo $passwordGen->generatePassword(11) . '<br>';
    $count++;
}
