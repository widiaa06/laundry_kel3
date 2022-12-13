<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->m_login->proses_login($username, $password);
    }

    public function logout()
    {
        // $this->session->sess_destroy();
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');

        redirect('panel');
    }
}
