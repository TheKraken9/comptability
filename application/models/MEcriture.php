<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MEcriture extends CI_Model {
          public function ajout($idExercice,$idCode,$date,$libelle,$ref,$id){
            $query = $this->db->query("select NEXTVAL('s_ecr')");
            $res = $query->result_array();
            $id = $res[0]['nextval'];
            $idF = intval($id) + 1;
            $idfin = "s_ecr".$idF;
            $this->db->query("INSERT INTO Ecriture VALUES ('$idfin','$idExercice','$idCode','$date','$libelle','$ref','$id')");
            return $idfin;
          }
          public function listeToutEcriture($id){
            $query = $this->db->query("SELECT * FROM Ecriture where idEntreprise = '$id' order by idEcriture asc ");
            return $query->result_array();
          }
          public function listeEcriture($idExercice,$idCode,$mois){
            $query = $this->db->query("SELECT * FROM vEcriture where idExercice='$idExercice' and idCodeJournale='$idCode' and mois=$mois order by jour asc ");
            return $query->result_array();
          }
          public function getEcriture($idEcriture){
            $query = $this->db->query("SELECT * FROM vEcriture where idEcriture='$idEcriture' order by jour asc ");
            return $query->result_array();
          }
    }
?>