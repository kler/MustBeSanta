<?php

$whoArr = [
    "got a beard that's long and white",
    "comes around on a special night",
    "wears boots and a suit of red",
    "wears a long cap on his head",
    "got a big red cherry nose",
    "laughs this way HO HO HO",
    "very soon will come our way",
    "little reindeer pull his sleigh"
];


for ($i = 0; $i < count($whoArr) * 2; $i++) {
    $who = $whoArr[floor($i / 2)];
    $result = ($i % 2 == 0 ? 'Who' : 'Santa');
    if (substr($who, 0, 6) == 'little' && $i % 2 == 0) {
        $result = 'Eight';
    }
    if (substr($who, 0, 3) == 'got' || (substr($who, 0, 6) == 'little' && $i % 2 == 1)) {
        $result .= "'s";
    }
    $result .= ' ' . $who;
    echo $result . PHP_EOL;
}
