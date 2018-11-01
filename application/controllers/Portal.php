<?php
/**
 * Created by PhpStorm.
 * User: kodus
 * Date: 11/17/2017
 * Time: 8:54 PM
 */

class Portal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in'))
        {
            $this->load->helper(array('url'));
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->helper(array('url'));
        $this->dashboard();
    }

    public function dashboard()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Ticket_Model','',TRUE);

        $data = array(
            'title' => 'Dashboard',
            'admin' => $this->session->userdata('admin'),
            'full_name' => $this->session->userdata('fullName')
        );

        $data['tickets'] = $this->Ticket_Model->allTickets();

        $this->load->view('portal/header', $data);
        $this->load->view('portal/dashboard', $data);
        $this->load->view('portal/footer');
    }
}