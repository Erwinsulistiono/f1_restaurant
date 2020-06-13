<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index()
    {
        if ($this->session->userdata('masuk') == true) {
            redirect('login/berhasillogin');
        } else {
            $title['title'] = "F1 Restaurant";
            $this->load->view('layouts/v_head', $title);
            $this->load->view('v_login');
            $this->load->view('layouts/v_footer');
        }
    }


    function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username')));
        $password = strip_tags(str_replace("'", "", $this->input->post('password')));
        $u = $username;
        $p = $password;
        $cadmin = $this->m_login->cekadmin($u, $p);

        if ($cadmin->num_rows > 0) {
            $xcadmin = $cadmin->row_array();
            $sesdata = array(
                'masuk' => true,
                'pengguna_level' => $xcadmin['pengguna_level'],
                'idadmin' => $xcadmin['pengguna_id'],
                'user_nama' => $xcadmin['pengguna_nama'],
                'pengguna_username' => $xcadmin['pengguna_username'],
                'pengguna_email' => $xcadmin['pengguna_email'],
                'pengguna_nohp' => $xcadmin['pengguna_nohp'],
                'pengguna_photo' => $xcadmin['pengguna_photo'],
            );
            $this->session->set_userdata($sesdata);
        }

        if ($this->session->userdata('masuk') == true) {
            redirect('login/berhasillogin');
        } else {
            redirect('login/gagallogin');
        }
    }

    function berhasillogin()
    {
        if ($this->session->userdata('pengguna_level') == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Welcome <b>' . $this->session->userdata('user_nama') . '</b> Selamat bekerja.</div>');
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Welcome <b>' . $this->session->userdata('user_nama') . '</b> Selamat bekerja.</div>');
            redirect('pos/dashboard');
        }
    }

    function gagallogin()
    {
        $this->session->set_flashdata('msg', 'Username Atau Password Salah');
        redirect('login');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}