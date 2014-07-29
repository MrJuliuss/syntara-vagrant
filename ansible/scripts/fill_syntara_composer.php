<?php

$rootPath = "/vagrant/";

$composerJson = file_get_contents($rootPath . 'composer.json');
$composerArray = json_decode($composerJson, true);
$composerArray['require']['mrjuliuss/syntara'] = "1.2.*";

file_put_contents($rootPath . 'composer.json', json_encode($composerArray));