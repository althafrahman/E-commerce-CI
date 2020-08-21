<?php

/**
 * Description of Cart Model
 *
 * @author Althaf
 */

defined('BASEPATH') or exit('No direct script access allowed');
class Adminmodel extends CI_Model
{
    public function cus_list()
    {
        $start = $this->input->post('length');
        $skip = $this->input->post('start');
        $search = $this->input->post('search');

        $qry = "SELECT * from users where type = 'customer' limit " . $skip . "," . $start . "";
        return $res = $this->db->query($qry)->result_array();
    }
    public function order_list()
    {
        $start = $this->input->post('length');
        $skip = $this->input->post('start');
        $search = $this->input->post('search');

        $qry = "SELECT * from order_main limit " . $skip . "," . $start . "";
        return $res = $this->db->query($qry)->result_array();
    }
}
