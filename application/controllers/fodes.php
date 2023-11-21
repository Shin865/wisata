<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Fodes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $data['fotodestinasi']=$this->Madmin->get_all_data('fotodestinasi')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/fodes/fodes',$data);
		$this->load->view('admin/layout/footer');
    }

    public function add()
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin'); 
        }
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/fodes/tambah',$data);
		$this->load->view('admin/layout/footer');
    }

    public function save()
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $id_wisata = $this->input->post('id_wisata');
        $config['upload_path'] = './assets/fotodestinasi/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fotodestinasi')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'fotodestinasi' => $data_file['file_name'],
                'id_wisata' => $id_wisata
            );
            $this->Madmin->insert('fotodestinasi', $data_insert);
            redirect('fodes');
        } else {
            redirect('fodes/add');
        }
    }

    public function get_by_id($id)
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $dataWhere = array('id_fodes' => $id);
        $data['fotodestinasi'] = $this->Madmin->get_by_id('fotodestinasi', $dataWhere)->row_object();
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/fodes/edit', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $id = $this->input->post('id');
        $id_wisata = $this->input->post('id_wisata');
        $config['upload_path'] = './assets/fotodestinasi/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('fotodestinasi')) {
            $data_file = $this->upload->data();
            $dataUpdate = array(
                'fotodestinasi' => $data_file['file_name'],
                'id_wisata' => $id_wisata
            );
        $this->Madmin->update('fotodestinasi', $dataUpdate, 'id_fodes', $id);
        redirect('fodes');
    }
}

    public function delete($id)
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $this->Madmin->delete('fotodestinasi', 'id_fodes', $id);
        redirect('fodes');
    }
}
