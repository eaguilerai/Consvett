<?php

/* Name: device_manager.php
 * Author: Erasmo Aguilera
 * Date: September 29, 20149
 */

namespace consvett\controllers;

require_once 'controller.php';
require_once UTIL_PATH . '/kannel.php';

// Controller class used to perform operations over modems.
class Site extends Controller
{
    // Constructor.
    public function __construct($sites_repository)
    {
        $this->m_sites_repository = $sites_repository;
    }

    // Index action method.
    public function index()
    {
        // Get the list of all sites.
        //$all_sites = $this->all_sites();
        $all_sites = null;
        // Render the list of sites.
        $this->render_view("site", "index", $all_sites);
    }

    // Action method that refreshes the state of all modems which have not
    // reported today.
    public function refresh_modems()
    {
        // Get the list of modems which have not reported today.
        $sites_with_outdated_modems = $this->sites_with_outdated_modem();
        // Request the state of the modems.
        $this->request_modem_state_of($sites_with_outdated_modems);
        // Report the status of the operation.
        $this->render_view("site", "index", $sites_with_outdated_modems);
    }

    // Action method that refreshes the state of all modems which have not
    // reported today.
    public function refresh_cameras()
    {
        // Get the list of modems which have not reported today.
        $sites_with_outdated_camera = $this->sites_with_outdated_camera();
        // Request the state of the modems.
        $this->request_camera_state_of($sites_with_outdated_camera);
        // Report the status of the operation.
        $this->render_view("site", "index", $sites_with_outdated_camera);
    }

    // Gets the value of the sites repository property.
    private function sites_repository()
    {
        return $this->m_sites_repository;
    }
    
    // Returns a list with all sites.
    private function all_sites()
    {
        return $this->sites_repository()->all_sites();
    }

    // Returns all sites whose modem has not reported today.
    private function sites_with_outdated_modem()
    {
        return $this->sites_repository()->sites_with_outdated_modem();
    }

    // Requests the modem state of the specified sites.
    private function request_modem_state_of($sites)
    {
        // Request the modem state in each site.
        $state_cmd = "#P";

        foreach ($sites as $site) {
            \consvett\util\kannel\send_sms($site->modem_phone(), $state_cmd);
        }
    }

    // Returns all sites whose camera has not reported today.
    private function sites_with_outdated_camera()
    {
        return $this->sites_repository()->sites_with_outdated_camera();
    }

    // Requests the camera state of the specified sites.
    private function request_camera_state_of($sites)
    {
        // Request the camera state in each site.
        $state_cmd = "#03#";

        foreach ($sites as $site) {
            \consvett\util\kannel\send_sms($site->camera_phone(), $state_cmd);
        }
    }

    private $m_sites_repository;

}
