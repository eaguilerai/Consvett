<!-- 
 Name: index.php
 Description: Defines the index view of the modem_manager model.
 Author: Erasmo Aguilera
 Date: September 29,2014
-->

<div>
    <form method="post" action="<?php echo URL . "/index.php?c=Site&a=refresh_modems" ?>">
        <button type="submit" id="submit">Actualizar módem</button>
    </form>
</div>
<div>
    <form method="post" action="<?php echo URL . "/index.php?c=Site&a=refresh_cameras" ?>">
        <button type="submit" id="submit">Actualizar cámaras</button>
    </form>
</div>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre del sitio</th>
            <th>Tel. módem</th>
            <th>Tel. cámara</th>
            <th>Último estado</th>
            <th>Última foto</th>
        </tr>
    <thead
<tbody>
    <?php
    $i = 1;
    if (isset($model)) {
        foreach ($model as $site) {
            echo <<<EOD
            <tr>
                <td>$i++</td>
                <td>$site->name()</td>
                <td>$site->modem_state_date()</td>
                <td>$site->camera_state_date()</td>
            </tr>
EOD;
        }
    }
    ?>
</tbody>
</table>
