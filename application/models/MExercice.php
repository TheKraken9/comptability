<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MExercice extends CI_Model {
          public function ajout($nom,$debut,$fin,$id){
              $deb = $debut;
              $fi = $fin;
            $this->db->query("INSERT INTO Exercice VALUES ('s_ex'||NEXTVAL('s_ex'),'$nom','$deb','$fi','$id')");
          }
          public function listeExercice(){
            $query = $this->db->query("SELECT * FROM Exercice order by idExercice asc ");
            return $query->result_array();
          }
          public function getExercice($id, $ident){
            $query = $this->db->query("SELECT * FROM Exercice where idExercice='$id' and idEntreprise='$ident' order by idExercice asc ");
            return $query->result_array();
          }
          public function getGrandLivre($idExercice,$numCompte){
            $query = $this->db->query("SELECT * FROM grandlivre where idExercice='$idExercice' and numcompte='$numCompte'");
            return $query->result_array(); 
          }
          public function getListeCompteFromGL(){
            $query = $this->db->query("SELECT numCompte from grandLivre group by numCompte order by numcompte asc");
            return $query->result_array(); 
          }
          public function getBalance($idExercice){
            $query = $this->db->query("SELECT * FROM vBalance where idExercice='$idExercice'");
            return $query->result_array(); 
          }
          public function getTotalSoldeBalance($idExercice){
            $query = $this->db->query("SELECT SUM(solded) as sd,SUM(soldec) as sc from vBalance where idExercice='$idExercice'");
            return $query->result_array(); 
          }
          public function getBalanceParametre($idExercice,$date){
            $query = $this->db->query("SELECT * FROM vBalance where idExercice='$idExercice' and date <= '$date'");
            return $query->result_array(); 
          }
          public function getTotalSoldeBalanceParametre($idExercice,$date){
            $query = $this->db->query("SELECT SUM(solded) as sd,SUM(soldec) as sc from vBalance where idExercice='$idExercice' and date <= '$date'");
            return $query->result_array(); 
          }
          
    }
?>