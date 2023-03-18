<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/services/Ecriture.php');
require_once(APPPATH.'libraries/services/Compte.php');
class SaisieC extends CI_Controller {

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
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
		$idCode = $this->input->get('idCode');
		$mois = $this->input->get('mois');
		$annee = $this->input->get('annee');
		$data = array();
		$data['idExercice'] = array($idExercice);
		$data['idCode'] = array($idCode);
		$data['mois'] = array($mois);
		$data['annee'] = array($annee);
		$this->load->model('MCompte','comp');
		$this->load->model('MMouvement','mvt');
		$this->load->model('MExercice','exe');
        $this->load->model('MCodeJournale','code');
		$comp = new Compte();
		$data['listeCompte'] =$this->comp->listeCompte($id);
		$this->load->model('MDevise','dv');
		$data['listeDevise'] = $this->dv->listeDevise();
		$data['page'] = array("","active","");
        $data['journale'] = $this->code->getCodeJournale($idCode);
        $data['exercice']=$this->exe->getExercice($idExercice,$id);
        $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('saisieEcriture',$data);
    }
	public function listerEcriture(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
        $idCode = $this->input->get('idCode');
        $mois = $this->input->get('mois');
        $annee = $this->input->get('annee');
		$idEcriture = $this->input->get('idEcriture');
		$this->load->model('MEcriture','ecr');
		$this->load->model('MMouvement','mvt');
		$this->load->model('MExercice','exe');
        $this->load->model('MCodeJournale','code');
		$data = array();
		$data['ecriture'] = $this->ecr->getEcriture($idEcriture,$id);
		$data['credit'] = $this->mvt->listeMouvementCredit($idEcriture,$id);
		$data['debit'] = $this->mvt->listeMouvementDebit($idEcriture,$id);
		$data['idExe'] = array($idExercice);
        $data['idCode'] = array($idCode);
        $data['mois'] = array($mois);
        $data['annee'] = array($annee);
		$data['page'] = array("","active","");
        $data['journale'] = $this->code->getCodeJournale($idCode);
        $data['exercice']=$this->exe->getExercice($idExercice,$id);
        $this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('detailsEcriture',$data);
	}
	public function devise(){
		$this->load->helper('url');
		$this->load->view('devise');
	}
    public function addEcriture(){
		$idExercice = $this->input->get('idExercice');
        $idCode = $this->input->get('idCode');
        $mois = $this->input->get('mois');
        $annee = $this->input->get('annee');
          $jour = $this->input->get("jour");
		  $libelle = $this->input->get("libelle");
		  $ref = $this->input->get("ref");
		  $length = $this->input->get("nombre");
		  $i = 0;
		  $er = 0;
		  $compte = array();
		  $tiers = array();
		  $credit = array();
		  $debit = array();
		  for($i = 1 ; $i <= intval($length) ; $i++){
			  $compte[$er] = $this->input->get("compte".$i);
			  $tiers[$er] = $this->input->get("tiers".$i);
			  $credit[$er] = $this->input->get("credit".$i);
			  $debit[$er] = $this->input->get("debit".$i);
			  $er = $er +1;
		  }
		  try {
			$ecr = new Ecriture();
			$ecr->traitementLibelleJourRef($jour,$libelle,$ref);
			$ecr->analyseVideDebitCredit($credit,$debit);
			$ecr->traitementDebitCredit($credit,$debit);
			$ecr->traitementCompteTiers($compte,$tiers);
			$date = $annee."-".$mois."-".$jour;
			$this->load->model('MEcriture','ecr');
			$this->load->model('MCompte','cmp');
			$this->load->model('MMouvement','mvt');
			$this->load->model('MTiers','tiers');
			for($i = 0 ; $i < count($compte) ; $i++){
				$this->cmp->valideCompte($compte[$i]);
				$id = $this->cmp->rechercheCompte($compte[$i]);
			}
			for($i = 0 ; $i < count($compte) ; $i++){
				
				if($i == 0){
					$idecr = $this->ecr->ajout($idExercice,$idCode,$date,$libelle,$ref);
				}
				if($tiers[$i] != ''){
					$res = $this->tiers->isExisteTiers($tiers[$i]);
					if(count($res) > 0){
						$tiers[$i] = $res[0]['idtiers'];
					}else{
						$tiers[$i] = $this->tiers->ajout($tiers[$i]);
					}
				}
				$this->mvt->ajout($idecr,$id[0]['idcompte'],$tiers[$i],$credit[$i],$debit[$i]);
			}
			echo "<script>function rtn() {
				window.history.back();
		   }</script><h1>ecriture bien ajouter</h1><button onclick='rtn()'>retour</button>";
		  } catch (Exception $th) {
		    $data = array();
			$data['error'] = array($th->getMessage());
			$this->load->helper('url');
			$this->load->view('erreur',$data);
		  }	  
    }
}