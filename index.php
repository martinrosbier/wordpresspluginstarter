<!DOCTYPE html>
<html>
<head>
  <title>WordPress Plugin Starter</title>
  <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body>

  <div class="container">
    <h1>WordPress Plugin Starter</h1>
    
    <p>
      This is an open-source project of WordPress, PHP, Bootstrap, and JavaScript.
    </p>
    
    <p>
      Repository: <a href="https://github.com/martinrosbier/wordpresspluginstarter">github.com/martinrosbier/wordpresspluginstarter</a>
    </p>
    
    <h2>Description</h2>
    
    <p>
      This project is built upon the WordPress Plugin Boilerplate, providing a standardized, organized, and object-oriented foundation for developing high-quality WordPress plugins. It offers the flexibility to customize the boilerplate according to your needs, automatically renaming classes and files for seamless integration into your WordPress plugins folder.
    </p>
    
    
    <p>Please fill out the form below to generate a zip file with your plugin:</p>
    
    <form action="process-form.php" method="POST">
      <div class="form-group">
        <label for="pluginName">Plugin Name</label>
        <input type="text" class="form-control" id="pluginName" name="pluginName" required>
      </div>
      
      <div class="form-group">
        <label for="pluginURL">Plugin URL (HTTPS)</label>
        <input type="url" class="form-control" id="pluginURL" name="pluginURL" required>
      </div>
      
      <div class="form-group">
        <label for="authorName">Author Name</label>
        <input type="text" class="form-control" id="authorName" name="authorName" required>
      </div>
      
      <div class="form-group">
        <label for="authorURL">Author URL (HTTPS)</label>
        <input type="url" class="form-control" id="authorURL" name="authorURL" required>
      </div>
      
      <div class="form-group">
        <label for="shortDescription">Plugin Short Description</label>
        <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3" required></textarea>
      </div>
      
      <div class="form-group">
        <label for="pluginSlug">Plugin Slug</label>
        <input type="text" class="form-control" id="pluginSlug" name="pluginSlug" required>
      </div>
      
      <div class="form-group">
        <label for="authorEmail">Author Email</label>
        <input type="email" class="form-control" id="authorEmail" name="authorEmail" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Generate Zip File</button>
    </form>
    
    
    <h2>Contents</h2>
    
    <ul>
      <li><code>plugin-name</code> directory: Contains the source code - a fully executable WordPress plugin.</li>
    </ul>
    
    <h2>Features</h2>
    
    <ul>
      <li>The Boilerplate is based on the <a href="http://codex.wordpress.org/Plugin_API">Plugin API</a>, <a href="http://codex.wordpress.org/WordPress_Coding_Standards">Coding Standards</a>, and <a href="https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/">Documentation Standards</a>.</li>
      <li>All classes, functions, and variables are documented so that you know what you need to change.</li>
      <li>The Boilerplate uses a strict file organization scheme that corresponds both to the WordPress Plugin Repository structure and makes it easy to organize the files that compose the plugin.</li>
      <li>The project includes a <code>.pot</code> file as a starting point for internationalization.</li>
    </ul>
    
    <h2>Installation</h2>
    
    <p>
      The Boilerplate can be installed directly into your plugins folder "as-is". It's safe to activate the plugin at this point. Because the Boilerplate has no real functionality, there will be no menu items, meta boxes, or custom post types added until you write the code.
    </p>
    
    <h2>License</h2>
    
    <p>
      The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.
    </p>
    
    <blockquote>
      <p>
        This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.
      </p>
      <p>
        This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
      </p>
      <p>
        You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
      </p>
    </blockquote>
    
    <p>
      A copy of the license is included in the root of the plugin’s directory. The file is named <code>LICENSE</code>.
    </p>
       
    <h3>Includes</h3>
    
    <p>
      Note that if you include your own classes or third-party libraries, there are three locations in which said files may go:
    </p>
    
    <ul>
      <li><code>plugin-name/includes</code>: Functionality shared between the admin area and the public-facing parts of the site reside.</li>
      <li><code>plugin-name/admin</code>: All admin-specific functionality.</li>
      <li><code>plugin-name/public</code>: All public-facing functionality.</li>
    </ul>
    
    <p>
      Note that previous versions of the Boilerplate did not include <code>Plugin_Name_Loader</code>, but this class is used to register all filters and actions with WordPress. The example code provided shows how to register your hooks with the Loader class.
    </p>
    
    <h2>Credits</h2>
    
    <p>
      The WordPress Plugin Starter was developed and is maintained by <a href="https://www.linkedin.com/in/martinrosbier/">Martin Rosbier</a>.
    </p>
    
    <p>
      The WordPress Plugin Boilerplate was started in 2011 by <a href="http://twitter.com/tommcfarlin/">Tom McFarlin</a> and has since included a number of great contributions. In March of 2015, the project was handed over by Tom to Devin Vinson.
    </p>
    
  </div>

<script src="vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
