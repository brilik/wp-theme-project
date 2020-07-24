<?php

define('TXTDOMAIN', 'it-decision');
define('VIEWS_DIR', get_template_directory() . '/inc/view/');

include_once 'inc/custom_functions.php';
include_once 'inc/Assets.php';
include_once 'inc/widget/RegisterWidgets.php';
include_once 'inc/CustomPostType/CustomPostType.php';

Assets::init();
RegisterWidgets::init();
CustomPostType::init();