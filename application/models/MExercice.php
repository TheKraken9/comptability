<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MExercice extends CI_Model {
          public function ajout($nom,$debut,$fin,$id){
              $deb = $debut;
              $fi = $fin;
            $this->db->query("INSERT INTO Exercice VALUES ('s_ex'||NEXTVAL('s_ex'),'$nom','$deb','$fi','$id')");
          }

          public function modif($idexercice,$nom,$debut,$fin,$id) {
              $this->db->where(array('idexercice'=>$idexercice,'identreprise'=>$id));
              return $this->db->update('exercice', array('nomexercice'=>$nom,'debut'=>$debut,'fin'=>$fin,'identreprise'=>$id));
          }

          public function supprimerexo($idexo,$id) {
              $this->db->where(array('idexercice'=>$idexo,'identreprise'=>$id));
              return $this->db->delete('exercice');
          }
          public function listeExercice($id){
            $query = $this->db->query("SELECT * FROM Exercice where identreprise = '$id' order by idExercice asc ");
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
          public function getListeCompteFromGL($idExercice){
            $query = $this->db->query("SELECT numCompte,idtiers from grandLivre where idExercice = '$idExercice' group by numCompte,idtiers order by numcompte asc");
            return $query->result_array(); 
          }
          public function getBalance($idExercice){
            $query = $this->db->query("SELECT * FROM vBalance where idExercice='$idExercice'");
            return $query->result_array(); 
          }

          public function getBalanceFrom($idcodejournal) {
            $query = $this->db->query("SELECT * FROM vBalance where idcodejournal='$idcodejournal'");
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

          public function getListeExercice($idExercice,$id){
              $query = $this->db->query("select idExercice, NomExercice, extract('month' from Debut) as mois, extract('year' from Debut) as an, idEntreprise from exercice where idexercice = '$idExercice' and identreprise = '$id'");
              return $query->result_array();
          }


          public function getActifs($idExercice, $compte)
          {
                $query = $this->db->query("SELECT numCompte,idtiers,debit,credit from grandLivreEtatFinancier where idExercice = '$idExercice' and numCompte like '$compte%' group by numCompte,idtiers,debit,credit order by numcompte asc");
                return $query->result_array();
          }

        public function getActifsNotSpecified($idExercice, $compte, $notincluded)
        {
            $query = $this->db->query("SELECT numCompte,idtiers,debit,credit from grandLivreEtatFinancier where idExercice = 's_ex1' and numCompte like '$compte%' and numCompte not like '$notincluded%' group by numCompte,idtiers,debit,credit order by numcompte asc");
            return $query->result_array();
        }

        public function totalActifsNonCourant($idExercice, $compte)
        {
            $query = $this->db->query("SELECT numCompte,idtiers,debit from grandLivreEtatFinancier where idExercice = '$idExercice' and numCompte like '$compte%' group by numCompte,idtiers,debit order by numcompte asc");
            return $query->result_array();
        }

        public function getPassifs($idExercice, $compte)
        {
            $query = $this->db->query("SELECT numCompte,idtiers,debit,credit from grandLivreEtatFinancier where idExercice = '$idExercice' and numCompte like '$compte%' group by numCompte,idtiers,debit,credit order by numcompte asc");
            return $query->result_array();
        }
          
    }
?>