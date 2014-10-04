<?php

/* Name: mvc.php
 * Description: Contains methods used to implement an MVC programming model.
 * Author: Erasmo Aguilera
 * Date: September 30, 2014
 */

namespace consvett\util\mvc;

// Returns the qualified name of the specified controller.
function controller_qualified_name_of($controller_name)
{
    $name = '\\consvett\\controllers\\' . $controller_name;
    return $name;
}

// Returns the full path of the file where the specified controller is defined.
function controller_path_of($controller_name)
{
    $path = CONTROLLES_PATH . '/' . controller_filename($controller_name);
    return $path;
}

// Returns the filename on which the specified controller is defined.
function controller_filename($controller_name)
{
    $filename = strtolower($controller_name[0]) . substr($controller_name, 1);
    $filename .= ".php";
    return $filename;
}

// Returns the path of file where the repository used by the specified
// controller is defined.
function repository_path_of($controller_name)
{
    $path = DATA_PATH . '/' . strtolower(DATA_PROVIDER) . '/' . 
            repository_filename_of($controller_name);
    return $path;
}

// Returns the filename of the repository used for the specified controller.
function repository_filename_of($controller_name)
{
    // Convert the first character to lowercase.
    $filename = strtolower($controller_name[0]) . 
            substr($controller_name, 1) . ".php";
    return $filename;
}

// Returns the name of the repository used for the specified controller.
function repository_qualified_name_of($controller_name)
{
    $name = '\\consvett\\data\\' . 
        strtolower(DATA_PROVIDER) . '\\' . $controller_name;
    return $name;
}

function require_controller($controller_name)
{
    require CONTROLLERS_PATH . "/$controller_name";
}

function require_view($view_name)
{
    
}