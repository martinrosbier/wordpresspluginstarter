<?php

require_once __DIR__ . '/vendor/autoload.php';

use helpers\Renamer;

$renamer = new Renamer('testname');
$files = $renamer->renameFiles();
$renamedFiles = array();

foreach ($files as $file) {
    array_push($renamedFiles,$renamer->renameContent($file));
}

$rename->createZip($renamedFiles);

echo 'test';