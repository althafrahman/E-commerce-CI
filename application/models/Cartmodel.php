<?php

/**
 * Description of Cart Model
 *
 * @author Althaf
 */

defined('BASEPATH') or exit('No direct script access allowed');
class CartModel extends CI_Model {
    public function getCartItems()
    {
        $qry = 'SELECT *, c.id as c_id from cart as c inner join item as i on c.item_id = i.id where cus_id = 1 and is_checkout = 0';
        $res = $this->db->query($qry)->result_array();
        echo json_encode($res);
    }

    public function removeCartItem()
    {
        $item_id = $this->input->post('item_id');
        $query = "DELETE from cart where id = ".$item_id;
        $this->db->query($query);
    }

    public function updateCartItems()
    {
        $quantity = $this->input->post('quantity');
        if($quantity){
            $id = $this->input->post('id');
            $data = array(
                'quantity' => $quantity,
            );
    
            $this->db->where('id', $id);
            $this->db->update('cart', $data);
        }
       
    }

    public function getTotal()
    {
        $qry = "SELECT SUM(i.price * c.quantity) as total FROM `cart` as c inner join item as i on c.item_id = i.id where cus_id = 1 and is_checkout = 0";
        $res = $this->db->query($qry)->row_array();
        echo json_encode($res);
    }

    public function placeOrder()
    {
        $qry = "SELECT SUM(i.price * c.quantity) as total FROM `cart` as c inner join item as i on c.item_id = i.id where cus_id = 1 and is_checkout = 0";
        $res = $this->db->query($qry)->row_array();
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $order_id = substr(str_shuffle($str_result),  0, 6);
        $data = array(
            'cus_id' => 1,
            'status' => 0,
            'order_id' => $order_id,
            'total' => $res['total'],
        );

        $this->db->insert('order_main', $data);
        $id = $this->db->insert_id();

        $qry = 'SELECT *, c.id as c_id from cart as c inner join item as i on c.item_id = i.id where cus_id = 1 and is_checkout = 0';
        $res = $this->db->query($qry)->result_array();

        for($i = 0; $i < count($res); $i++){
            $data = array(
                'main_id' => $id,
                'item_id' => $res[$i]['item_id'],
                'quantity' => $res[$i]['quantity'],
                'uprice' => $res[$i]['price'],
                'total' => $res[$i]['price'] * $res[$i]['quantity'],
            );
            $this->db->insert('order_sub', $data);
        }

        $data = array(
            'is_checkout' => 1,
        );
        $this->db->where('cus_id', 1);
        $this->db->update('cart', $data);

        redirect(base_url() . 'HomeController/thanku');
    }
}