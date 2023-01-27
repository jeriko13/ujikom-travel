<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chart extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_chartofaccount_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $chart = $this->Data_chartofaccount_model->get_all();

        $data = array(
            'chart_data' => $chart
        );

        $this->template->load('template','data_chartofaccount_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_chartofaccount_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_akun' => $row->id_akun,
		'kode' => $row->kode,
		'nama_akun' => $row->nama_akun,
		'keterangan' => $row->keterangan,
		'saldo_awal' => $row->saldo_awal,
		'saldo' => $row->saldo,
		'saldo_akhir' => $row->saldo_akhir,
		'kategori' => $row->kategori,
		'phu' => $row->phu,
		'laporan_neraca' => $row->laporan_neraca,
	    );
            $this->template->load('template','data_chartofaccount_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('chart'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('chart/create_action'),
	    'id_akun' => set_value('id_akun'),
	    'kode' => set_value('kode'),
	    'nama_akun' => set_value('nama_akun'),
	    'keterangan' => set_value('keterangan'),
	    'saldo_awal' => set_value('saldo_awal'),
	    'saldo' => set_value('saldo'),
	    'saldo_akhir' => set_value('saldo_akhir'),
	    'kategori' => set_value('kategori'),
	    'phu' => set_value('phu'),
	    'laporan_neraca' => set_value('laporan_neraca'),
	);
        $this->template->load('template','data_chartofaccount_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'nama_akun' => $this->input->post('nama_akun',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'saldo_awal' => $this->input->post('saldo_awal',TRUE),
		'saldo' => $this->input->post('saldo',TRUE),
		'saldo_akhir' => $this->input->post('saldo_akhir',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'phu' => $this->input->post('phu',TRUE),
		'laporan_neraca' => $this->input->post('laporan_neraca',TRUE),
	    );

            $this->Data_chartofaccount_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('chart'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_chartofaccount_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('chart/update_action'),
		'id_akun' => set_value('id_akun', $row->id_akun),
		'kode' => set_value('kode', $row->kode),
		'nama_akun' => set_value('nama_akun', $row->nama_akun),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'saldo_awal' => set_value('saldo_awal', $row->saldo_awal),
		'saldo' => set_value('saldo', $row->saldo),
		'saldo_akhir' => set_value('saldo_akhir', $row->saldo_akhir),
		'kategori' => set_value('kategori', $row->kategori),
		'phu' => set_value('phu', $row->phu),
		'laporan_neraca' => set_value('laporan_neraca', $row->laporan_neraca),
	    );
            $this->template->load('template','data_chartofaccount_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('chart'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_akun', TRUE));
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'nama_akun' => $this->input->post('nama_akun',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'saldo_awal' => $this->input->post('saldo_awal',TRUE),
		'saldo' => $this->input->post('saldo',TRUE),
		'saldo_akhir' => $this->input->post('saldo_akhir',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'phu' => $this->input->post('phu',TRUE),
		'laporan_neraca' => $this->input->post('laporan_neraca',TRUE),
	    );

            $this->Data_chartofaccount_model->update($this->input->post('id_akun', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('chart'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_chartofaccount_model->get_by_id($id);

        if ($row) {
            $this->Data_chartofaccount_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('chart'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('chart'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('nama_akun', 'nama akun', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('saldo_awal', 'saldo awal', 'trim|required');
	$this->form_validation->set_rules('saldo', 'saldo', 'trim|required');
	$this->form_validation->set_rules('saldo_akhir', 'saldo akhir', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('phu', 'phu', 'trim|required');
	$this->form_validation->set_rules('laporan_neraca', 'laporan neraca', 'trim|required');

	$this->form_validation->set_rules('id_akun', 'id_akun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_chartofaccount.xls";
        $judul = "data_chartofaccount";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Akun");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Saldo Awal");
	xlsWriteLabel($tablehead, $kolomhead++, "Saldo");
	xlsWriteLabel($tablehead, $kolomhead++, "Saldo Akhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Phu");
	xlsWriteLabel($tablehead, $kolomhead++, "Laporan Neraca");

	foreach ($this->Data_chartofaccount_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_akun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->saldo_awal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->saldo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->saldo_akhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->laporan_neraca);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Chart.php */
/* Location: ./application/controllers/Chart.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-08 06:26:56 */
/* http://harviacode.com */