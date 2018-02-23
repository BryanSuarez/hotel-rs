<?php

/**
 * Main class
 */
class Ccalendar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mcalendar');
    }
    /**
     * summary
     */
    public function index()
    {
        //loading view
        $this->load->view('vcalendar');
    }

    public function getEvents()
    {
        $r = $this->Mcalendar->getEvents();
        echo json_encode($r);
    }

    public function updateEvent()
    {
        //get data
        $param['id'] =  $this->input->post('id');
        $param['start'] =  $this->input->post('start');
        $param['end'] =  $this->input->post('end');

        $r = $this->Mcalendar->updateEvent($param);

        echo $r;
    }
}