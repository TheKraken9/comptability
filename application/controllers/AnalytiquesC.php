<?php

class AnalytiquesC extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function home() {
        $id = $_SESSION['entreprise']['identreprise'];
        $idcodejournal = $this->input->get('idcodejournal');
        $datas = array();
        $datas['page'] = array("","","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar', $datas);
        $this->load->view('analytiques');
    }

    public function nouveau() {
        $id = $_SESSION['entreprise']['identreprise'];
        $idcodejournal = $this->input->get('idcodejournal');
        $datas = array();
        $datas['page'] = array("","","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar', $datas);
        $this->load->view('nouveauAnalytique');
    }
}