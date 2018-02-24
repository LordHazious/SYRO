<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * Auth: KoDusk
 * Date: 11/15/2017
 * Time: 12:29 PM
 */

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model','',TRUE);
    }
    public function index()
    {
        if ($this->session->userdata('logged_in'))
        {
            redirect('dashboard', 'refresh');
        }
        $this->login();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_user_login');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }
        else
        {
            redirect('dashboard');
        }
    }

    public function check_user_login($password)
    {
        // Field validation succeeded.  Validate against database
        $email = $this->input->post('email');

        // query the database
        $result = $this->User_Model->login($email, $password);

        if(!empty($result->uid))
        {
            $admin = $this->User_Model->check_user_admin($email);

            $session = array(
                'id' => $result->uid,
                'admin' => $admin,
                'email' => $result->email,
                'fullName' => $result->full_name,
                'logged_in' => true
            );

            $this->session->set_userdata($session);

            return true;
        }
        else
        {
            $this->form_validation->set_message('check_user_login', 'Invalid email and/or password');
            return false;
        }
    }

    public function register()
    {
        $data = array(
            'title' => 'Register',
        );

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cPassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('g-recaptcha-response', 'Google reCaptcha', 'required|callback_check_captcha');



        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        }
        else
        {
            $hashPassword = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = array(
                'full_name' => $this->input->post('fullName'),
                'email' => $this->input->post('email'),
                'password' => $hashPassword,
                'status' => 0
            );

            $result = $this->User_Model->register($data);

            if($result == true)
            {
                redirect('login');
            }

        }
    }

    public function check_captcha($response)
    {
        $this->load->model('Captcha_Model','',TRUE);
        $result = $this->Captcha_Model->check_captcha($response);

        if($result)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_captcha', 'Invalid reCAPTCHA');
            return FALSE;
        }
    }

    public function forgot()
    {
        $data = array(
            'title' => 'Forgot Password',
        );

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email_exists');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/forgot');
            $this->load->view('auth/footer');
        }
        else
        {
            $result = $this->User_Model->forgot($this->input->post('email'));

            echo $result;
        }
    }

    public function verify($uid,$code){

    }

    public function check_email_exists($email)
    {
        if(!empty($email))
        {
            $result = $this->User_Model->check_email_exists($email);

            if ($result) {
                $this->form_validation->set_message("check_email_exists", "This email isn't associated with an account");
                return FALSE;
            } else {
                return TRUE;
            }
        }
        else
        {
            $this->form_validation->set_message("check_email_exists", "The Email field is required.");
        }
    }

    public function logout()
    {
        $this->load->helper(array('url'));

        $this->load->driver('cache');
        $this->session->sess_destroy();
        $this->cache->clean();
        ob_clean();

        redirect('login');
    }

}