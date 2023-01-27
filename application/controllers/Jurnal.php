<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurnal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jurnal = $this->Jurnal_model->get_all();

        $data = array(
            'jurnal_data' => $jurnal
        );

        $this->template->load('template','data_jurnal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jurnal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jurnal' => $row->id_jurnal,
		'tanggal' => $row->tanggal,
		'transaksi' => $row->transaksi,
		'jumlah' => $row->jumlah,
		'akun_debit' => $row->akun_debit,
		'akun_kredit' => $row->akun_kredit,
	    );
            $this->template->load('template','data_jurnal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurnal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jurnal/create_action'),
	    'id_jurnal' => set_value('id_jurnal'),
	    'tanggal' => set_value('tanggal'),
	    'transaksi' => set_value('transaksi'),
	    'jumlah' => set_value('jumlah'),
	    'akun_debit' => set_value('akun_debit'),
	    'akun_kredit' => set_value('akun_kredit'),
	);
        $this->template->load('template','data_jurnal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'akun_debit' => $this->input->post('akun_debit',TRUE),
		'akun_kredit' => $this->input->post('akun_kredit',TRUE),
	    );

            $this->Jurnal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jurnal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jurnal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jurnal/update_action'),
		'id_jurnal' => set_value('id_jurnal', $row->id_jurnal),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'transaksi' => set_value('transaksi', $row->transaksi),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'akun_debit' => set_value('akun_debit', $row->akun_debit),
		'akun_kredit' => set_value('akun_kredit', $row->akun_kredit),
	    );
            $this->template->load('template','data_jurnal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurnal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jurnal', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'akun_debit' => $this->input->post('akun_debit',TRUE),
		'akun_kredit' => $this->input->post('akun_kredit',TRUE),
	    );

            $this->Jurnal_model->update($this->input->post('id_jurnal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jurnal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jurnal_model->get_by_id($id);

        if ($row) {
            $this->Jurnal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jurnal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurnal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('transaksi', 'transaksi', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('akun_debit', 'akun debit', 'trim|required');
	$this->form_validation->set_rules('akun_kredit', 'akun kredit', 'trim|required');

	$this->form_validation->set_rules('id_jurnal', 'id_jurnal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_jurnal.xls";
        $judul = "data_jurnal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Akun Debit");
	xlsWriteLabel($tablehead, $kolomhead++, "Akun Kredit");

	foreach ($this->Jurnal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaksi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->akun_debit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->akun_kredit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_jurnal.doc");

        $data = array(
            'data_jurnal_data' => $this->Jurnal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_jurnal_doc',$data);
    }

}

/* End of file Jurnal.php */
/* Location: ./application/controllers/Jurnal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-08 06:04:49 */
/* http://harviacode.com */