<?php
/**
 * Created by PhpStorm.
 * User: KoDusk
 * Date: 11/22/2017
 * Time: 11:07 AM
 */

class Tickets extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ticket_Model','',TRUE);
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $data = array(
            'title' => 'Tickets',
            'admin' => $this->session->userdata('admin'),
            'full_name' => $this->session->userdata('fullName')
        );

        $data['tickets'] = $this->Ticket_Model->allTickets();

        $this->load->view('portal/header', $data);
        $this->load->view('tickets/tickets', $data);
        $this->load->view('portal/footer');
    }

    public function view($tid)
    {
        $this->load->helper(array('form', 'url'));
        $data = array(
            'title' => 'Ticket View',
            'admin' => $this->session->userdata('admin'),
            'full_name' => $this->session->userdata('fullName')
        );

        $errors = array();

        if(empty($tid))
        {
            $errors[] = "URL Must contain ticket ID!";
        }

        if(!is_numeric($tid))
        {
            $errors[] = "Ticket id is numeric!";
        }

        if(count($errors) == 0) {
            $data['ticket'] = $this->Ticket_Model->view($tid);
            $data['ticket_replies'] = $this->Ticket_Model->viewReplies($tid);
        }
        else
        {
            redirect('tickets');
        }

        $this->load->view('portal/header', $data);
        $this->load->view('tickets/ticket-view', $data);
        $this->load->view('portal/footer');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('reply', 'Reply', 'trim|required');

        if($this->form_validation->run())
        {
            $data = array(
                'uid' => $this->session->userdata('id'),
                'tid' => $tid,
                'reply' => $this->input->post('reply')
            );

            $result = $this->Ticket_Model->reply($data);

            if($result != false) {
                redirect('tickets/view/'.$tid);
            }
        }
    }

    public function create()
    {
        $this->load->helper(array('form', 'url'));

        $data = array(
            'title' => 'Ticket Create',
            'admin' => $this->session->userdata('admin'),
            'full_name' => $this->session->userdata('fullName')
        );

        $this->load->library('form_validation');

        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('service', 'Related Service', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('portal/header', $data);
            $this->load->view('tickets/create-ticket');
            $this->load->view('portal/footer');
        }
        else
        {
            $data = array(
                'uid' => $this->session->userdata('id'),
                'sid' => 0,
                'subject' => $this->input->post('subject'),
                'description' => $this->input->post('content'),
                'department' => $this->input->post('department'),
                'priority' => 'normal',
                'status' => 'open'
            );

            $result = $this->Ticket_Model->create($data);

            if($result != false)
            {
                redirect('tickets/view/'.$result);
            }
        }
    }
}