<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

	public function index()
	{
       if(empty($this->session->userdata('username'))){
	redirect('admin');
	}
        $data['kategori']=$this->Madmin->get_all_data('kategori')->result();
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/kategori/kategori',$data);
		$this->load->view('admin/layout/footer');
	}
    public function add(){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/kategori/tambah');
		$this->load->view('admin/layout/footer');
    }
    public function save(){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $namakategori = $this->input->post('namakategori');
        $dataInput=array('namakategori'=>$namakategori);
        $this->Madmin->insert('kategori', $dataInput);
        redirect('kategori');
    }
    public function get_by_id($id){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $dataWhere = array('id_kategori'=>$id);
        $data['kategori']=$this->Madmin->get_by_id('kategori', $dataWhere)->row_object();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/kategori/edit', $data);
		$this->load->view('admin/layout/footer');
    }
    public function edit(){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $id=$this->input->post('id');
        $namakategori=$this->input->post('namakategori');
        $dataUpdate=array('namakategori'=>$namakategori);
        $this->Madmin->update('kategori',$dataUpdate,'id_kategori', $id);
        redirect('kategori'); 
    }
    public function delete($id){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $this->Madmin->delete('kategori','id_kategori', $id);
        redirect('kategori');
        
    }
}