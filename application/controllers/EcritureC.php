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
        $data['error'] = array('exercice bien ajouté');
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
        $data['listEcriture'] = $this->ecr->listeEcriture($idExercice,$idCode,$mois);
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

    public function modifExercice() {
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idexo');
        $nomE = $this->input->get('nomE');
        $debut = $this->input->get('debut');
        $annee = $this->input->get('annee');
        $exe = new Exercice();
        $dateDeb = $exe->operationDateDebut($debut,$annee);
        $dateFin = $exe->operationDateFin($debut,$annee);
        $this->load->model('MExercice','exe');
        $this->exe->modif($idExercice,$nomE,$dateDeb,$dateFin,$id);
        $data = array();
        $data['error'] = array('exercice bien modifié');
        $data['page'] = array("","active","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$data);
        $this->load->view('ajoutExercice',$data);
    }

    public function importerCSV() {
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->post('idExercice');
        $idCode = $this->input->post('idCode');
        if(!empty($_FILES['csv_file']['tmp_name'])) {
            $csvFile = $_FILES['csv_file']['tmp_name'];
            $handle = fopen($csvFile, "r");
            $csv_data = array();
            fgets($handle);
            while ($data = fgetcsv($handle)) {
                $csv_data[] = $data;
            }
            fclose($handle);
            $this->load->model('MEcriture','ecr');
            $this->ecr->importer($csv_data,$id,$idExercice,$idCode);
            $this->load->helper('url');
            redirect('EcritureC/sousJournale?idExercice='.$idExercice.'&idCode='.$idCode);
        }else{
            echo "tsy mety";
        }
    }

    public function actifs(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
        $data['page'] = array("","active","");
        $data['idexercice'] = $idExercice;
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$data);
        $this->load->model("MWelcome",'profil');
        $this->load->model("MExercice",'exo');
        $data['exoinfo'] = $this->exo->getExercice($idExercice,$id);
        $data['infos'] = $this->profil->getMyEntreprise($id);
        $data['compte20'] = $this->exo->getActifs($idExercice, 20);
        $data['compte21'] = $this->exo->getActifs($idExercice, 21);
        $data['compte22'] = $this->exo->getActifs($idExercice, 22);
        $data['compte23'] = $this->exo->getActifs($idExercice, 23);
        $data['compte25'] = $this->exo->getActifs($idExercice, 25);
        $data['compte13'] = $this->exo->getActifs($idExercice, 13);
        $data['compte3'] = $this->exo->getActifs($idExercice, 3);
        $data['compte4111'] = $this->exo->getActifs($idExercice, 4111);
        $data['compte41'] = $this->exo->getActifs($idExercice, 41);
        $data['compte4112'] = $this->exo->getActifs($idExercice, 4112);
        $data['compte51200'] = $this->exo->getActifs($idExercice, 51200);
        $this->load->view('actifs', $data);
    }

    public function passifs(){
        $id = $_SESSION['entreprise']['identreprise'];
        $idExercice = $this->input->get('idExercice');
        $data['page'] = array("","active","");
        $data['idexercice'] = $idExercice;
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$data);
        $this->load->model("MWelcome",'profil');
        $this->load->model("MExercice",'exo');
        $data['exoinfo'] = $this->exo->getExercice($idExercice,$id);
        $data['infos'] = $this->profil->getMyEntreprise($id);
        $data['compte101'] = $this->exo->getPassifs($idExercice, 101);
        $data['compte106'] = $this->exo->getPassifs($idExercice, 106);
        $data['compte128'] = $this->exo->getPassifs($idExercice, 128);
        $data['compte1281'] = $this->exo->getPassifs($idExercice, 1281);
        $data['compte102'] = $this->exo->getPassifs($idExercice, 102);
        $data['compte13'] = $this->exo->getPassifs($idExercice, 13);
        $data['compte161'] = $this->exo->getPassifs($idExercice, 161);
        $data['compte165'] = $this->exo->getPassifs($idExercice, 165);
        $data['compte401'] = $this->exo->getPassifs($idExercice, 401);
        $data['compte4113'] = $this->exo->getPassifs($idExercice, 4113);
        $data['compte418'] = $this->exo->getPassifs($idExercice, 418);
        $data['compte51202'] = $this->exo->getPassifs($idExercice, 51202);
        $this->load->view('passifs', $data);
    }

    public function getTotalActifsNonCourants(){
        $this->load->model("MExercice",'exo');
        $data['compte20'] = $this->exo->totalActifsNonCourant($idExercice, 20);
    }
}

