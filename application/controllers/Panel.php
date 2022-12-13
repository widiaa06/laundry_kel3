<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login Admin';
        $this->load->view('backend/login', $data);
    }

    
}
