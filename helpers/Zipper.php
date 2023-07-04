<?php

namespace helpers;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use ZipArchive;
use config\Constants;

/**
 * Description of Renamer
 * Classes to update the boilerplate to the new name and slug, and zip the new files to be able to download
 * @author martinrosbier
 */
class Zipper {

    private $pluginName;
    private $defaultDir;

    public function __construct($pluginName) {
        $this->pluginName = $pluginName;
        $this->defaultDir = Constants::DEFAULT_DIR;
    }

    public function deleteDirectory($dir) {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), array('.', '..'));

        foreach ($files as $file) {
            $filePath = $dir . '/' . $file;

            if (is_dir($filePath)) {
                $this->deleteDirectory($filePath);
            } else {
                unlink($filePath);
            }
        }

        rmdir($dir);
    }

    public function createZip(array $files) {
        // Create a new ZipArchive instance
        $zip = new ZipArchive();
        $zipFileName = "./downloads/" . $this->pluginName . '.zip';
        $result = false;

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($files as $filePath) {
                // Get the relative path within the destination directory
                $relativePath = str_replace($this->defaultDir . '/', '', $filePath);

                // Add the file to the zip archive with the relative path
                $zip->addFile($filePath, $relativePath);
            }

            // Save and close the zip archive
            $zip->close();

            foreach ($files as $filePath) {
                unlink($filePath);
            }

            if (is_dir($this->pluginName)) {
                $this->deleteDirectory($this->pluginName);
            }

            $result = true;
        }
        return $result;
    }

}
