<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    public function login()
    {
        $this->load->helper('url');
        $datas = array();
        $datas['page'] = array("active","","");
        $this->load->view('navbar/navbar', $datas);
        $this->load->view('login');
    }

    public function connect()
    {
        $this->load->helper('url');
        $datas = array();
        $datas['page'] = array("","active","");
        $this->load->view('navbar/navbar', $datas);
        $this->load->view('connect');
    }

    public function logout()
    {
        $this->load->helper('url');
        session_start();
        unset($_SESSION['entreprise']);
        $datas = array();
        $datas['page'] = array("","active","");
        $this->load->view('navbar/navbar', $datas);
        $this->load->view('connect');
    }

    public function wantconnect()
    {
        if(isset($_POST['nom'], $_POST['mdp'])){
            $nom = $_POST['nom'];
            $mdp = $_POST['mdp'];
            $this->load->model("MRegistration");
            $login = $this->MRegistration->checkLogin($nom, $mdp);
            if($login != false){
                session_start();
                $_SESSION['entreprise'] = $login;
                $ident = $_SESSION['entreprise']['identreprise'];
                $this->load->helper('url');
                $datas = array();
                $datas['page'] = array("active","","");
                $this->load->view('navbar/navbar', $datas);
                $this->load->model('MCompte','comp');
                $data = array();
                $data['listCompte'] = $this->comp->listeCompte($ident);
                $this->load->view('listCompte',$data);
                //echo json_encode(0);

            }else {
                $this->load->helper('url');
                $datas = array();
                $datas['page'] = array("","active","");
                $this->load->view('navbar/navbar', $datas);
                $this->load->view('connect');
                //echo json_encode(1);
            }
        }
    }

    public function wantregister() {
        if(isset($_POST['nom'], $_POST['mdp'], $_POST['dirigeant'], $_POST['siege'], $_POST['datecreation'], $_POST['numidfiscale'], $_POST['numstat'], $_POST['numregcom'], $_POST['status'], $_POST['datedebutexo'], $_POST['devisetenuedecompte'], $_POST['deviseequi'])) {
            $nom = $_POST['nom'];
            $mdp = $_POST['mdp'];
            $dirigeant = $_POST['dirigeant'];
            $siege = $_POST['siege'];
            $datecreation = $_POST['datecreation'];
            $numidfiscale = $_POST['numidfiscale'];
            $numstat = $_POST['numstat'];
            $numregcom = $_POST['numregcom'];
            $status = $_POST['status'];
            $datedebutexo = $_POST['datedebutexo'];
            $devisetenuedecompte = $_POST['devisetenuedecompte'];
            $deviseequi = $_POST['deviseequi'];
            //echo "leslie<3";
            $this->load->model("MWelcome", "spec");
            $this->spec->inserer($nom, $mdp, $dirigeant, $siege, $datecreation, $numidfiscale, $numstat, $numregcom, $status, $datedebutexo, $devisetenuedecompte, $deviseequi);
            $this->load->helper('url');
            $datas = array();
            $datas['page'] = array("active","","");
            $this->load->view('navbar/navbar', $datas);
            $this->load->view('login');
        }
    }

	public function index()
	{
        $this->load->helper('url');
		$this->load->model('MCaractere','cara');
        $bool = $this->cara->isPresenceCaractere();
		$datas = array();
		$datas['page'] = array("active","","");
        if($bool == false){
            $this->load->helper('url');
			$this->load->view('navbar/navbar',$datas);
		    $this->load->view('Nbre_Caractere');
        }else{
            $this->load->model('MCompte','comp');
            $data = array();
            $data['listCompte'] = $this->comp->listeCompte();
            $this->load->helper('url');
			$this->load->view('navbar/navbar',$datas);
		    $this->load->view('listCompte',$data);
        }
	}

    public function search()
    {
        session_start();
        $id = $_SESSION['entreprise']['identreprise'];
        $param = strtolower($_POST['search']);
        $datas = array();
        $datas['page'] = array("active","","");
        $this->load->model('MCompte','comp');
        $data['listCompte'] = $this->comp->whereiscompte($param,$id);
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$datas);
        $this->load->view('listCompte',$data);
    }

	public function ecriture(){
        session_start();
        $id = $_SESSION['entreprise']['identreprise'];
        $this->load->model('MExercice','ex');
		$data = array();
		$data['listEx'] = $this->ex->listeExercice($id);
		$data['page'] = array("","active","");
		$this->load->helper('url');
		$this->load->view('navbar/navbar',$data);
		$this->load->view('listeExercice',$data);
	}
	public function compte(){
        session_start();
        $id = $_SESSION['entreprise']['identreprise'];
        $this->load->model('MCaractere','cara');
        $bool = $this->cara->isPresenceCaractere($id);
		$datas = array();
		$datas['page'] = array("active","","");
        if($bool == false){
            $this->load->helper('url');
			$this->load->view('navbar/navbar',$datas);
		    $this->load->view('Nbre_Caractere');
        }else{
            $this->load->model('MCompte','comp');
            $data = array();
            $data['listCompte'] = $this->comp->listeCompte($id);
            $this->load->helper('url');
			$this->load->view('navbar/navbar',$datas);
		    $this->load->view('listCompte',$data);
        }
	}
    public function ajoutCaractere() {
        $carat = $this->input->get('nbre');
		$this->load->model('MCaractere','cara');
        $this->cara->ajout($carat);
        $this->load->model('MCompte','comp');
            $data = array();
            $data['listCompte'] = $this->comp->listeCompte();
            $this->load->helper('url');
		    $this->load->view('listCompte',$data);
    }

    public function modifier() {
        session_start();
        $id = $_SESSION['entreprise']['identreprise'];
        $compte = $_GET['url'];
        $datas = array();
        $datas['page'] = array("active","","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$datas);
        $this->load->model('MCompte','compte');
        $data = array();
        $data['comptes'] = $this->compte->rechercheCompte($compte,$id);
        $this->load->view('modificationCompte', $data);
    }

    public function confirmModification() {
        session_start();
        $id = $_SESSION['entreprise']['identreprise'];
        $idcompte = $_POST['idcompte'];
        $intitule = $_POST['intitule'];
        $datas = array();
        $datas['page'] = array("active","","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$datas);
        $this->load->model('MCompte','compte');
        $this->compte->update($id,$idcompte,$intitule);
        $data = array();
        $data['listCompte'] = $this->compte->listeCompte($id);
        $this->load->view('listCompte',$data);
    }

    public function supprimer() {
        session_start();
        $id = $_SESSION['entreprise']['identreprise'];
        $idcompte = $_GET['url'];
        $datas = array();
        $datas['page'] = array("active","","");
        $this->load->helper('url');
        $this->load->view('navbar/navbar',$datas);
        $this->load->model('MCompte','compte');
        $this->compte->delete($id,$idcompte);
        $data = array();
        $data['listCompte'] = $this->compte->listeCompte($id);
        $this->load->view('listCompte',$data);
    }
}