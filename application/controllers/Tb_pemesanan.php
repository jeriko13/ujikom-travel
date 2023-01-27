<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_pemesanan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tb_pemesanan = $this->Tb_pemesanan_model->get_all();

        $data = array(
            'tb_pemesanan_data' => $tb_pemesanan
        );

        $this->template->load('template','tb_pemesanan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_layanan' => $row->id_layanan,
		'id_user' => $row->id_user,
		'tanggal' => $row->tanggal,
		'jumlah_orang' => $row->jumlah_orang,
		'status' => $row->status,
	    );
            $this->template->load('template','tb_pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pemesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_pemesanan/create_action'),
	    'id' => set_value('id'),
	    'id_layanan' => set_value('id_layanan'),
	    'id_user' => set_value('id_user'),
	    'tanggal' => set_value('tanggal'),
	    'jumlah_orang' => set_value('jumlah_orang'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','tb_pemesanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_layanan' => $this->input->post('id_layanan',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah_orang' => $this->input->post('jumlah_orang',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tb_pemesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_pemesanan/update_action'),
		'id' => set_value('id', $row->id),
		'id_layanan' => set_value('id_layanan', $row->id_layanan),
		'id_user' => set_value('id_user', $row->id_user),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah_orang' => set_value('jumlah_orang', $row->jumlah_orang),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','tb_pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pemesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_layanan' => $this->input->post('id_layanan',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah_orang' => $this->input->post('jumlah_orang',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tb_pemesanan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Tb_pemesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pemesanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_layanan', 'id layanan', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah_orang', 'jumlah orang', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_pemesanan.xls";
        $judul = "tb_pemesanan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Layanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Orang");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Tb_pemesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_layanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_orang);
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
        header("Content-Disposition: attachment;Filename=tb_pemesanan.doc");

        $data = array(
            'tb_pemesanan_data' => $this->Tb_pemesanan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_pemesanan_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'tb_pemesanan_data' => $this->Tb_pemesanan_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('tb_pemesanan_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('tb_pemesanan.pdf', 'D'); 
    }

}

/* End of file Tb_pemesanan.php */
/* Location: ./application/controllers/Tb_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:48:46 */
/* http://harviacode.com */