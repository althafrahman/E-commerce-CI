<?php

/**
 * Cart Controller
 *
 * @author Althaf
 */

defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Cartmodel', 'cart');
    }

    public function getCartItems()
    {
        $this->cart->getCartItems();
    }

    public function checkout()
    {
        $this->load->view('headers/header');
        $this->load->view('users/checkout');
    }

    public function removeCartItem ()
    {
        $this->cart->removeCartItem();
    }

    public function updateCartItems()
    {
        $this->cart->updateCartItems();   
    }

    public function getTotal()
    {
        $this->cart->getTotal();
    }

    public function placeOrder()
    {
        $this->cart->placeOrder();
    }
}