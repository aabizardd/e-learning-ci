<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/login');
        $this->load->view('part/footerauth');
    }

    
    public function registerSiswa()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerSiswa');
        $this->load->view('part/footerauth');
    }
    
    public function registerGuru()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerGuru');
        $this->load->view('part/footerauth');
    }

    
    public function registerAdmin()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerAdmin');
        $this->load->view('part/footerauth');
    }

    
    public function prosesLogin()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $auth = $this->user_model->login($email,$password)->result();
			
			
            
            if (!empty($auth[0]->siswa_id)) {


                $datasiswa = $this->user_model->getDataSiswa($auth[0]->siswa_id)->result();

                if($datasiswa[0]->status_id == 0) {

                    $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf, akun anda belum aktif'));
                    redirect('user');

                } else if( $datasiswa[0]->status_id == 2 ) {

                    $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf, akun anda diblokir'));
                    redirect('user');

                } else if( $datasiswa[0]->status_id == 4 ) {
                
                    $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf, akun anda sudah dihapus'));
                    redirect('user');

                } else {
                    $siswa = array(
                        'siswa' => "1",
                        'idLogin'=> $auth[0]->id,
                        'id' => $auth[0]->siswa_id,
                        'kelas_id' => $datasiswa[0]->kelas_id,
                        'nama' => $datasiswa[0]->nama,
                        'username' => $auth[0]->username,
                        'foto' => $datasiswa[0]->foto
                    );
    
                    $this->session->set_userdata($siswa);
    
                    redirect('siswa');
                }
                
            }elseif(!empty($auth[0]->pengajar_id)){
                if (!empty($auth[0]->is_admin)) {
                    $dataguru = $this->user_model->getDataGuru($auth[0]->pengajar_id)->result();
                    
                    $admin = array(
                        'admin' => "1",
                        'idLogin'=> $auth[0]->id,
                        'id' => $auth[0]->pengajar_id,
                        'nama' => $dataguru[0]->nama,
                        'username' => $auth[0]->username,
                        'foto' => $dataguru[0]->foto,
                        'idmapel' => $dataguru[0]->id_mapel
                    );
                    $this->session->set_userdata( $admin );
                    
                    redirect('admin');
                    
                }
                
                $dataguru = $this->user_model->getDataGuru($auth[0]->pengajar_id)->result();
				
                if($dataguru[0]->status_id == 0 ) {

                    $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf, akun anda belum aktif'));
                    redirect('user');

                } elseif ( $dataguru[0]->status_id == 2 ) {
                
                    $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf, akun anda diblokir'));
                    redirect('user');
                
                } else {

                    $pengajar = array(
                        'guru' => "1",
                        'idLogin'=> $auth[0]->id,
                        'id' => $auth[0]->pengajar_id,
                        'nama' => $dataguru[0]->nama,
                        'username' => $auth[0]->username,
                        'foto' => $dataguru[0]->foto,
                        'idmapel' => $dataguru[0]->id_mapel
                    );
                    $this->session->set_userdata($pengajar);
                    
                    redirect('pengajar');
                }

            }else{
                $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'maaf username atau password salah.'));
                redirect('user');
            }
            
        } else {
            $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Form harus di isi.'));
            redirect('user');
        }
            
            
    }

    
    public function prosesRegisterSiswa()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('tempatlahir', 'tempatlahir', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tahunmasuk', 'tahunmasuk', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $nama = $this->input->post('nama');
            $nis = $this->input->post('nis');
            $tempatlahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $tahunmasuk = $this->input->post('tahunmasuk');
            
            $niss = $this->user_model->getSiswaId($nis)->result();

            if(empty($niss[0]->nis)){
                $data2 = array(
                    'nama' => $nama,
                    'nis' => $nis,
                    'tempat_lahir' => $tempatlahir,
                    'jenis_kelamin' => $jk,
                    'alamat' => $alamat,
                    'tahun_masuk' => $tahunmasuk,
                    'status_id' => 0
                );
                $this->user_model->registerSiswa($data2);
                
                $niss = $this->user_model->getSiswaId($nis)->result();
                
                $data1 = array(
                    'siswa_id' => $niss[0]->id,
                    'username' => $email,
                    'password' => $password,
                    'is_admin' => 0
                );
                $this->user_model->registerSiswaaccount($data1);

                $this->session->set_flashdata('success', $this->user_model->get_alert('success', 'Akun berhasil di buat.'));
                redirect('user');
                
            }else{
                $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf NIS sudah Terdaftar .'));
                redirect('user/registerSiswa');
            }
        } else {
            $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Lengkapi form di bawah.'));
            redirect('user/registerSiswa');
        }
    }

    
    public function prosesRegisterGuru()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('tempatlahir', 'tempatlahir', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        
        
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $tempatlahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
           
            
            $nipp = $this->user_model->getSiswaId($nip)->result();

            if(empty($nipp[0]->nip)){
                $data2 = array(
                    'nama' => $nama,
                    'nip' => $nip,
                    'tempat_lahir' => $tempatlahir,
                    'jenis_kelamin' => $jk,
                    'alamat' => $alamat,
                    'status_id' => 0
                );
                $this->user_model->registerGuru($data2);
                
                $nipp = $this->user_model->getPengajarId($nip)->result();
                
                $data1 = array(
                    'pengajar_id' => $nipp[0]->id,
                    'username' => $email,
                    'password' => $password,
                    'is_admin' => 0
                );
                $this->user_model->registerGuruaccount($data1);

                $this->session->set_flashdata('success', $this->user_model->get_alert('success', 'Akun berhasil di buat.'));
                redirect('user');
                
            }else{
                $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf NIP sudah Terdaftar .'));
                redirect('user/registerGuru');
            }
        } else {
            $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Lengkapi form di bawah.'));
            redirect('user/registerGuru');
        }
    }

    public function prosesRegisterAdmin()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('tempatlahir', 'tempatlahir', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        
        
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $tempatlahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
           
            
            $nipp = $this->user_model->getSiswaId($nip)->result();

            if(empty($nipp[0]->nip)){
                $data2 = array(
                    'nama' => $nama,
                    'nip' => $nip,
                    'tempat_lahir' => $tempatlahir,
                    'jenis_kelamin' => $jk,
                    'alamat' => $alamat
                );
                $this->user_model->registerGuru($data2);
                
                $nipp = $this->user_model->getPengajarId($nip)->result();
                
                $data1 = array(
                    'pengajar_id' => $nipp[0]->id,
                    'username' => $email,
                    'password' => $password,
                    'is_admin' => 1
                );
                $this->user_model->registerGuruaccount($data1);

                $this->session->set_flashdata('success', $this->user_model->get_alert('success', 'Akun berhasil di buat.'));
                redirect('user');
                
            }else{
                $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf NIP sudah Terdaftar .'));
                redirect('user/registerGuru');
            }
        } else {
            $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Lengkapi form di bawah.'));
            redirect('user/registerGuru');
        }
    }

    
    public function logout()
    {   
       $this->session->sess_destroy();
       redirect('user');
    }

    
}

?>
