<?php

require_once __DIR__ . '/vendor/autoload.php';

use helpers\Renamer;
use helpers\Zipper;

$pluginName = 'test234';

$renamer = new Renamer($pluginName);
$zipper = new Zipper($pluginName);

$files = $renamer->renameFiles();

foreach ($files as $filePath) {
    $renamer->renameContent($filePath);
}

$zipper->createZip($files);