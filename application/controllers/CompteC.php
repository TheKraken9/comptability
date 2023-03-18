<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/services/Compte.php');
class CompteC extends CI_Controller {

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

	public function index()
	{
		$this->load->model('MCompte','comp');
            $data = array();
            $data['listNumero'] = $this->comp->listeNumeroCompte();
            $datas = array();
		    $data['page'] = array("active","","");
            $data['error'] = array("");
            $this->load->helper('url');
            $this->load->view('navbar/navbar',$data);
		    $this->load->view('ajoutCompte',$data);
	}
    public function ajoutCompte(){
        $id = $_SESSION['entreprise']['identreprise'];
        $nume = $this->input->get('nume');
        $numero = $this->input->get('numero'); 
        $intitule = $this->input->get('intitule');
        $this->load->model('MCompte','comp');
        $this->load->model('MCaractere','cara');
        $compte = new Compte();
        try {
            $compte->traitementCompte($numero,$intitule);
            $numeV = $compte->traitementNumero($nume,$numero,$this->cara->getNombreCaractere($id));
            $this->comp->isCompteExiste($numeV, $id);
            $this->comp->ajout($numeV,$intitule,$id);
            $data = array();
            $data['listNumero'] = $this->comp->listeNumeroCompte($id);
            $data['page'] = array("active","","");
            $data['error'] = array('Compte bien ajouter');
            $this->load->helper('url');
            $this->load->view('navbar/navbar',$data);
		    $this->load->view('ajoutCompte',$data);
        } catch (Exception $e) {
            $datas = array();
            $datas['listNumero'] = $this->comp->listeNumeroCompte($id);
            $datas['error'] = array($e->getMessage());
            $data['page'] = array("active","","");
            $this->load->helper('url');
            $this->load->view('navbar/navbar',$data);
		    $this->load->view('ajoutCompte',$datas);
        }
    }
    public function exportePDF(){
        $this->load->model('MCompte','comp');
        $data = $this->comp->listeCompte();
        $compte = new Compte();
        $compte->listeCompteEnPdf($data);
    }
    
}