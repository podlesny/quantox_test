<?php

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
 
$capsule = new Capsule;

$capsule->addConnection([
	'driver'   => 'sqlite',
	'database' => __DIR__.'/database/db.sqlite',
	'prefix'   => '',
]);
 
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
 
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();