<?php

/**
* Add the install configuration automatically
* app/config/app.php : service providers & aliases
* app/config/database.php : database configuration
*/

$rootPath = "/vagrant/";

// Define storage_path function
function storage_path($root) {
    return $root .'app/storage';
}

$database = include $rootPath . "app/config/database.php";
$app = include $rootPath . "app/config/app.php";

$sentryProvider = "Cartalyst\Sentry\SentryServiceProvider";
$syntaraProvider = "Mrjuliuss\Syntara\SyntaraServiceProvider";

if(!in_array($sentryProvider, $app['providers'])) {
    $app['providers'][] = $sentryProvider;
}

if(!in_array($syntaraProvider, $app['providers'])) {
    $app['providers'][] = $syntaraProvider;
}

if(!array_key_exists('Sentry', $app['aliases'])) {
    $app['aliases']['Sentry'] = 'Cartalyst\Sentry\Facades\Laravel\Sentry';
}

$app['debug'] = true;

$app['manifest'] = storage_path($rootPath) ."/meta";
$database['connections']['mysql']['database'] = 'syntara';
$database['connections']['mysql']['username'] = 'root';

file_put_contents($rootPath . 'app/config/app.php', '<?php return '.var_export($app, true).';');
file_put_contents($rootPath . 'app/config/database.php', '<?php return '.var_export($database, true).';');