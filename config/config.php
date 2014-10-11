<?php

define('HOST', '127.0.0.1');
define('URL', 'http://' . HOST . '/consvett');
define('SYSTEM_ROOT', 'C:');
define('HOME', SYSTEM_ROOT . '/inetpub/wwwroot/consvett');
define('VIEWS_PATH', HOME . '/views');
define('CONTROLLERS_PATH', HOME . '/controllers');
define('MODELS_PATH', HOME . '/models');
define('UTIL_PATH', HOME . '/util');
define('DATA_PROVIDER', 'MySQL');
define('DATA_PATH', HOME . '/data');

// Bootstrap
define('BOOTSRAP_VER', '3.2.0');
define('BOOTSTRAP_CSS', URL . '/deps/bootstrap/' . BOOTSRAP_VER . '/css/bootstrap.min.css');
define('BOOTSTRAP_JS', URL . '/deps/bootstrap/' . BOOTSRAP_VER . '/js/bootstrap.min.js');

// JQuery
define('JQUERY_DIR', URL . '/deps/jquery');
define('JQUERY_CORE_VER', '2.1.1');
define('JQUERY_CORE_DIR', JQUERY_DIR . '/core/' . JQUERY_CORE_VER);
define('JQUERY_CORE_JS', JQUERY_CORE_DIR . '/jquery-core.min.js');
define('JQUERY_UI_VER', '1.11.1');
define('JQUERY_UI_DIR', JQUERY_DIR . '/ui/' . JQUERY_UI_VER);
define('JQUERY_UI_CSS', JQUERY_UI_DIR . '/jquery-ui.min.css');
define('JQUERY_UI_JS', JQUERY_UI_DIR . '/jquery-ui.min.js');
