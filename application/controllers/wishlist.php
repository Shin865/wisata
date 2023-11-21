<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

	public function index()
	{
     if(empty($this->session->userdata('username'))){
	redirect('user');
      }
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        $data['wishlist'] = $this->db->get_where('wishlist', ['id_user' => $this->session->userdata('id_user')])->result();
		$this->load->view('user/layout/sidebar');
		$this->load->view('user/layout/header');
		$this->load->view('user/form/wishlist/wishlist',$data);
		$this->load->view('user/layout/footer');
	}
    public function add(){
        if(empty($this->session->userdata('username'))){
            	redirect('user');
	}
        // $data['id_user'] = $id_user;
        $data['destinasi']=$this->Madmin->get_all_data('destinasi')->result();
        // $data['wishlist'] = $this->Madmin->get_all_data('wishlist')->result();
        $this->load->view('user/layout/sidebar');
		$this->load->view('user/layout/header');
		$this->load->view('user/form/wishlist/tambah',$data);
		$this->load->view('user/layout/footer');
    }
    public function save(){
        if(empty($this->session->userdata('username'))){
			redirect('user');
		}
        $id = $this->session->userdata('id_user');
        $statuskunjungan = $this->input->post('statuskunjungan');
        $estimasi = $this->input->post('estimasi');
        $id_user = $this->input->post('id_user');
        $id_wisata = $this->input->post('id_wisata');

        $dataInput=array(
            'statuskunjungan'=>$statuskunjungan,
            'estimasi'=>$estimasi,
            'id_user'=>$id_user,
            'id_wisata'=>$id_wisata
        );
        $this->Madmin->insert('wishlist', $dataInput);
        redirect('wishlist');
    }
    public function get_by_id($id){
        if(empty($this->session->userdata('username'))){
			redirect('user');
		}
        $dataWhere = array('id_wishlist'=>$id);
        $data['user']=$this->Madmin->get_by_id('user', $dataWhere)->row_object();
        $data['wishlist']=$this->Madmin->get_by_id('wishlist', $dataWhere)->row_object();
        $data['wisata']=$this->Madmin->get_by_id('wisata', $dataWhere)->row_object();
        $this->load->view('user/layout/sidebar');
		$this->load->view('user/layout/header');
		$this->load->view('user/form/wishlist/edit', $data);
		$this->load->view('user/layout/footer');
    }
    public function edit(){
        if(empty($this->session->userdata('username'))){
			redirect('user');
		}
        $id=$this->input->post('id');
        $statuskunjungan = $this->input->post('statuskunjungan');
        $estimasi = $this->input->post('estimasi');
        $id_user = $this->input->post('id_user');
        $id_wisata = $this->input->post('id_wisata');
        $dataInput=array(
            'statuskunjungan'=>$statuskunjungan,
            'estimasi'=>$estimasi,
            'id_user'=>$id_user,
            'id_wisata'=>$id_wisata
        );
        $this->Madmin->insert('wishlist', $dataInput);
        redirect('wishlist');
    }
    
    public function delete($id){
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $this->Madmin->delete('wishlist','id_wishlist', $id);
        redirect('wishlist');
        
    }
}