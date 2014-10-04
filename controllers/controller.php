<?php

/*
 * Name: controller.php
 * Author: Erasmo Aguilera
 * Date. September 29, 2014
 */

namespace consvett\controllers;

// Base class of all controller classes.
class Controller
{

    public function render_view($model_name, $view_name, $model = null)
    {
        // Update the content model.
        $content_model = $model_name;
        // Update the content view.
        $content_view = $view_name;
        // Render the view of the model.
        require VIEWS_PATH . "/_layout.php";
    }
}
