#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$reindeers = [
    'Dasher',
    'Dancer',
    'Prancer',
    'Vixen',
    'Eisenhower',
    'Kennedy',
    'Johnson',
    'Nixon',
    'Comet',
    'Cupid',
    'Donner',
    'Blitzen',
    'Carter',
    'Reagan',
    'Bush',
    'Clinton'
];

$protagonist = new MustBeSanta\Ensemble\Protagonist();
$protagonist->setFirstName('Santa');
$protagonist->setLastName('Clause');

$sidekicks = new MustBeSanta\Ensemble\Sidekicks();
foreach ($reindeers as $reindeerName) {
    $deuteragonist = new MustBeSanta\Ensemble\Sidekick();
    $deuteragonist->setFirstName($reindeerName);
    $sidekicks->addSidekick($deuteragonist);
}

$generator = new MustBeSanta\Generator();
$generator->setProtagonist($protagonist);
$generator->setSidekicks($sidekicks);
$generator->setSidekicksFormatter(new \MustBeSanta\Ensemble\SidekicksFormatter());
$text = $generator->execute();
echo $text;
