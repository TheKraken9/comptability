<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/services/Exercice.php');
class EcritureC extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
        session_start();
    }
	public function ajoutExercice(){
        $data = array();
        $data['error'] = array('');
        $data['page'] = array("","active","");
	    $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('ajoutExercice',$data);
    }

    public function addExercice(){
        $nomE = $this->input->get('nomE');
        $debut = $this->input->get('debut');
        $annee = $this->input->get('annee');
        $exe = new Exercice();
        $id = $_SESSION['entreprise']['identreprise'];
        $dateDeb = $exe->operationDateDebut($debut,$annee);
        $dateFin = $exe->operationDateFin($debut,$annee);
        $this->load->model('MExercice','exe');
        $this->exe->ajout($nomE,$dateDeb,$dateFin,$id);
        $data = array();
        $data['error'] = array('exercice bien ajouter');
        $data['page'] = array("","active","");
	    $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('ajoutExercice',$data);
    }

    public function codeJournale(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
        $this->load->model('MCodeJournale','code');
        $this->load->model('MExercice','exe');
        $data = array();
        $data['listJournale'] = $this->code->listeCodeJournale($id);
        $data['idExe'] = array($idExercice);
        $data['exercice']=$this->exe->getExercice($idExercice,$id);
        $data['page'] = array("","active","");
	    	$this->load->helper('url');
		    $this->load->view('navbar/navbar',$data);
		    $this->load->view('codejournale',$data);
    }

    public function sousJournale(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
        $idCode = $this->input->get('idCode');
        $exe = new Exercice();
        $this->load->model('MExercice','exe');
        $this->load->model('MCodeJournale','code');
        $data = array();
        $dt = $this->exe->getExercice($idExercice,$id);
        $data['listmois'] = $exe->listerMois($dt[0]['debut'],$dt[0]['fin']);
        $data['idExe'] = array($idExercice);
        $data['idCode'] = array($idCode);
        $data['journale'] = $this->code->getCodeJournale($idCode,$id);
        $data['exercice']=$this->exe->getExercice($idExercice,$id);
        $this->load->helper('url');
        $data['page'] = array("","active","");
	    	$this->load->helper('url');
		    $this->load->view('navbar/navbar',$data);
		    $this->load->view('sousJournale',$data);
    }

    public function listeEcriture(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
        $idCode = $this->input->get('idCode');
        $mois = $this->input->get('mois');
        $annee = $this->input->get('annee');
        $data = array();
        $this->load->model('MEcriture','ecr');
        $this->load->model('MExercice','exe');
        $this->load->model('MCodeJournale','code');
        $data['lisEcriture'] = $this->ecr->listeEcriture($idExercice,$idCode,$mois,$id);
        $data['idExe'] = array($idExercice);
        $data['idCode'] = array($idCode);
        $data['mois'] = array($mois);
        $data['annee'] = array($annee);
        $data['page'] = array("","active","");
        $data['journale'] = $this->code->getCodeJournale($idCode,$id);
        $data['exercice']=$this->exe->getExercice($idExercice,$id);
        $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('listeEcriture',$data);
    }
}

