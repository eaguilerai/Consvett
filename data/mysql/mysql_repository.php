<?php

/* Name: mysql_repository.php
 * Desscription: Defines a base class for all repositories of a MySQL database.
 * Author: Erasmo Aguilera
 * Date: September 30, 2014
 */

namespace consvett\data\mysql;

abstract class MySQL_repository
{
    public function __construct()
    {
        $dbh = new \PDO('mysql:host=190.4.63.94;dbname=monitoreo', 'eaguilera', 'eaguilera2014');
        $this->set_db_handler($dbh);
    }
    
    protected function db_handler()
    {
        return $this->db_handler;
    }
    
    private function set_db_handler($new_handler)
    {
        $this->db_handler = $new_handler;
    }
    
    private $db_handler;
}
