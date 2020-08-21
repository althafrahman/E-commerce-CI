<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sales_model
 *
 * @author u43255
 */
defined('BASEPATH') OR exit('No direct script access allowed');
 
class First_api extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function regClinic($data){
        
        $this->db->insert("cli_clinic", $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function regUser($data){
        
        $this->db->insert("users", $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function addSession($data){
        
        $this->db->insert("sett_login", $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function bookingFinal($data)
    {
        $this->db->insert("cli_booking", $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function regDoctor($data)
    {
        $this->db->insert("cli_doctor", $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function login($data)
    {
        $qry = "select * from users where username = '" . $data['username'] . "' and password = '" . $data['password'] . "'";
        $result = $this->db->query($qry);
        return $result;
    }
  
}