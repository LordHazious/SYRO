<?php
/**
 * Created by PhpStorm.
 * Auth: KoDusk
 * Date: 11/15/2017
 * Time: 2:10 PM
 */

class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'apikey',
            'smtp_pass' => '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',
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));
    }

    public function login($email, $password)
    {
        $this->db->select('uid, email, password, full_name, status, register_date');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where("status != -1");
        $this->db->limit(1);

        $query = $this->db->get();

        $user = $query->row_array();

        if($query->num_rows() == 1)
        {
            if(password_verify($password,$user['password']))
            {
                unset($user);
                return $query->row();
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function register($data)
    {
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email', $data['email']);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 0)
        {
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0)
            {
                //$this->db->insert('user_verify', array( => , ));
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function forgot($email)
    {
        $this->email->from('portal@syrostudios.com', 'Syro Portal');
        $this->email->to($email);
        $this->email->subject('Account Recovery');
        $this->email->message('Recovery Password');
        $this->email->send();

        return $this->email->print_debugger();
    }

    public function check_verify($uid, $code)
    {
        $query = $this->db->get_where('user_verify', array('uid' => $uid, 'code' => $code));

        if ($query->num_rows() >= 1)
        {
            $record = $query->row_array();
            die($record['date']);
        }
        else
        {
            return false;
        }
    }


    public function check_user_admin($email)
    {
        $query = $this->db->get_where('users', array('email' => $email, 'status' => 4));

        if ($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));

        if ($query->num_rows() == 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}