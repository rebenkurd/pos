<?php


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'POS');

define('INCLUDES_PATH', SITE_ROOT . DS . 'includes');

define("ASSETS_PATH",'assets');


define('CLASS_PATH', SITE_ROOT . DS . 'class');


// require_once('functions.php');
require_once('connection.php');
require_once(CLASS_PATH.DS.'Database.php');
require_once(CLASS_PATH.DS.'DbObject.php');
require_once(CLASS_PATH.DS.'User.php');
require_once(CLASS_PATH.DS.'Role.php');
require_once(CLASS_PATH.DS.'Category.php');
require_once(CLASS_PATH.DS.'Brand.php');
require_once(CLASS_PATH.DS.'Custom.php');



?>