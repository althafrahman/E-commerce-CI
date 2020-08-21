<?php

/**
 * Admin Controller
 *
 * @author Althaf
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Adminmodel', 'admin');
    }
    public function listAllCustomer()
    {
        $this->load->view('headers/adminheader');
        $this->load->view('admin/listallcus');
    }
    public function listAllOrders()
    {
        $this->load->view('headers/adminheader');
        $this->load->view('admin/listallorder');
    }

    public function cus_list()
    {

        /* Create JSON for datatable */
        $assets = $this->admin->cus_list();
        $data = array();
        foreach ($assets as $item) {
            $row = array();
            $row[] = $item['name'];
            $row[] = $item['email'];
            $row[] = $item['phone'];
            $row[] = $item['address'];
            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => 20,
            "recordsFiltered" => 10,
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function order_list()
    {

        /* Create JSON for datatable */
        $assets = $this->admin->order_list();
        $data = array();
        foreach ($assets as $item) {
            $row = array();
            $row[] = $item['order_id'];
            $row[] = $item['total'];
            if($item['status'] == 0){
                $row[] = "Order Placed";
            }else if($item['status'] == 1){
                $row[] = "Order Shipped";
            }else{
                $row[] = "Order Delivered";
            }
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => 20,
            "recordsFiltered" => 10,
            "data" => $data,
        );

        echo json_encode($output);
    }
}
