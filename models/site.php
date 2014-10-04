<?php

/* Name: site.php
 * Description: Defines the site model class.
 * Author: Erasmo Aguilera
 * Date: September 30, 2014
 */

namespace consvett\models;

class Site
{
    public function __construct(
            $id,
            $name,
            $modem_phone,
            $camera_phone,
            $modem_state_date,
            $camera_state_date)
    {
        $this->set_id($id);
        $this->set_name($name);
        $this->set_modem_phone($modem_phone);
        $this->set_camera_phone($camera_phone);
        $this->modem_state_date($modem_state_date);
        $this->camera_state_date($camera_state_date);
    }
    
    public function id()
    {
        return $this->m_id;
    }
    
    public function name()
    {
        return $this->m_name;
    }
    
    public function modem_phone()
    {
        return $this->m_modem_phone;
    }
    
    public function camera_phone()
    {
        return $this->m_camera_phone;
    }
    
    public function modem_state_date()
    {
        return $this->m_modem_state_date;
    }
    
    public function camera_state_date()
    {
        return $this->m_camera_state_date;
    }
    
    public function set_id($new_id)
    {
        $this->m_id = $new_id;
    }
    
    public function set_name($new_name)
    {
        $this->m_name = $new_name;
    }
    
    public function set_modem_phone($new_phone)
    {
        $this->m_modem_phone = $new_phone;
    }
    
    public function set_camera_phone($new_phone)
    {
        $this->m_camera_phone = $new_phone;
    }
    
    private function set_last_modem_state($new_state_date)
    {
        $this->m_modem_state_date = $new_state_date;
    }
    
    private function set_last_camera_state($new_state_date)
    {
        $this->m_camera_state_date = $new_state_date;
    }
    
    private $m_id;
    private $m_name;
    private $m_modem_phone;
    private $m_camera_phone;
    private $m_modem_state_date;
    private $m_camera_state_date;
}