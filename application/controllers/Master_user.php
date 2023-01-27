<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_user extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $master_user = $this->Master_user_model->get_all();

        $data = array(
            'master_user_data' => $master_user
        );

        $this->template->load('template','master_user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Master_user_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'email' => $row->email,
		'password' => $row->password,
		'role' => $row->role,
	    );
            $this->template->load('template','master_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_user/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'role' => set_value('role'),
	);
        $this->template->load('template','master_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->Master_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('master_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_user/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'role' => set_value('role', $row->role),
	    );
            $this->template->load('template','master_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->Master_user_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_user_model->get_by_id($id);

        if ($row) {
            $this->Master_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "master_user.xls";
        $judul = "master_user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Role");

	foreach ($this->Master_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteNumber($tablebody, $kolombody++, $data->role);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=master_user.doc");

        $data = array(
            'master_user_data' => $this->Master_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('master_user_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'master_user_data' => $this->Master_user_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('master_user_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('master_user.pdf', 'D'); 
    }

}

/* End of file Master_user.php */
/* Location: ./application/controllers/Master_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:48:46 */
/* http://harviacode.com */