<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MCompte extends CI_Model {
          public function ajout($numero,$intitule,$id){
            $this->db->query("INSERT INTO Compte VALUES ('cpt'||NEXTVAL('s_comp'),'$numero','$intitule','$id')");
          }
          public function listeCompte($id){
            $query = $this->db->query("SELECT * FROM Compte  where idEntreprise = '$id'");
            return $query->result_array();
          }
          public function isCompteExiste($numero,$id){
            $query = $this->db->query("SELECT * FROM Compte where numero='$numero' and idEntreprise = '$id'");
            $rep = $query->result_array();
            if(count($rep) > 0){
                throw new Exception("Compte ".$numero." existe deja");
            }
          }
          public function valideCompte($numero, $id){
            $query = $this->db->query("SELECT * FROM Compte where numero='$numero' and idEntreprise = '$id'");
            $rep = $query->result_array();
            echo $numero;
            if(count($rep) <= 0){
                throw new Exception("Compte n'existe pas");
            }
          }
          public function rechercheCompte($numero,$id){
            $query = $this->db->query("SELECT * FROM Compte where numero='$numero' and idEntreprise = '$id'");
            return $query->result_array();
          }
          public function listeNumeroCompte(){
            $query = $this->db->query("SELECT * FROM NumeroCompte");
            return $query->result_array();
          }

          public function whereiscompte($param,$id) {
              $query = $this->db->query("select * from compte where lower(intitule) like '%$param%' and identreprise = '$id'");
              return $query->result_array();
          }
    }
?>