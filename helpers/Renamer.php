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
class Renamer {

    private $pluginName;
    private $defaultName;
    private $defaultDir;

    public function __construct($pluginName) {
        $this->pluginName = $pluginName;
        $this->defaultName = Constants::DEFAULT_NAME;
        $this->defaultDir = Constants::DEFAULT_DIR;
    }

    public function renameFiles() {

        // Create an iterator to iterate through the files and subdirectories
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->defaultDir));

        // Create an array to zip files later
        $files = array();

        // Iterate through each item
        foreach ($iterator as $item) {
            if ($item->isFile()) {
                // Get the relative path of the file
                $relativePath = $iterator->getSubPathname();

                // Replace "plugin_name" with $pluginName in the file name
                $newFileName = str_replace('plugin_name', $this->pluginName, $relativePath);

                array_push($files, $newFileName);

                // Create the directory in the destination folder if it doesn't exist
                $destFilePath = '/' . dirname($newFileName);
                if (!is_dir($destFilePath)) {
                    mkdir($destFilePath, 0777, true);
                }

                // Copy the file to the destination directory with the modified name
                try {
                    copy($this->defaultDir . '/' . $relativePath, '/' . $newFileName);
                } catch (Exception $e) {
                    echo $e;
                }
            }
        }

        return $files;
    }

    public function renameContent($filePath) {
        // Read the file content
        $content = file_get_contents($filePath);

        // Modify the content as needed
        $modifiedContent = str_replace($this->defaultName, $this->pluginName, $content);

        // Write the modified content back to the file
        file_put_contents($filePath, $modifiedContent);
    }

    public function createZip(array $files) {
        // Create a new ZipArchive instance
        $zip = new ZipArchive();
        $zipFileName = $this->pluginName . '.zip';

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {

            foreach ($files as $item) {
                if ($item->isFile()) {

                    // Add the copied file to the zip archive
                    $zip->addFile($item, $item);
                }
            }

            // Save and close the zip archive
            $zip->close();

            echo 'Files renamed and copied to the destination directory, and zip file created successfully.';
        } else {
            echo 'Failed to create the zip file.';
        }
    }

}
