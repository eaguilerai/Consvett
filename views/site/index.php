<!-- 
 Name: index.php
 Description: Defines the index view of the modem_manager model.
 Author: Erasmo Aguilera
 Date: September 29,2014
-->

<?php $columns = array('No.', 'Nombre del sitio', 'Último estado', 'Última foto'); ?>

<section>
    <h1>Listado de sitios SVE</h1>
</section>
<div style="display: none">
    <form method="post" action="<?php echo URL . "/index.php?c=Site&a=refresh_modems" ?>">
        <button type="submit" id="refresh_modems">Actualizar módem</button>
    </form>
</div>
<div style="display: none">
    <form method="post" action="<?php echo URL . "/index.php?c=Site&a=refresh_cameras" ?>">
        <button type="submit" id="refresh_cameras">Actualizar cámaras</button>
    </form>
</div>
<section class="btn-group">
    <a id="options-button" class="btn btn-default">Opciones</a>
    <a id="refresh_modems" class="btn btn-default">Actualizar módem</a>
    <a id="refresh_cameras" class="btn btn-default">Actualizar cámaras</a>
</section>
<section>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre del sitio</th>
                <th>Último estado</th>
                <th>Última foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once UTIL_PATH . '/util.php';
            $i = 1;
            //\date.timezone('America/El_Salvador');
            //\date_default_timezone_set('America/El_Salvador');
            $value_of = '\consvett\util\value_of';
            if (isset($model)) {
                foreach ($model as $site) {
                    $modem_state_date = !is_null($site->modem_state_date()) ? $site->modem_state_date()->format('y-m-d') : '';
                    $camera_state_date = !is_null($site->camera_state_date()) ? $site->camera_state_date()->format('y-m-d') : '';

                    echo <<<EOD
            <tr>
                <td>{$i}</td>
                <td>{$site->name()}</td>
                <td>{$modem_state_date}</td>
                <td>{$camera_state_date}</td>
            </tr>
EOD;
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</section>
<div id="options-dialog2" title="Opciones">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#filters" role="tab" data-toggle="tab">Filtros</a></li>
        <li><a href="#columns" role="tab" data-toggle="tab">Columnas</a></li>
    </ul>
    <form>
        <div class="tab-content">
            <div id="filters" class="tab-pane active">
                <button id="add-filter" type="button">Agregar</button>
            </div>
            <div id="columns" class="tab-pane">
                <?php
                foreach ($columns as $col) {
                    echo <<<EOD
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" /> $col
                            </label>
                        </div>
EOD;
                }
                ?>
            </div>
        </div>
    </form>
</div>
<div id="options-dialog" title="Dialog">
    <p>Hello world!</p>
</div>
