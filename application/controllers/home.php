<?php

/**
 * Main class
 */
class Home extends CI_Controller
{
    /**
     * summary
     */
    public function index()
    {
        //loading view
        $info = [
            'title' => 'Inicio',
            'message' => 'Bienvenidos a la app'
        ];
        $this->load->view("home" , $info);
        $result = $this->db->get('post');
        $data = [
            'consulta' => $result 
        ];
        $this->load->view("sample" , $data);
    }
}