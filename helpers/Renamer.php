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

    private $pluginSlug;
    private $pluginURL;
    private $authorName;
    private $authorURL;
    private $shortDescription;
    private $authorEmail;
    private $pluginName;
    private $defaultSlug;
    private $defaultDir;
    private $defaultName;
    private $defaultNameUpper;

    public function __construct($pluginSlug, $pluginURL, $authorName, $authorURL, $shortDescription, $authorEmail, $pluginName) {
        $this->pluginSlug = $pluginSlug;
        $this->pluginURL = $pluginURL;
        $this->authorName = $authorName;
        $this->authorURL = $authorURL;
        $this->shortDescription = $shortDescription;
        $this->authorEmail = $authorEmail;
        $this->pluginName = $pluginName;

        $this->defaultSlug = Constants::DEFAULT_SLUG;
        $this->defaultSlug_ = Constants::DEFAULT_SLUG_;
        $this->defaultSlugPackage = Constants::DEFAULT_SLUG_PACKAGE;

        $this->defaultDir = Constants::DEFAULT_DIR;

        $this->defaultURL = Constants::DEFAULT_URL;
        $this->defaultAuthorName = Constants::DEFAULT_AUTHOR_NAME;
        $this->defaultAuthorURL = Constants::DEFAULT_AUTHOR_URL;
        $this->defaultDescription = Constants::DEFAULT_DESCRIPTION;
        $this->defaultEmail = Constants::DEFAULT_EMAIL;
        $this->defaultName = Constants::DEFAULT_NAME;
        $this->defaultNameUpper = Constants::DEFAULT_NAME_UPPER;
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

                // Replace "plugin_name" with $pluginSlug
                $newFileName = str_replace("src/" . $this->defaultSlug, $this->pluginSlug, $this->defaultDir) . "/" . str_replace($this->defaultSlug, $this->pluginSlug, str_replace("\\", "/", $relativePath));

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
        $modifiedContent = str_replace($this->defaultSlug, $this->pluginSlug, $content);
        $modifiedContent = str_replace($this->defaultSlug_, $this->pluginSlug, $modifiedContent);
        $modifiedContent = str_replace($this->defaultSlugPackage, ucfirst($this->pluginSlug), $modifiedContent);

        $modifiedContent = str_replace($this->defaultURL, $this->pluginURL, $modifiedContent);
        $modifiedContent = str_replace($this->defaultAuthorName, $this->authorName, $modifiedContent);
        $modifiedContent = str_replace($this->defaultAuthorURL, $this->authorURL, $modifiedContent);
        $modifiedContent = str_replace($this->defaultDescription, $this->shortDescription, $modifiedContent);
        $modifiedContent = str_replace($this->defaultEmail, $this->authorEmail, $modifiedContent);
        $modifiedContent = str_replace($this->defaultNameUpper, strtoupper($this->pluginSlug), $modifiedContent);
        $modifiedContent = str_replace($this->defaultName, $this->pluginName, $modifiedContent);

        // Write the modified content back to the file
        file_put_contents($filePath, $modifiedContent);
    }

}
