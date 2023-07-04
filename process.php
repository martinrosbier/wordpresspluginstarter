<?php

require_once __DIR__ . '/vendor/autoload.php';

use helpers\Renamer;
use helpers\Zipper;
use helpers\Sanitizer;

// Initialize the errors array
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $pluginName = Sanitizer::sanitize($_POST["pluginName"]);
    $pluginURL = Sanitizer::sanitize($_POST["pluginURL"]);
    $authorName = Sanitizer::sanitize($_POST["authorName"]);
    $authorURL = Sanitizer::sanitize($_POST["authorURL"]);
    $shortDescription = Sanitizer::sanitize($_POST["shortDescription"]);
    $pluginSlug = Sanitizer::sanitize($_POST["pluginSlug"]);
    $authorEmail = Sanitizer::sanitize($_POST["authorEmail"]);

    // Validate the form data
    // Validate Plugin Name: Avoid spaces or symbols
    if (!preg_match('/^[a-zA-Z0-9\s\-]+$/', $pluginName)) {
        $errors["pluginName"] = "Plugin Name should not contain spaces or symbols.";
    }

    // Validate Plugin URL: Should start with "https://"
    if (!preg_match('/^(https?:\/\/).+/', $pluginURL)) {
        $errors["pluginURL"] = "Plugin URL should start with 'https://' and include the full address.";
    }

    // Validate Author URL: Should start with "https://"
    if (!preg_match('/^(https?:\/\/).+/', $authorURL)) {
        $errors["authorURL"] = "Author URL should start with 'https://' and include the complete address.";
    }

    // Validate Plugin Slug: All lowercase, without spaces or symbols (except hyphens)
    if (!preg_match('/^[a-z0-9\-]+$/', $pluginSlug)) {
        $errors["pluginSlug"] = "Plugin Slug should be all lowercase without spaces or symbols (except hyphens).";
    }

    // Validate Author Email: Should be in the correct email format
    if (!filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
        $errors["authorEmail"] = "Enter a valid email address.";
    }

    // If there are no errors, process the form data
    if (empty($errors)) {

        $renamer = new Renamer($pluginSlug, $pluginURL, $authorName, $authorURL, $shortDescription, $authorEmail, $pluginName);
        $zipper = new Zipper($pluginSlug);

        $files = $renamer->renameFiles();

        foreach ($files as $filePath) {
            $renamer->renameContent($filePath);
        }
        if ($zipper->createZip($files)) {
            // Redirect to a success page
            header("Location: success.php?fn=". $pluginSlug);
        } 
    } else {
            header("Location: index.php?errors=" . urlencode(serialize($errors)) . "&formData=" . urlencode(serialize($_POST)));
            
        }
}