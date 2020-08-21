<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Server
 * 
 * @author Althaf
 */
class LoginApi extends REST_Controller { 
    function __construct() {
        parent::__construct();
        $global_data['hostname'] = 'localhost';
        $global_data['username'] = 'debian-sys-maint';
        $global_data['password'] = '52MvREAWLNNRF3UC';
        $global_data['database'] = 'mtransfer';
        $global_data['isexcute'] = '1';
        $this->load->vars($global_data);
        $this->load->model('api_model/First_api','first');
    }

    public function loginApis_post(){
        $json_request_body = file_get_contents('php://input');
        $tmp = (array) json_decode($json_request_body);
        $email = $tmp['username'];
        $password = $tmp['password'];
        $data = array(
            'username' => $email,
            'password' => $password,
        );
        $result = $this->first->login($data);
        if($result->num_rows() > 0){
            $message = 'Logged in successfully';
            $status = true;
        }
        else{
            $message = 'Loggedin Not Successfull';
            $status = false;
        }
            $msg = [
                'status' => $status,
                'result' => 'Hii ' . $email ,
                'message' => $message,
            ];
            $this->response('Successs');

    }
    

    
}