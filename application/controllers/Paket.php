<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function index()
    {
        $isi['title'] = 'Daftar Data Paket';
        $isi['content'] = 'backend/paket/v_paket.php';
        $isi['data'] = $this->m_paket->getDataPaket();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['title'] = 'Form Tambah Data Paket';
        $isi['content'] = 'backend/paket/t_paket.php';
        $isi['kode_paket'] = $this->m_paket->generate_kode_paket();
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'kode_paket'  => $this->input->post('kode_paket'),
            'nama_paket'  => $this->input->post('nama_paket'),
            'harga_paket' => $this->input->post('harga_paket')
        );
        $query = $this->db->insert('paket', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Paekt Berhasil Di Tambahkan');
            redirect('paket');
        }
    }

    public function edit($kode_paket)
    {
        $isi['title'] = 'Form Edit Data Paket';
        $isi['content'] = 'backend/paket/e_paket.php';
        $isi['data'] = $this->m_paket->edit($kode_paket);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $kode_paket = $this->input->post('kode_paket');
        $data = array(
            'kode_paket'  => $this->input->post('kode_paket'),
            'nama_paket'  => $this->input->post('nama_paket'),
            'harga_paket' => $this->input->post('harga_paket')
        );
        $query = $this->m_paket->update($kode_paket, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Paekt Berhasil Di Update');
            redirect('paket');
        }
    }

    public function delete($kode_paket)
    {
        $query = $this->m_paket->delete($kode_paket);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Paket Berhasil Di Hapus');
            redirect('paket');
        }
    }
}
