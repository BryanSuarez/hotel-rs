<?php

/**
 * summary
 */
class Mcalendar extends CI_Model
{
    public function getEvents()
    {
        $this->db->select('id, name title, date_begin start, date_end end');
        $this->db->from('event');

        return $this->db->get()->result();
    }

    public function updateEvent($param)
    {
        $fields = [
            'date_begin' => $param['start'],
            'date_end' => $param['end']
        ];


        $this->db->where('id',$param['id']);
        $this->update('event', $fields);

        if ($this->affected_rows() == 1) {
            return 1;
        }else{
            return 0;
        }
    }
}