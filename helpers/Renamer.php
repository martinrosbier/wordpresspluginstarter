<?php
require_once 'config/Constants.php';

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of FileRenamer
 *
 * @author martinrosbier
 */
class FileRenamer {
    
    private $pluginName;
   
    public function __construct($pluginName) {
        $this->pluginName = $pluginName;
    }
    
    public function renameFilesAndCreateZip() {
        // Create a new ZipArchive instance    
        $zip = new ZipArchive();
        $zipFileName = $this->pluginName+'.zip';

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            // Create an iterator to iterate through the files and subdirectories
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DEFAULT_DIR));

            // Iterate through each item
            foreach ($iterator as $item) {
                if ($item->isFile()) {
                    // Get the relative path of the file
                    $relativePath = $iterator->getSubPathname();

                    // Replace "plugin_name" with $pluginName in the file name
                    $newFileName = str_replace('plugin_name', $this->pluginName, $relativePath);

                    // Create the directory in the destination folder if it doesn't exist
                    $destFilePath =  '/' . dirname($newFileName);
                    if (!is_dir($destFilePath)) {
                        mkdir($destFilePath, 0777, true);
                    }

                    // Copy the file to the destination directory with the modified name
                    copy(DEFAULT_DIR . '/' . $relativePath, '/' . $newFileName);

                    // Add the copied file to the zip archive
                    $zip->addFile($newFileName, $newFileName);
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
