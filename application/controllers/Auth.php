<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $this->load->model('Auth_model');
    if ($this->session->userdata('masuk') == TRUE) {
      $redirect_to = $this->Auth_model->getWhereToRedirect($this->session->userdata('uname'))['link_menu'];
      redirect("redirect/$redirect_to");
    } else {
      if (!$this->Auth_model->validation()) {
        $this->load->view('auth/login');
      } else {
        //validasi login sukses
        $this->_login();
      }
    }
  }

  private function _login()
  {
    $uname = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
    $pwd = $this->input->post('password');

    $user = $this->Auth_model->getUserData($uname);

    if ($user) {
      //jika ada user
      if (password_verify($pwd, $user['password'])) {
        //jika password benar
        $data_user = [
          'uname' => $user['username'],
          'nama' => $user['nama'],
          'divisi_id' => $user['divisi_id'],
          'masuk' => TRUE
        ];

        $this->session->set_userdata($data_user);
        $redirect_to = $this->Auth_model->getWhereToRedirect($this->session->userdata('uname'))['link_menu'];
        redirect("redirect/$redirect_to");
      } else {
        //jika password salah
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Password salah!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
        redirect('Auth');
      }
    } else {
      //jika tidak ada user
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Username tidak terdaftar!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
      redirect('Auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('uname');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('divisi_id');
    $this->session->unset_userdata('masuk');


    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Anda telah logout.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
    </div>');
    $this->session->sess_destroy();
    redirect('Auth');
  }

  public function register()
    {
        // Cek apakah form registrasi sudah disubmit
        if ($this->input->post('register')) {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[pengguna.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() === TRUE) {
                // Ambil data dari form
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                // Hash password sebelum disimpan
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Simpan data ke database
                $data = array(
                    'username' => $username,
                    'password' => $hashedPassword
                    // tambahkan field lainnya jika ada
                );

                $this->Auth_model->registerUser($data);

                // Set pesan sukses
                $this->session->set_flashdata('message', 'Registrasi berhasil. Silakan login.');

                // Redirect ke halaman login
                redirect('auth/login');
            }
        }

        // Tampilkan halaman registrasi
        $this->load->view('auth/register');
    }
}
