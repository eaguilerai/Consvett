<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php $title ?></title>
        <!-- Bootstrap -->        
        <link rel="stylesheet" href="<?php echo BOOTSTRAP_CSS ?>" />
        <script type="text/javascript" src="<?php echo BOOTSTRAP_JS ?>"></script>
        <!-- JQuery -->
        <script src="<?php echo JQUERY_CORE_JS ?>"></script>
        <link rel="stylesheet" href="<?php echo JQUERY_UI_CSS ?>" />
        <script src="<?php echo JQUERY_UI_JS ?>"></script>
        
        <link rel="stylesheet" href="<?php echo URL . '/deps/css/global.css' ?>" />
        <?php
        // Append the content-view's head, if it exists.
        if (isset($content_model) && isset($content_view)) {
            $head_file = VIEWS_PATH . "/$content_model/$content_view" . '_head.php';

            if (\file_exists($head_file)) {
                require $head_file;
            }
        }
        ?>
    </head>
    <body>
        <div class="container">
            <?php
            // Append the content-view's body, if it exists.
            if (isset($content_model) && isset($content_view)) {
                $body_file = VIEWS_PATH . "/$content_model/$content_view.php";

                if (\file_exists($body_file)) {
                    require $body_file;
                }
            }
            ?>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
