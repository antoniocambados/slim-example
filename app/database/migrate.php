<?php

$migrationsDirectory = __DIR__.'/migrations';

// Execute all the migrations
foreach (scandir($migrationsDirectory) as $filename) {
		$path = $migrationsDirectory.'/'.$filename;
		if (is_file($path) && strcasecmp(__FILE__, $path) != 0) {
			echo "Executing migration \"$path\"...";
			require $path;
			echo " Done.\n";
		}
}