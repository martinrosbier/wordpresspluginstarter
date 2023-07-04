<?php
require_once __DIR__ . '/vendor/autoload.php';

include 'layout/header.php';

use helpers\Sanitizer;
?>
<div class="col-md-12 column">

    <div class="jumbotron">
        <p class="display-4">Plugin created successfully</p>
        <p class="lead">The files have been renamed and copied to the destination directory, and a ZIP file has been generated.</p>
        <hr class="my-4">
        <p>To download your plugin, please click the button below:</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="./downloads/' . Sanitizer::sanitize($_GET['fn']) . '.zip" role="button">Download</a>
        </p>
    </div>


</div>
<?php
include 'layout/footer.php';
?>