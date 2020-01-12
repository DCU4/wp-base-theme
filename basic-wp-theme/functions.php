<?php

require_once locate_template('/functions/enqueue.php');
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/navmenus.php');
require_once locate_template('/functions/post-types.php');
require_once locate_template('/functions/helpers.php');
require_once locate_template('/functions/widgets.php');
require_once locate_template('/functions/image-sizes.php');

add_filter('show_admin_bar', '__return_false');
