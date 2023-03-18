<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/services/Ecriture.php');
class ExportC extends CI_Controller {

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
	public function index()
	{
        $idExercice = $this->input->post("id");
        $ecrit = new Ecriture();
        $this->load->model('MEcriture','ecr');
        $this->load->model('MCompte','cmp');
        $this->load->model('MMouvement','mvt');
        $this->load->model('MTiers','tiers');
       $emplacement = $_FILES['fichier']['tmp_name'];
        $i = 0;
        $idecr = "";
        $idTiers = "";
        $file = fopen($emplacement,"a+");
		while(!feof($file)) {
			$line = fgets($file);
			$a = explode(";",$line);
            if($i > 0){
                ///////////DATE      REF PIECE COMPTE    TIERS    INTITULE   LIBELLE   DEBIT     CREDIT 
                if($i == 1){
                    $idecr = $this->ecr->ajout($idExercice,"cd4",$a[0],$a[5],$a[1]);
                }
                $id = $this->cmp->rechercheCompte($a[2]);
                $idTiers = '';
                if($a[3] != ''){
                    $res = $this->tiers->isExisteTiers($a[3]);
                    if(count($res) > 0){
                        $idTiers = $res[0]['idtiers'];
                    }else{
                        $idTiers  = $this->tiers->ajout($a[3]);
                    }
                }
                $this->mvt->ajout($idecr,$id[0]['idcompte'],$idTiers,$ecrit->analySeDebitCredit($a[7]),$ecrit->analySeDebitCredit($a[6]));
               // echo $i." ".$a[0]." ".$a[1]." ".$a[2]." ".$a[3]." ".$a[4]." ".$a[5]." ".$a[6]." ".$a[7]."</br>";
            }
			
            $i++;
		}
		fclose($file);
    }
}