<?php

/**
 * Home Controller
 *
 * @author Althaf
 */

defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Homemodel', 'home');
    }

    public function listAllProducts()
    {
        $this->load->view('headers/header');
        $this->load->view('products/listall');
    }

    public function listCart()
    {
        $this->load->view('headers/header');
        $this->load->view('users/cart');
    }

    public function listOrders()
    {
        $this->load->view('headers/header');
        $this->load->view('users/orders');
    }

    public function getOrders()
    {
        $this->home->getOrders();
    }

    public function getOrderItems()
    {
        $this->home->getOrderItems();
    }

    public function thanku()
    {
        $this->load->view('users/thanku'); 
    }
 
    public function getProducts()
    {
        $this->home->getProducts();
    }

    public function getCategories()
    {
        $this->home->getCategories();
    }
    
    public function addToCart()
    {
        $this->home->addToCart();
    }
}
