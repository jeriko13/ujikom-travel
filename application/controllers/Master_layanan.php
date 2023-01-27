<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_layanan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_layanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $master_layanan = $this->Master_layanan_model->get_all();

        $data = array(
            'master_layanan_data' => $master_layanan
        );

        $this->template->load('template','master_layanan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Master_layanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_layanan' => $row->nama_layanan,
		'harga' => $row->harga,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','master_layanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_layanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_layanan/create_action'),
	    'id' => set_value('id'),
	    'nama_layanan' => set_value('nama_layanan'),
	    'harga' => set_value('harga'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','master_layanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_layanan' => $this->input->post('nama_layanan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Master_layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('master_layanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_layanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_layanan/update_action'),
		'id' => set_value('id', $row->id),
		'nama_layanan' => set_value('nama_layanan', $row->nama_layanan),
		'harga' => set_value('harga', $row->harga),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','master_layanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_layanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_layanan' => $this->input->post('nama_layanan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Master_layanan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master_layanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_layanan_model->get_by_id($id);

        if ($row) {
            $this->Master_layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master_layanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_layanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_layanan', 'nama layanan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "master_layanan.xls";
        $judul = "master_layanan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Layanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Master_layanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_layanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=master_layanan.doc");

        $data = array(
            'master_layanan_data' => $this->Master_layanan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('master_layanan_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'master_layanan_data' => $this->Master_layanan_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('master_layanan_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('master_layanan.pdf', 'D'); 
    }

}

/* End of file Master_layanan.php */
/* Location: ./application/controllers/Master_layanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:48:46 */
/* http://harviacode.com */