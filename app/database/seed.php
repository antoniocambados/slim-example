<?php

$seedsDirectory = __DIR__.'/seeds';

// Seed files, in order of execution
$seeds = array(
	'profiles',
	'categories',
	'projects',
);

// Execute all the migrations
foreach ($seeds as $seed) {
	echo "Executing seed \"$seed\"...";
	require $seedsDirectory.'/'.$seed.'.php';
	echo " Done.\n";
}