<?php

class m_hashed extends CI_Model{

    public function hash_string($string){
        //fungsi untuk mengacak kode 
        //kode yang dimasukkan diubang menjaid string dan cost/nilainya harus lebih dari 9
        $hash_string = password_hash($string, PASSWORD_BCRYPT, ['cost'=>9]);
        return $hash_string;
    }

    public function hash_verify($plain_text,$hash_string){
        //fungsi untuk verivikasi password 
        //dimana hash_string akan diverify oleh plain_text 
        $hash_string = password_verify($plain_text, $hash_string);
        return $hash_string;
    }

    public function deskrip($string){
        $this->load->library('encryption');
        $desk=$this->encryption->decrypt('$string');
        return $desk;
    }
}
	