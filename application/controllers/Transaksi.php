<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function index()
    {
        $isi['title']    = 'Form Tambah Transaksi';
        $isi['content']  = 'backend/transaksi/t_transaksi.php';
        $isi['konsumen'] = $this->db->get('konsumen')->result();
        $isi['paket']    = $this->db->get('paket')->result();
        $isi['kode_transaksi'] = $this->m_transaksi->generateKode();
        $this->load->view('backend/dashboard', $isi);
    }

    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');
        $data = $this->m_transaksi->getHargaPaket($kode_paket);
        echo json_encode($data);
    }

    public function simpan()
    {
        $data = array(
            'kode_transaksi'    => $this->input->post('kode_transaksi'),
            'kode_konsumen'     => $this->input->post('kode_konsumen'),
            'kode_paket'        => $this->input->post('kode_paket'),
            'tgl_masuk'         => $this->input->post('tgl_masuk'),
            'tgl_ambil'         => '',
            'berat'             => $this->input->post('berat'),
            'grand_total'       => $this->input->post('grand_total'),
            'bayar'             => $this->input->post('bayar'),
            'status'            => $this->input->post('status'),
        );

        $query = $this->db->insert('transaksi', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Transaksi Berhasil Di Simpan');
            redirect('transaksi');
        }
    }

    public function riwayat()
    {
        $isi['title']    = 'Riwayat Transaksi';
        $isi['content']  = 'backend/transaksi/riwayat_transaksi.php';
        $isi['data'] = $this->m_transaksi->getAllRiwayat();
        $this->load->view('backend/dashboard', $isi);
    }

    public function update_status()
    {
        $kode_transaksi = $this->input->post('kt');
        $status = $this->input->post('stt');
        $tgl_ambil = date('Y-m-d h:i:s');
        $status_bayar = 'Lunas';

        if ($status == "Baru" or $status == "Proses") {
            $this->m_transaksi->update_status($kode_transaksi, $status);
        } else {
            $this->m_transaksi->update_status1($kode_transaksi, $status, $tgl_ambil, $status_bayar);
        }
    }

    public function edit_transaksi($kode_transaksi)
    {
        $isi['title'] = 'Form Edit Transaksi';
        $isi['content'] = 'backend/transaksi/edit_transaksi';
        $isi['transaksi'] = $this->m_transaksi->edit_transaksi($kode_transaksi);
        $isi['konsumen'] = $this->db->get('konsumen')->result();
        $isi['paket']    = $this->db->get('paket')->result();
        $this->load->view('backend/dashboard', $isi);
    }

    public function delete($kode_transaksi)
    {
        $query = $this->m_transaksi->delete($kode_transaksi);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Riwayat Transaksi Berhasil Di Hapus');
            redirect('transaksi/riwayat');
        }
    }

    public function update()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');
        $data = array(
            'kode_transaksi'    => $this->input->post('kode_transaksi'),
            'kode_konsumen'     => $this->input->post('kode_konsumen'),
            'kode_paket'        => $this->input->post('kode_paket'),
            'tgl_masuk'         => $this->input->post('tgl_masuk'),
            'tgl_ambil'         => '',
            'berat'             => $this->input->post('berat'),
            'grand_total'       => $this->input->post('grand_total'),
            'bayar'             => $this->input->post('bayar'),
            'status'            => $this->input->post('status'),
        );

        $query = $this->m_transaksi->update($kode_transaksi, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Transaksi Berhasil Di Ubah');
            redirect('transaksi/riwayat');
        }
    }

    public function detail($kode_transaksi)
    {
        $this->load->library('dompdf_gen');
        $isi['transaksi'] = $this->m_transaksi->detail($kode_transaksi);
        $this->load->view('backend/transaksi/detail', $isi);

        $paper_size = 'AS';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Detail Transaksi", array('Attachment' => 0));
        $this->dompdf->set('isHtml5ParserEnabled', true);
    }
}
