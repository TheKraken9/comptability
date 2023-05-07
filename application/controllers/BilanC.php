<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/services/Exercice.php');
class BilanC extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index(){
		
	}
	public function grandLivre(){
        $id = $_SESSION['entreprise']['identreprise'];
		$idExercice = $this->input->get("idExercice");
		$this->load->model('MExercice','exe');
		$data = array();
		$data['id'] = array($idExercice);
		$data['listNum'] = $this->exe->getListeCompteFromGL($idExercice);
		$data['exercice']=$this->exe->getExercice($idExercice,$id);
        $data['page'] = array("","active","");
	    $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('GrandLivre',$data);
	}
	public function Livre(){
        $id = $_SESSION['entreprise']['identreprise'];
		$idExercice = $this->input->get("idExercice");
		$num = $this->input->get("num");
		$this->load->model('MExercice','ecr');
		$exe = new Exercice();
		$data = array();
		$list = $this->ecr->getGrandLivre($idExercice,$num);
		$data['livre'] = $this->ecr->getGrandLivre($idExercice,$num);
		$data['exercice']=$this->ecr->getExercice($idExercice,$id);
		$data['num'] = array($num);
		$data['sc'] = array($exe->getSoldeCreditaire($list));
		$data['sd'] = array($exe->getSoldeDebitaire($list));
		$this->load->helper('url');
		$this->load->view('livreCompte',$data);
	}
	public function detailsTiers(){
        $id = $_SESSION['entreprise']['identreprise'];
		$idExercice = $this->input->get("idExercice");
		$idTiers = $this->input->get("idTiers");
		$this->load->model('MExercice','ecr');
		$this->load->model('MTiers','tiers');
		$data = array();
		$data['LTiers'] = $this->tiers->getDetailsTiers($idExercice,$idTiers,$id);
		$data['tiers'] = $this->tiers->getTiers($idTiers,$id);
		$data['exercice']=$this->ecr->getExercice($idExercice,$id);
        $data['page'] = array("","active","");
		$this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('detailsTiers',$data);
	}
	public function balance(){
        $id = $_SESSION['entreprise']['identreprise'];
		$idExercice = $this->input->get("idExercice");
		$this->load->model('MExercice','ecr');
		$data = array();
		$data['Lbalance'] = $this->ecr->getBalance($idExercice);
		$data['somme'] = $this->ecr->getTotalSoldeBalance($idExercice);
		$data['exercice']=$this->ecr->getExercice($idExercice,$id);
        $data['page'] = array("","active","");
	    $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('balance',$data);
	}
	public function chercheBalance(){
        $id = $_SESSION['entreprise']['identreprise'];
		$idExercice = $this->input->get("idExercice");
		$date = $this->input->get("date");
		$this->load->model('MExercice','ecr');
		$data = array();
		$data['Lbalance'] = $this->ecr->getBalanceParametre($idExercice,$date);
		$data['somme'] = $this->ecr->getTotalSoldeBalanceParametre($idExercice,$date);
		$data['exercice']=$this->ecr->getExercice($idExercice,$id);
        $data['page'] = array("","active","");
	    $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('balance',$data);
	}

    public function etatFinancier(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get("idExercice");
        $data['page'] = array("","active","");
        $data['idexercice'] = $idExercice;
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$data);
        $this->load->model("MWelcome",'profil');
        $this->load->model("MExercice",'exo');
        $data['exoinfo'] = $this->exo->getExercice($idExercice,$id);
        $data['infos'] = $this->profil->getMyEntreprise($id);
        $this->load->view('listEtatFinancier', $data);
    }

    public function modifier() {
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get("idExercice");
        $this->load->model('MExercice','ecr');
        $data = array();
        $data['exos'] = $this->ecr->getListeExercice($idExercice,$id);
        $datas['page'] = array("","active","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$datas);
        $this->load->view('modifexo',$data);
    }

    public function supprimer() {
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get("idExercice");
        $this->load->model('MExercice','ecr');
        $this->load->model('MEcriture','ecriture');
        $this->load->model('MMouvement','mvt');
        $this->mvt->supprimeMouvement($idExercice,$id);
        $this->ecriture->supprimeEcriture($idExercice,$id);
        $this->ecr->supprimerexo($idExercice,$id);
        $datas['page'] = array("","active","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$datas);
        $data['listEx'] = $this->ecr->listeExercice($id);
        $this->load->view('listeExercice',$data);
    }
	
}