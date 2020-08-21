<?php

/**
 * Description of Home Model
 *
 * @author Althaf
 */

defined('BASEPATH') or exit('No direct script access allowed');
class HomeModel extends CI_Model {

    public function getProducts()
    {
        $filter = $this->input->post('filter');
        $qry = "SELECT * from item";
        if($filter){
            $qry = $qry . ' where item_cat = '.$filter;
        }
        $res = $this->db->query($qry);
        echo json_encode($res->result_array());
    }

    public function getCategories()
    {
        $qry = "SELECT * from category";
        $res = $this->db->query($qry);
        echo json_encode($res->result_array());
    }

    public function getOrders()
    {
        $qry = "SELECT * from order_main";
        $res = $this->db->query($qry);
        echo json_encode($res->result_array());
    }

    public function getOrderItems()
    {
        $main_id = $this->input->post('main_id');
        $qry = "SELECT *, c.name as cat_name, i.name as item_name from order_sub as os inner join item as i on os.item_id = i.id inner join category as c on i.item_cat = c.id where os.main_id = ".$main_id;
        $res = $this->db->query($qry);
        echo json_encode($res->result_array());
    }

    public function addToCart()
    {
        $item_id = $this->input->post('item');

        $data = array(
            'item_id' => $item_id,
            'cus_id' => 1,
            'is_checkout'=> 0,
            'quantity'=> 1,
        );
        
        $qry = 'select * from cart where item_id = '.$item_id.' and cus_id = 1 and is_checkout = 0';
        $res = $this->db->query($qry)->row_array();
        if(count($res) <= 0){
            $this->db->insert('cart', $data);
        }
    }

}