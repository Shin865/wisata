<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
	public function index(){
		$this->load->view('user/login');
		$this->load->model('Madmin');
		if(empty($this->session->userdata('username'))){
			redirect('user');
			}
	}


	public function dashboard(){
		$this->load->model('Madmin');
	if(empty($this->session->userdata('username'))){
	redirect('user');
	}

	$data['user']=$this->Madmin->get_all_data('user')->result();
	$data['session_user'] = $this->db->get_where('user',['id_user'=>$this->session->userdata('id_user')])->row();
		$this->load->view('user/layout/sidebar',$data);
		$this->load->view('user/layout/header');
		$this->load->view('user/dashboard', $data);
		$this->load->view('user/layout/footer');
	
	}
	public function login(){
		// if(empty($this->session->userdata('username'))){
		// redirect('user');
		// }
		$data['user']=$this->Madmin->get_all_data('user')->result();
		$this->load->view('user/login', $data);
		
	}
	public function aksi_login(){
		$this->load->model('Madmin');
		$dataWhere = array('id_user' => $id);
        $data['user'] = $this->Madmin->get_by_id('user', $dataWhere)->row_object();
		$this->input->post('id');
		$u = $this->input->post('username');
		$p = md5($this->input->post('password'));

		$cek = $this->Madmin->cek_login_user($u, $p)->num_rows();

		if($cek==1){
			$data_session = array(
				'username' => $u,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('user/dashboard');
		}else{
			$data['error_message'] = 'Email atau Password anda salah!!!!';
			redirect('user');
		}
	}
	public function register(){
		
		$this->load->view('user/register');
	}

	public function register_aksi(){
		$this->load->model('Madmin');

		$username = $this->input->post('username');
		$email = $this->input->post('emailaktif');
		$password = md5($this->input->post('user_password'));
        $namalengkap = $this->input->post('user_namalengkap');
		$tgllhr = $this->input->post('tgllhr');
        $alamat = $this->input->post('alamat');
        $notlp = $this->input->post('notlp');

        $dataInput = array(
            'username' => $username, 
			'emailaktif' => $email,
            'user_password' => $password, 
            'user_namalengkap' => $namalengkap,
            'alamat' => $alamat, 
            'notlp' => $notlp
        );

        $this->Madmin->insert('user', $dataInput);
        redirect('user');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}

	public function editprof(){
        $dataWhere = array('id_user'=>$id);
        $data['user']=$this->Madmin->get_by_id('user', $dataWhere)->row_object();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/profil/editprofil', $data);
		$this->load->view('admin/layout/footer');
    }
}

?>