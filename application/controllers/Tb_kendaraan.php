<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_kendaraan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_kendaraan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tb_kendaraan = $this->Tb_kendaraan_model->get_all();

        $data = array(
            'tb_kendaraan_data' => $tb_kendaraan
        );

        $this->template->load('template','tb_kendaraan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_kendaraan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenis' => $row->jenis,
		'merk' => $row->merk,
		'plat_nomor' => $row->plat_nomor,
		'jumlah_kursi' => $row->jumlah_kursi,
		'harga_sewa' => $row->harga_sewa,
	    );
            $this->template->load('template','tb_kendaraan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kendaraan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_kendaraan/create_action'),
	    'id' => set_value('id'),
	    'jenis' => set_value('jenis'),
	    'merk' => set_value('merk'),
	    'plat_nomor' => set_value('plat_nomor'),
	    'jumlah_kursi' => set_value('jumlah_kursi'),
	    'harga_sewa' => set_value('harga_sewa'),
	);
        $this->template->load('template','tb_kendaraan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis' => $this->input->post('jenis',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'plat_nomor' => $this->input->post('plat_nomor',TRUE),
		'jumlah_kursi' => $this->input->post('jumlah_kursi',TRUE),
		'harga_sewa' => $this->input->post('harga_sewa',TRUE),
	    );

            $this->Tb_kendaraan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_kendaraan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_kendaraan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_kendaraan/update_action'),
		'id' => set_value('id', $row->id),
		'jenis' => set_value('jenis', $row->jenis),
		'merk' => set_value('merk', $row->merk),
		'plat_nomor' => set_value('plat_nomor', $row->plat_nomor),
		'jumlah_kursi' => set_value('jumlah_kursi', $row->jumlah_kursi),
		'harga_sewa' => set_value('harga_sewa', $row->harga_sewa),
	    );
            $this->template->load('template','tb_kendaraan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kendaraan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jenis' => $this->input->post('jenis',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'plat_nomor' => $this->input->post('plat_nomor',TRUE),
		'jumlah_kursi' => $this->input->post('jumlah_kursi',TRUE),
		'harga_sewa' => $this->input->post('harga_sewa',TRUE),
	    );

            $this->Tb_kendaraan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_kendaraan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_kendaraan_model->get_by_id($id);

        if ($row) {
            $this->Tb_kendaraan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_kendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kendaraan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('plat_nomor', 'plat nomor', 'trim|required');
	$this->form_validation->set_rules('jumlah_kursi', 'jumlah kursi', 'trim|required');
	$this->form_validation->set_rules('harga_sewa', 'harga sewa', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kendaraan.xls";
        $judul = "tb_kendaraan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Plat Nomor");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Kursi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Sewa");

	foreach ($this->Tb_kendaraan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->plat_nomor);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_kursi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_sewa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kendaraan.doc");

        $data = array(
            'tb_kendaraan_data' => $this->Tb_kendaraan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_kendaraan_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'tb_kendaraan_data' => $this->Tb_kendaraan_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('tb_kendaraan_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('tb_kendaraan.pdf', 'D'); 
    }

}

/* End of file Tb_kendaraan.php */
/* Location: ./application/controllers/Tb_kendaraan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:48:46 */
/* http://harviacode.com */