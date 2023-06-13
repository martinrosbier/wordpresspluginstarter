<?php

require_once __DIR__ . '/vendor/autoload.php';

use helpers\Renamer;

$renamer = new Renamer('test');

$files = $renamer->renameFiles();

foreach ($files as $filePath) {
    $renamer->renameContent($filePath);
}

$renamer->createZip($files);
