<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function index(){
		$this->load->view('admin/login');
		$this->load->model('Madmin');
	}

	public function dashboard(){
	if(empty($this->session->userdata('username'))){
	redirect('admin');
	}
		// $id = $this->session->userdata('id_admin');
        // $dataWhere = array('id_admin'=>$id);
		// $data['admin']= $this->Madmin->get_by_id('admin',$dataWhere)->result();
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
		// $this->load->view('layout/footer');
	}
	public function login(){
		if(empty($this->session->userdata('username'))){
		redirect('admin');
		}
		$this->load->view('admin/login');
	}
	public function aksi_login(){
		$this->load->model('Madmin');
		$u = $this->input->post('username');
		$p = md5($this->input->post('password'));

		$cek = $this->Madmin->cek_login($u, $p)->num_rows();

		if($cek==1){
			$data_session = array(
				'username' => $u,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('admin/dashboard');
		}else{
			$data['error_message'] = 'Email atau Password anda salah!!!!';
			redirect('admin');
		}
	}
	public function register(){
		$this->load->view('admin/register');
	}

	public function register_aksi(){
		$this->load->model('Madmin');

		$username = $this->input->post('username');
		$email = $this->input->post('emailaktif');
		$password = md5($this->input->post('admin_password'));
        $namalengkap = $this->input->post('admin_namalengkap');
		$tgllhr = $this->input->post('tgllhr');
        $alamat = $this->input->post('alamat');
        $notlp = $this->input->post('notlp');

        $dataInput = array(
            'username' => $username, 
			'emailaktif' => $email,
            'admin_password' => $password, 
            'admin_namalengkap' => $namalengkap,
            'alamat' => $alamat, 
            'notlp' => $notlp
        );

        $this->Madmin->insert('admin', $dataInput);
        redirect('admin');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function editprof(){
		if(empty($this->session->userdata('username'))){
		redirect('admin');
		}
		$this->load->model('Madmin');
		$data['admin']=$this->Madmin->get_all_data('admin')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/profil/editprofil', $data);
		$this->load->view('admin/layout/footer');
    }
	public function edit(){
		
        if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
		$this->load->model('Madmin');
		$id=$this->input->post('id');
		$username = $this->input->post('username');
		$email = $this->input->post('emailaktif');
		$password = md5($this->input->post('admin_password'));
        $namalengkap = $this->input->post('admin_namalengkap');
		$tgllhr = $this->input->post('tgllhr');
        $alamat = $this->input->post('alamat');
        $notlp = $this->input->post('notlp');

        $dataUpdate = array(
            'username' => $username, 
			'emailaktif' => $email,
            'admin_password' => $password, 
            'admin_namalengkap' => $namalengkap,
            'alamat' => $alamat, 
            'notlp' => $notlp
        );

        $this->Madmin->update('admin', $dataUpdate);
        redirect('admin/editprof');
    }

	public function user()
    {
		$this->load->model('Madmin');
		$data['user']=$this->Madmin->get_all_data('user')->result();
        $this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/form/user/user',$data);
		$this->load->view('admin/layout/footer');
    }
	
    public function delete($id)
    {
		$this->load->model('Madmin');
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
		
        $this->Madmin->delete('user', 'id_user', $id);
        redirect('admin/user');
    }
}

?>