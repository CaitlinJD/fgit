<?php

/* Plugin Name: Register Post Types

Plugin URI: http://wordpress.org/extend/plugins/test/
Version: 0.1
Author: caitlin dyk
Description: a plugin to create custom post types
Text Domain: test
License: GPLv3

*/

class my_plugin {
    public function __construct(){
        add_action("init", array($this, "init"), 110);
    }

    public function init() {
        include("post-types.php");
    }
}

new my_plugin;