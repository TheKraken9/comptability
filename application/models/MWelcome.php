<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');

class MWelcome extends CI_Model
{
    public function inserer ($nom, $mdp, $dirigeant, $siege, $datecreation, $numidfiscale, $numstat, $numregcom, $status, $datedebutexo, $devisetenuedecompte, $deviseequi) {
        $query = $this->db->query("select NEXTVAL('s_ent')");
        $res = $query->result_array();
        $id = $res[0]['nextval'];
        $idF = intval($id) + 1;
        $idfin = "ent".$idF;
        $this->db->query("insert into entreprise values ('$idfin', '$nom', '$mdp', '$dirigeant', '$siege', '$datecreation', '$numidfiscale', '$numstat', '$numregcom', '$status', '$datedebutexo', '$devisetenuedecompte', '$deviseequi')");
        $this->db->query("insert into Caractere VALUES ('s_cara' || nextval('s_cara'), 5, '$idfin')");
    }

    public function getMyEntreprise($id) {
        $query = $this->db->query("select * from entreprise where identreprise = '$id'");
        return $query->result_array();
    }

    public function update($id,$nom, $mdp, $dirigeant, $siege, $datecreation, $numidfiscale, $numstat, $numregcom, $status, $datedebutexo, $devisetenuedecompte, $deviseequi) {
        $this->db->where('identreprise', $id);
        return $this->db->update('entreprise',array('nom'=>$nom, 'mdp'=>$mdp, 'dirigeant'=>$dirigeant, 'siege'=>$siege, 'datedecreation'=>$datecreation, 'numidfiscale'=>$numidfiscale, 'numstatistique'=>$numstat, 'numregcom'=>$numregcom, 'status'=>$status, 'datedebutexercice'=>$datedebutexo, 'devtenuedecompte'=>$devisetenuedecompte,'devequiv'=>$deviseequi));
    }
}