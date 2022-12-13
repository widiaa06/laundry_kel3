<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->helper('tgl_indo_helper');
    }

    public function index()
    {
        $isi['content'] = 'backend/laporan/f_laporan';
        $isi['title'] = 'Laporan Transaksi';
        $this->load->view('backend/dashboard', $isi);
    }

    public function cetak_laporan()
    {
        $this->load->library('dompdf_gen');
        $tgl_mulai = $this->input->post('tanggal_mulai');
        $tgl_ahir = $this->input->post('tanggal_ahir');
        $isi['laporan'] = $this->m_laporan->filter_laporan($tgl_mulai, $tgl_ahir);
        $this->session->set_userdata('tanggal_mulai', $tgl_mulai);
        $this->session->set_userdata('tanggal_ahir', $tgl_ahir);
        $this->load->view('backend/laporan/cetak_laporan', $isi);

        $paper_size = 'A4';
        $orientation = "landscape";
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Transaksi", array('Attachment' => 0));
    }
}
