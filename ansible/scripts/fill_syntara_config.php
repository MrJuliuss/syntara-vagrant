<?php

/**
* Add the install configuration automatically
* app/config/app.php : service providers & aliases
* app/config/database.php : database configuration
*/

// Define storage_path function
function storage_path() {
    return 'app/storage/';
}

$database = include "/vagrant/app/config/database.php";
$app = include "/vagrant/app/config/app.php";

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

$app['manifest'] = storage_path() ."/meta";
$database['connections']['mysql']['database'] = 'syntara';
$database['connections']['mysql']['username'] = 'root';

file_put_contents('/vagrant/app/config/app.php', '<?php return '.var_export($app, true).';');
file_put_contents('/vagrant/app/config/database.php', '<?php return '.var_export($database, true).';');
