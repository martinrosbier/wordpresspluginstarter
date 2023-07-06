# WordPress Plugin Starter

The WordPress Plugin Starter is a powerful tool designed to simplify the process of creating custom WordPress plugins.
With this project, you can generate a blank plugin file customized with your plugin's name, description, author information, and other essential details.
This customizable plugin file serves as a starting point for developing unique WordPress plugins tailored to your specific needs.

This project is built upon the WordPress Plugin Boilerplate (https://github.com/DevinVinson/WordPress-Plugin-Boilerplate/tree/master), providing a standardized, organized, and object-oriented foundation for developing high-quality WordPress plugins. It offers the flexibility to customize the boilerplate according to your needs, automatically renaming classes and files for seamless integration into your WordPress plugins folder.

## Contents

The WordPress Plugin Boilerplate includes the following files:

- `.gitignore`. Used to exclude certain files from the repository.
- `CHANGELOG.md`. The list of changes to the core project.
- `README.md`. The file that you’re currently reading.
- A `plugin-name` directory that contains the source code - a fully executable WordPress plugin.

## Features

- The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards), and [Documentation Standards](https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/).
- All classes, functions, and variables are documented so that you know what you need to change.
- The Boilerplate uses a strict file organization scheme that corresponds both to the WordPress Plugin Repository structure, and that makes it easy to organize the files that compose the plugin.
- The project includes a `.pot` file as a starting point for internationalization.

## Installation

The Boilerplate can be installed directly into your plugins folder "as-is".

It's safe to activate the plugin at this point. Because the Boilerplate has no real functionality there will be no menu items, meta boxes, or custom post types added until you write the code.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

> You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

A copy of the license is included in the root of the plugin’s directory. The file is named `LICENSE`.

## Important Notes

### Licensing

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later; however, if you opt to use third-party code that is not compatible with v2, then you may need to switch to using code that is GPL v3 compatible.

For reference, [here's a discussion](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/) that covers the Apache 2.0 License used by [Bootstrap](http://twitter.github.io/bootstrap/).

### Includes

Note that if you include your own classes, or third-party libraries, there are three locations in which said files may go:

- `plugin-name/includes` is where functionality shared between the admin area and the public-facing parts of the site reside
- `plugin-name/admin` is for all admin-specific functionality
- `plugin-name/public` is for all public-facing functionality

Note that previous versions of the Boilerplate did not include `Plugin_Name_Loader` but this class is used to register all filters and actions with WordPress.

The example code provided shows how to register your hooks with the Loader class.

# Credits

The WordPress Plugin Starter was developed and is maintained by [Martin Rosbier](https://www.linkedin.com/in/martinrosbier/).

The WordPress Plugin Boilerplate was started in 2011 by [Tom McFarlin](http://twitter.com/tommcfarlin/) and has since included a number of great contributions. In March of 2015 the project was handed over by Tom to Devin Vinson.

The current version of the Boilerplate was developed in conjunction with [Josh Eaton](https://twitter.com/jjeaton), [Ulrich Pogson](https://twitter.com/grapplerulrich), and [Brad Vincent](https://twitter.com/themergency).

The homepage is based on a design as provided by [HTML5Up](http://html5up.net), the Boilerplate logo was designed by Rob McCaskill of [BungaWeb](http://bungaweb.com), and the site `favicon` was created by [Mickey Kay](https://twitter.com/McGuive7).
