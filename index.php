<?php include 'layout/header.php'; ?>
<div class="col-md-6 column">
    <?php
// Retrieve errors and form data from the URL
    $errors = isset($_GET['errors']) ? unserialize(urldecode($_GET['errors'])) : [];

    $formData = isset($_GET['formData']) ? unserialize(urldecode($_GET['formData'])) : [];
// Display errors if any
    if (!empty($errors)) {
        echo '<div class="alert alert-danger" role="alert">';
        foreach ($errors as $error) {
            echo "<p><strong>Error</strong>: $error</p>";
        }
        echo '</div>';
    }
    ?>
    <h4>Form</h4>
    <p class="instructions">Please fill out the form below to generate a zip file with your WordPress plugin. Make sure to provide accurate and valid information for each field.</p>

    <form action="process.php" method="POST">
        <div class="form-group">
            <label for="pluginName">Plugin Name</label>
            <input type="text" class="form-control" id="pluginName" name="pluginName" required value="<?php echo $formData['pluginName'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="pluginURL">Plugin URL (HTTPS)</label>
            <input type="url" class="form-control" id="pluginURL" name="pluginURL" required value="<?php echo $formData['pluginURL'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="authorName">Author Name</label>
            <input type="text" class="form-control" id="authorName" name="authorName" required value="<?php echo $formData['authorName'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="authorURL">Author URL (HTTPS)</label>
            <input type="url" class="form-control" id="authorURL" name="authorURL" required value="<?php echo $formData['authorURL'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="shortDescription">Plugin Short Description</label>
            <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3" required><?php echo $formData['shortDescription'] ?? ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="pluginSlug">Plugin Slug</label>
            <input type="text" class="form-control" id="pluginSlug" name="pluginSlug" required value="<?php echo $formData['pluginSlug'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="authorEmail">Author Email</label>
            <input type="email" class="form-control" id="authorEmail" name="authorEmail" required value="<?php echo $formData['authorEmail'] ?? ''; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Generate Zip File</button>
    </form>

</div>

<div class="col-md-6 column instructions">

    <div class="row justify-content-end">
        <div class="col-md-8">

            <h5>Instructions</h5>

            <div class="form-group">
                <label for="pluginName">Plugin Name</label>
                <p class="text-muted">Enter a name for your plugin.</p>
            </div>

            <div class="form-group">
                <label for="pluginURL">Plugin URL</label>
                <p class="text-muted">Provide the URL of your plugin's website. Make sure it starts with "https://" and includes the full address.</p>
            </div>

            <div class="form-group">
                <label for="authorName">Author Name</label>
                <p class="text-muted">Enter your name as the plugin author.</p>
            </div>

            <div class="form-group">
                <label for="authorURL">Author URL</label>
                <p class="text-muted">Provide the URL of your personal website or portfolio. Ensure it starts with "https://" and includes the complete address.</p>
            </div>

            <div class="form-group">
                <label for="shortDescription">Plugin Short Description</label>
                <p class="text-muted">Write a brief description of your plugin's functionality. Please keep it concise and informative.</p>
            </div>

            <div class="form-group">
                <label for="pluginSlug">Plugin Slug</label>
                <p class="text-muted">Enter a unique identifier for your plugin. The slug should be all lowercase, without spaces or symbols. You can use hyphens to separate words.</p>
            </div>

            <div class="form-group">
                <label for="authorEmail">Author Email</label>
                <p class="text-muted">Enter your email address. Make sure it is in the correct format (e.g., name@example.com).</p>
            </div>

            <div class="alert alert-info">
                <p>
                    Once you have filled in all the fields, click the "Generate Zip File" button to generate your plugin's zip file.
                </p>
            </div>
        </div>
    </div>



</div>

<?php
include './layout/footer.php';
