<?php

require_once __DIR__ . '/vendor/autoload.php';

use helpers\Renamer;
use helpers\Zipper;

// Initialize the errors array
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $pluginName = sanitizeInput($_POST["pluginName"]);
    $pluginURL = sanitizeInput($_POST["pluginURL"]);
    $authorName = sanitizeInput($_POST["authorName"]);
    $authorURL = sanitizeInput($_POST["authorURL"]);
    $shortDescription = sanitizeInput($_POST["shortDescription"]);
    $pluginSlug = sanitizeInput($_POST["pluginSlug"]);
    $authorEmail = sanitizeInput($_POST["authorEmail"]);

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

        $zipper->createZip($files);


        // Redirect to a success page
        header("Location: success.php");
        exit();
    }
}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Redirect to the index page with errors and form data
header("Location: index.php?errors=" . urlencode(serialize($errors)) . "&formData=" . urlencode(serialize($_POST)));
exit();
