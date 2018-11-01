<?php
/**
 * Created by PhpStorm.
 * User: KoDusk
 * Date: 11/22/2017
 * Time: 10:40 AM
 */

class Ticket_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function allTickets()
    {
        $this->db->select('tid, subject, description, department, priority, status, date_created');
        $this->db->from('tickets');
        //$this->db->where_in('tid', $tid);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
    }

    public function create($data)
    {
        $this->db->insert('tickets', $data);
        if ($this->db->affected_rows() > 0)
        {
            return $this->db->insert_id();;
        }
        else
        {
            return false;
        }
    }

    public function view($tid)
    {
        $this->db->select('tid, subject, description, department, priority, status, date_created');
        $this->db->from('tickets');
        $this->db->where_in('tid', $tid);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
    }

    public function reply($data)
    {
        $this->db->insert('ticket_replies', $data);
        if ($this->db->affected_rows() > 0)
        {
            return $this->db->insert_id();;
        }
        else
        {
            return false;
        }
    }

    public function viewReplies($tid)
    {
        $this->db->select('tid, uid, reply, date_replied');
        $this->db->from('ticket_replies');
        $this->db->where_in('tid', $tid);
        $this->db->order_by('date_replied', 'asc');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}