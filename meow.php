<?php

// echo "meoowwwwwwwwwwwww :333333";

$cuteness = (int)($_GET['cuteness'] ?? 1);

$meows = ['meow', 'mrrp', 'mrow', 'purr', 'mreow'];
$word = $meows[array_rand($meows)];
$meow = substr($word, 0, 1);
$exploded = str_split(substr($word, 1));

foreach($exploded as $i) {
    $meow .= $i;
    while(rand(0, $cuteness)) {
        $meow .= $i;
    }
}

if(rand(0, $cuteness)) {
    $meow .= ' :3';
    while(rand(0, $cuteness)) {
        $meow .= '3';
    }
}

echo $meow;
