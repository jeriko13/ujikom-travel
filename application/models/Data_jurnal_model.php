<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_jurnal_model extends CI_Model
{

    public $table = 'data_jurnal';
    public $id = 'id_jurnal';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_jurnal', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('transaksi', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('akun_debit', $q);
	$this->db->or_like('akun_kredit', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jurnal', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('transaksi', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('akun_debit', $q);
	$this->db->or_like('akun_kredit', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Data_jurnal_model.php */
/* Location: ./application/models/Data_jurnal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-08 05:57:26 */
/* http://harviacode.com */