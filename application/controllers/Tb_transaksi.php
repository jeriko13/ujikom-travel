<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_transaksi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tb_transaksi = $this->Tb_transaksi_model->get_all();

        $data = array(
            'tb_transaksi_data' => $tb_transaksi
        );

        $this->template->load('template','tb_transaksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_pemesanan' => $row->id_pemesanan,
		'id_kendaraan' => $row->id_kendaraan,
		'total_harga' => $row->total_harga,
		'tanggal' => $row->tanggal,
		'status' => $row->status,
	    );
            $this->template->load('template','tb_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_transaksi/create_action'),
	    'id' => set_value('id'),
	    'id_pemesanan' => set_value('id_pemesanan'),
	    'id_kendaraan' => set_value('id_kendaraan'),
	    'total_harga' => set_value('total_harga'),
	    'tanggal' => set_value('tanggal'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','tb_transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'id_kendaraan' => $this->input->post('id_kendaraan',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tb_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_transaksi/update_action'),
		'id' => set_value('id', $row->id),
		'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
		'id_kendaraan' => set_value('id_kendaraan', $row->id_kendaraan),
		'total_harga' => set_value('total_harga', $row->total_harga),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','tb_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'id_kendaraan' => $this->input->post('id_kendaraan',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tb_transaksi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_transaksi_model->get_by_id($id);

        if ($row) {
            $this->Tb_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_kendaraan', 'id kendaraan', 'trim|required');
	$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_transaksi.xls";
        $judul = "tb_transaksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pemesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Tb_transaksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pemesanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_transaksi.doc");

        $data = array(
            'tb_transaksi_data' => $this->Tb_transaksi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_transaksi_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'tb_transaksi_data' => $this->Tb_transaksi_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('tb_transaksi_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('tb_transaksi.pdf', 'D'); 
    }

}

/* End of file Tb_transaksi.php */
/* Location: ./application/controllers/Tb_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:48:46 */
/* http://harviacode.com */