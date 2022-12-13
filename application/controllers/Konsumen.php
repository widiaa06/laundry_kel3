<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{

    public function index()
    {
        $isi['title'] = 'Data Konsumen';
        $isi['content'] = 'backend/konsumen/v_konsumen';
        $isi['data'] = $this->m_konsumen->getAllDataKonsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['title'] = 'Tambah Konsumen';
        $isi['content'] = 'backend/konsumen/t_konsumen';
        $isi['kode_konsumen'] = $this->m_konsumen->generate_kode_konsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'kode_konsumen'     => $this->input->post('kode_konsumen'),
            'nama_konsumen'     => $this->input->post('nama_konsumen'),
            'alamat_konsumen'   => $this->input->post('alamat_konsumen'),
            'no_telp'           => $this->input->post('no_telp')
        );
        $query = $this->db->insert('konsumen', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Konsumen Berhasil di Tambahkan');
            redirect('konsumen');
        }
    }

    public function edit($id)
    {
        $isi['title'] = 'Form Edit konsumen';
        $isi['content'] = 'backend/konsumen/e_konsumen';
        $isi['konsumen'] = $this->m_konsumen->edit($id);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update()
    {
        $kode_konsumen = $this->input->post('kode_konsumen');
        $data = array(
            'kode_konsumen'     => $this->input->post('kode_konsumen'),
            'nama_konsumen'     => $this->input->post('nama_konsumen'),
            'alamat_konsumen'   => $this->input->post('alamat_konsumen'),
            'no_telp'           => $this->input->post('no_telp')
        );
        $query = $this->m_konsumen->update($kode_konsumen, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Konsumen Berhasil di Update');
            redirect('konsumen');
        }
    }

    public function delete($id)
    {
        $query = $this->m_konsumen->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Konsumen Berhasil di Hapus');
            redirect('konsumen');
        }
    }
}
