<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Sessionrestcontroller extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('principal');
    }     
    /**/
    function start_post(){
        $secret = $this->post("secret");        
        $mail = $this->post("mail");
        $responsedata = $this->principal->isuserexistrecord(trim($mail), trim($secret));        
        $this->response($responsedata);
    }
}