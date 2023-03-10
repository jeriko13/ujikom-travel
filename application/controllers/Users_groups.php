<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_groups extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_groups_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $users_groups = $this->Users_groups_model->get_all();

        $data = array(
            'users_groups_data' => $users_groups
        );

        $this->template->load('template','users_groups_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_groups_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'user_id' => $row->user_id,
		'group_id' => $row->group_id,
	    );
            $this->template->load('template','users_groups_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_groups'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users_groups/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'group_id' => set_value('group_id'),
	);
        $this->template->load('template','users_groups_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
	    );

            $this->Users_groups_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users_groups'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_groups_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users_groups/update_action'),
		'id' => set_value('id', $row->id),
		'user_id' => set_value('user_id', $row->user_id),
		'group_id' => set_value('group_id', $row->group_id),
	    );
            $this->template->load('template','users_groups_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_groups'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
	    );

            $this->Users_groups_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users_groups'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_groups_model->get_by_id($id);

        if ($row) {
            $this->Users_groups_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users_groups'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_groups'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('group_id', 'group id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users_groups.xls";
        $judul = "users_groups";
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
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Group Id");

	foreach ($this->Users_groups_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->group_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users_groups.doc");

        $data = array(
            'users_groups_data' => $this->Users_groups_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('users_groups_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'users_groups_data' => $this->Users_groups_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('users_groups_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('users_groups.pdf', 'D'); 
    }

}

/* End of file Users_groups.php */
/* Location: ./application/controllers/Users_groups.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-27 03:48:46 */
/* http://harviacode.com */