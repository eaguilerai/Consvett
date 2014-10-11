<?php

/* Name: sites.php
 * Description: Implements the Sites_repository interface for a MySQL database.
 * Author: Erasmo Aguilera
 * Date: September 30, 2014
 */

namespace consvett\data\mysql;

require_once 'mysql_repository.php';
require_once DATA_PATH . '/site_repository.php';
require_once MODELS_PATH . '/site.php';

class Site extends MySQL_repository implements \consvett\data\Site_repository
{
    public function all_sites()
    {
        // Get the sites with outdated modems from the database.
        $sql = $this->sql_of_all_sites();

        // Convert the database records into site objects.
        $site_list = $this->convert_to_site_objects($sql);

        // Returns the list of site objects.
        return $site_list;
    }

    public function sites_with_outdated_modem()
    {
        // Get the sites with outdated modems from the database.
        $sql = $this->sql_of_sites_with_outdated_modem();

        // Convert the database records into site objects.
        $site_list = $this->convert_to_site_objects($sql);

        // Returns the list of site objects.
        return $site_list;
    }

    public function sites_with_outdated_camera()
    {
        // Get the sites with outdated modems from the database.
        $sql = $this->sql_of_sites_with_outdated_camera();

        // Convert the database records into site objects.
        $site_list = $this->convert_to_site_objects($sql);

        // Returns the list of site objects.
        return $site_list;
    }

    private function sql_of_all_sites()
    {
        return $this->db_handler()->query(<<<'EOD'
                SELECT E.site_id AS "id",
                    E.nombre AS "name",
                    E.telefono AS "modem_phone",
                    E.telefono_camara AS "camera_phone",
                    DATE(E.fultimo_estado) AS "modem_state_date",
                    F.fultima_foto AS "camera_state_date"
                FROM monitoreo.estaciones AS E
                LEFT OUTER JOIN
                (SELECT estacion AS foto_estacion,
                    MAX(fecha) AS fultima_foto
                FROM estacion_fotos
                GROUP BY estacion) AS F
                    ON E.id = F.foto_estacion
                WHERE E.activa = "S" AND E.tipo_estacion IN (4, 8)
                ORDER BY nombre
                LIMIT 50;
EOD
        );
    }

    // Returns a query of the sites with outdated modem.
    private function sql_of_sites_with_outdated_modem()
    {
        return $this->db_handler()->query(<<<'EOD'
                SELECT
                        E.site_id AS "id",
                        E.nombre AS "name",
                        E.telefono AS "modem_phone",
                        E.telefono_camara AS "camera_phone",
                        DATE(E.fultimo_estado) AS "modem_state_date",
                        F.fultima_foto AS "camera_state_date"
                FROM estaciones AS E LEFT OUTER JOIN
                        (SELECT estacion AS foto_estacion,
                                MAX(fecha) AS fultima_foto
                        FROM estacion_fotos
                        GROUP BY estacion) AS F
                                ON E.id = F.foto_estacion
                WHERE E.activa = "S" AND E.tipo_estacion IN (4, 8) AND
                        DATE(E.fultimo_estado) < CURDATE()
                ORDER BY E.fultimo_estado
                DESC
EOD
        );
    }

    // Returns a query of the sites with outdated modem.
    private function sql_of_sites_with_outdated_camera()
    {
        return $this->db_handler()->query(<<<'EOD'
                SELECT
                        E.site_id AS "id",
                        E.nombre AS "name",
                        E.telefono AS "modem_phone",
                        E.telefono_camara AS "camera_phone",
                        DATE(E.fultimo_estado) AS "modem_state_date",
                        F.fultima_foto AS "camera_state_date"
                FROM estaciones AS E LEFT OUTER JOIN
                        (SELECT estacion AS foto_estacion,
                                MAX(fecha) AS fultima_foto
                        FROM estacion_fotos
                        GROUP BY estacion) AS F
                                ON E.id = F.foto_estacion
                WHERE E.activa = "S" AND E.tipo_estacion IN (4, 8) AND
                        DATE(F.fultima_foto) < CURDATE()
                ORDER BY F.fultima_foto
EOD
        );
    }

    // Converts an array of site records into site objects.
    private function convert_to_site_objects($site_records)
    {
        $i = 0;
        $sites_list = array();

        foreach ($site_records as $site) {
            $sites_list[$i] = new \consvett\models\Site(
                    $site['id'],
                    $site['name'],
                    $site['modem_phone'],
                    $site['camera_phone'],
                    $site['modem_state_date'],
                    $site['camera_state_date']);
            $i++;
        }

        return $sites_list;
    }

}
