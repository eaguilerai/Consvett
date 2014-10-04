<?php

/* Name: sites_repository.php
 * Description: Defines a repository interface for sites models.
 * Author: Erasmo Aguilera
 * Date: September 30, 2014
 */

namespace consvett\data;

interface Site_repository
{
    public function sites_with_outdated_modem();
    public function sites_with_outdated_camera();
}
