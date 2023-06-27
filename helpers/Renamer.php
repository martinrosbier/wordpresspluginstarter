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
        $this->defaultName_ = Constants::DEFAULT_NAME_;
        $this->defaultNamePackage = Constants::DEFAULT_NAME_PACKAGE;

        $this->defaultDir = Constants::DEFAULT_DIR;
    }

    public function renameFiles() {

        // Create an iterator to iterate through the files and subdirectories
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->defaultDir));

        // Create an array to store files for later zipping
        $files = array();

        // Iterate through each item
        foreach ($iterator as $item) {
            if ($item->isFile()) {
                // Get the relative path of the file
                $relativePath = $iterator->getSubPathname();

                // Replace "plugin_name" with $pluginName
                $newFileName = str_replace("src/" . $this->defaultName, $this->pluginName, $this->defaultDir) . "/" . str_replace($this->defaultName, $this->pluginName, str_replace("\\", "/", $relativePath));

                array_push($files, $newFileName);

                // Create the directory in the destination folder if it doesn't exist
                $destFilePath = './' . dirname($newFileName);

                if (!is_dir($destFilePath)) {
                    mkdir($destFilePath, 0777, true);
                }

                // Copy the file to the destination directory with the modified name
                try {
                    $filePath = $this->defaultDir . '/' . $relativePath;
                    if (file_exists($filePath)) {
                        copy($filePath, $newFileName);
                    } else {
                        echo "File does not exist.";
                    }
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
        $modifiedContent = str_replace($this->defaultName_, $this->pluginName, $modifiedContent);
        $modifiedContent = str_replace($this->defaultNamePackage, ucfirst($this->pluginName), $modifiedContent);

        // Write the modified content back to the file
        file_put_contents($filePath, $modifiedContent);
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

            echo 'Files renamed and copied to the destination directory, and zip file created successfully. <a href="' . $zipFileName . '">Download</a>';
        } else {
            echo 'Failed to create the zip file.';
        }
    }

}
