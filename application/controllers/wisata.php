<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

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
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/wisata/wisata',$data);
		$this->load->view('admin/layout/footer');
	}
    public function add(){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $data['kategori']=$this->Madmin->get_all_data('kategori')->result();
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/wisata/tambah',$data);
		$this->load->view('admin/layout/footer');
    }
    public function save(){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $namawisata = $this->input->post('namawisata');
        $deskripsi = $this->input->post('deskripsi');
        $lokasi = $this->input->post('lokasi');
        $akomodasi = $this->input->post('akomodasi');
        $htm = $this->input->post('htm');
        $id_kategori = $this->input->post('id_kategori');
        $dataInput = array(
            'namawisata' => $namawisata, 
			'deskripsi' => $deskripsi,
            'lokasi' => $lokasi, 
            'akomodasi' => $akomodasi,
            'htm' => $htm, 
            'id_kategori' => $id_kategori
        );

        $this->Madmin->insert('destinasi', $dataInput);
        redirect('wisata');
    }
    public function get_by_id($id){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $data['kategori']=$this->Madmin->get_all_data('kategori')->result();
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        $dataWhere = array('id_wisata'=>$id);
        $data['destinasi']=$this->Madmin->get_by_id('destinasi', $dataWhere)->row_object();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/wisata/edit', $data);
		$this->load->view('admin/layout/footer');
    }
    public function edit(){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $id=$this->input->post('id');
        $namawisata=$this->input->post('namawisata');
        $deskripsi = $this->input->post('deskripsi');
        $lokasi = $this->input->post('lokasi');
        $akomodasi = $this->input->post('akomodasi');
        $htm = $this->input->post('htm');
        $id_kategori = $this->input->post('id_kategori');
        $dataUpdate=array(
            'namawisata'=>$namawisata,
            'deskripsi' => $deskripsi,
            'lokasi' => $lokasi, 
            'akomodasi' => $akomodasi,
            'htm' => $htm, 
            'id_kategori' => $id_kategori
        );
        $this->Madmin->update('destinasi',$dataUpdate,'id_wisata', $id);
        redirect('wisata'); 
    }
    public function delete($id){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $this->Madmin->delete('destinasi','id_wisata', $id);
        redirect('wisata');
        
    }
}