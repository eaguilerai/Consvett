<?php
// Import configuration.
require "config/config.php";
// Import query string utilities.
require "deps/util/query_string.php";

// Get the URL's query string.
$query_string = $_SERVER['QUERY_STRING'];
// Get the key-value pairs in the query string.
$query_values = query_values($query_string);
// Get the controller name.
$controller_name = $query_values["c"];
// Get the action name
$action_name = $query_values["a"];
// Transfer the request to the controller.
require "controllers/$controller_name.php";
$controller = new $controller_name;
$controller.$action_name();
?>

<html>
    <head></head>
    <body>
        <?php
        echo "Controller = " . $controller_name . "\n" .
        "Action = " . $action_name;
        ?>
    </body>
</html>