<?php
require_once 'config/Constants.php';

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Renamer
 * Classes to update the boilerplat to the new name and slug, and zip the new files to be able to download
 * @author martinrosbier
 */

class Renamer
{

    private $pluginName;

    public function __construct($pluginName)
    {
        $this->pluginName = $pluginName;
    }

    public function renameFiles($newPluginName = $this->pluginName )
    {
            // Create an iterator to iterate through the files and subdirectories
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DEFAULT_DIR));
            
            // Create an array to zip files later
            $files = array();
            
            // Iterate through each item
            foreach ($iterator as $item) {
                if ($item->isFile()) {
                    // Get the relative path of the file
                    $relativePath = $iterator->getSubPathname();

                    // Replace "plugin_name" with $pluginName in the file name
                    $newFileName = str_replace('plugin_name', $$newPluginName, $relativePath);
                    
                    array_push($files, $newFileName);

                    // Create the directory in the destination folder if it doesn't exist
                    $destFilePath =  '/' . dirname($newFileName);
                    if (!is_dir($destFilePath)) {
                        mkdir($destFilePath, 0777, true);
                    }

                    // Copy the file to the destination directory with the modified name
                    try {
                        copy(DEFAULT_DIR . '/' . $relativePath, '/' . $newFileName);
                    } catch (Exception $e) {
                        echo $e;
                    }
                }
                
            }
            
            return $files;
    }
    
    public function renameContent($filePath, $newPluginName = $this->pluginName )
    {
        // Read the file content
        $content = file_get_contents($filePath);
        
        // Modify the content as needed
        $modifiedContent = str_replace(DEFAULT_NAME, $newPluginName, $content);
        
        // Write the modified content back to the file
        file_put_contents($filePath, $modifiedContent);
    }
    
    public function CreateZip(array $files, $newPluginName = $this->pluginName )
    {
        // Create a new ZipArchive instance
        $zip = new ZipArchive();
        $zipFileName = $newPluginName + '.zip';
        
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
          
            foreach ($files as $item) {
                if ($item->isFile()) {
         
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