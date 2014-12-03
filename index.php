#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$generate = new MustBeSanta\Generator();
echo $generate->execute();
