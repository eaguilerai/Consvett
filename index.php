<?php
// Import configuration.
require "config/config.php";
// Import query string utilities.
require "util/query_string.php";
// Import MVC utilities.
require "util/mvc.php";

// Get the URL's query string.
$query_string = $_SERVER['QUERY_STRING'];
// Get the key-value pairs in the query string.
$query_values = \consvett\util\query_values($query_string);
// Get the controller name.
$controller_name = $query_values["c"];
// Get the action name
$action_name = $query_values["a"];

// Import de repository.
$repository_path = \consvett\util\mvc\
        repository_path_of($controller_name);
require_once $repository_path;
// Create the repository for the controller.
$repository_name = \consvett\util\mvc\
        repository_qualified_name_of($controller_name);
$repository = new $repository_name($controller_name);

// Import the controller.
$controller_filename = \consvett\util\mvc\
        controller_filename($controller_name);
require_once "controllers/$controller_filename";
// Create the controller.
$controller_qname = \consvett\util\mvc\
        controller_qualified_name_of($controller_name);
$controller = new  $controller_qname($repository);
// Call the action method from the controller.
$controller->$action_name();

/*<html>
    <head></head>
    <body>
        <?php
        echo "Controller = " . $controller_name . "\n" .
        "Action = " . $action_name;
        ?>
    </body>
</html>*/