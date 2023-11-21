<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Galeri extends CI_Controller
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
        $data['galeri']=$this->Madmin->get_all_data('galeri')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/galeri/galeri',$data);
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
		$this->load->view('admin/form/galeri/tambah',$data);
		$this->load->view('admin/layout/footer');
    }

    public function save()
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $namawisata = $this->input->post('namawisata');
        $config['upload_path'] = './assets/fotogaleri/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fotogaleri')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'fotogaleri' => $data_file['file_name'],
                'namawisata' => $namawisata
            );
            $this->Madmin->insert('galeri', $data_insert);
            redirect('galeri');
        } else {
            redirect('galeri/add');
        }
    }

    public function get_by_id($id)
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $dataWhere = array('id_galeri' => $id);
        $data['galeri'] = $this->Madmin->get_by_id('galeri', $dataWhere)->row_object();
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/galeri/edit', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $id = $this->input->post('id');
        $namawisata = $this->input->post('namawisata');
        $config['upload_path'] = './assets/fotogaleri/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('fotogaleri')) {
            $data_file = $this->upload->data();
            $dataUpdate = array(
                'fotogaleri' => $data_file['file_name'],
                'namawisata' => $namawisata
            );
        $this->Madmin->update('galeri', $dataUpdate, 'id_galeri', $id);
        redirect('galeri');
    }
    }
    public function delete($id)
    {
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $this->Madmin->delete('galeri', 'id_galeri', $id);
        redirect('galeri');
    }
}
