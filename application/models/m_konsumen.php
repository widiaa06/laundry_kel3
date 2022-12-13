<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_konsumen extends CI_Model
{
    public function generate_kode_konsumen()
    {
        $this->db->select('RIGHT(konsumen.kode_konsumen,3) as kode', false);
        $this->db->order_by('kode_konsumen', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('konsumen');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "K" . $kodemax;
        return $kodejadi;
    }

    public function getAllDataKonsumen()
    {
        return $this->db->get('konsumen')->result();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('konsumen');
        $this->db->where('kode_konsumen', $id);
        return $this->db->get()->row_array();
    }

    public function update($kode_konsumen, $data)
    {
        $this->db->where('kode_konsumen', $kode_konsumen);
        $this->db->update('konsumen', $data);
    }

    public function delete($id)
    {
        $this->db->where('kode_konsumen', $id);
        $this->db->delete('konsumen');
    }
}
