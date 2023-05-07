<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MTiers extends CI_Model {
          public function ajout($nom,$type,$nomtiers,$intitulecompte,$ident){
            $query = $this->db->query("select NEXTVAL('s_tier')");
            $res = $query->result_array();
            $id = $res[0]['nextval'];
            $idF = intval($id) + 1;
            $idfin = "s_tier".$idF;
            $this->db->query("INSERT INTO Tiers VALUES ('$idfin','$type','$nomtiers','$intitulecompte','$ident')");
            return $nomtiers;
          }
          public function isExisteTiers($nom,$id){
              $a = false;
            $query = $this->db->query("SELECT * FROM tiers where nomTiers='$nom' and idEntreprise = '$id'");
             return $query->result_array();
           
          }
          public function getTiers($idTiers,$id){
            $query = $this->db->query("SELECT * FROM tiers where idtiers='$idTiers' and idEntreprise = '$id'");
             return $query->result_array();
          }
          public function getDetailsTiers($idExercice,$idTiers){
            $query = $this->db->query("SELECT date,libelle,tiers,SUM(credit) as credit, SUM(debit) as debit FROM grandLivre where idexercice='$idExercice' and idtiers='$idTiers' group by (date,libelle,tiers)");
            return $query->result_array();
          }

          public function getAllTiers($id) {
              $query = $this->db->query("select * from tiers where identreprise = '$id'");
              return $query->result_array();
          }
    }
?>