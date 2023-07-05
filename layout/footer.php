<div class="col-md-12 column readme">
    <h2>Contents</h2>

    <ul>
        <li><code>plugin-name</code> directory: Contains the source code - a fully executable WordPress plugin.</li>
    </ul>

    <h2>Features</h2>

    <ul>
        <li>The Boilerplate is based on the <a href="http://codex.wordpress.org/Plugin_API">Plugin API</a>, <a href="http://codex.wordpress.org/WordPress_Coding_Standards">Coding Standards</a>, and <a href="https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/">Documentation
                Standards</a>.</li>
        <li>All classes, functions, and variables are documented so that you know what you need to change.</li>
        <li>The Boilerplate uses a strict file organization scheme that corresponds both to the WordPress Plugin
            Repository structure and makes it easy to organize the files that compose the plugin.</li>
        <li>The project includes a <code>.pot</code> file as a starting point for internationalization.</li>
    </ul>

    <h2>Installation</h2>

    <p>
        The Boilerplate can be installed directly into your plugins folder "as-is". It's safe to activate the plugin at
        this point. Because the Boilerplate has no real functionality, there will be no menu items, meta boxes, or
        custom post types added until you write the code.
    </p>

    <h2>License</h2>

    <p>
        The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.
    </p>

    <blockquote>
        <p>
            This program is free software; you can redistribute it and/or modify it under the terms of the GNU General
            Public License, version 2, as published by the Free Software Foundation.
        </p>
        <p>
            This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the
            implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
            for more details.
        </p>
        <p>
            You should have received a copy of the GNU General Public License along with this program; if not, write to
            the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
        </p>
    </blockquote>

    <p>
        A copy of the license is included in the root of the plugin’s directory. The file is named <code>LICENSE</code>.
    </p>

    <h3>Includes</h3>

    <p>
        Note that if you include your own classes or third-party libraries, there are three locations in which said
        files may go:
    </p>

    <ul>
        <li><code>plugin-name/includes</code>: Functionality shared between the admin area and the public-facing parts
            of the site reside.</li>
        <li><code>plugin-name/admin</code>: All admin-specific functionality.</li>
        <li><code>plugin-name/public</code>: All public-facing functionality.</li>
    </ul>

    <p>
        Note that previous versions of the Boilerplate did not include <code>Plugin_Name_Loader</code>, but this class
        is used to register all filters and actions with WordPress. The example code provided shows how to register your
        hooks with the Loader class.
    </p>

    <h2>Credits</h2>

    <p>
        The WordPress Plugin Starter was developed and is maintained by <a href="https://www.linkedin.com/in/martinrosbier/">Martin Rosbier</a>.
    </p>

    <p>
        The WordPress Plugin Boilerplate was started in 2011 by <a href="http://twitter.com/tommcfarlin/">Tom
            McFarlin</a> and has since included a number of great contributions. In March of 2015, the project was
        handed over by Tom to Devin Vinson.
    </p>

    <div class="contact-info">
        <h1>Contact Information</h1>
        <p>
            If you have any inquiries or would like to discuss a project, feel free to reach out to me.
        </p>
        <ul>
            <li>Email: info (at) martinrosbier.com.ar</li>
            <li>LinkedIn: <a href="https://www.linkedin.com/in/martinrosbier/">LinkedIn Profile</a></li>
        </ul>
    </div>

</div>
</div>
</div>

<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/validation.js"></script>
</body>

</html>