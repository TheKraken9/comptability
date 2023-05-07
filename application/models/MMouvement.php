<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MMouvement extends CI_Model {
          public function ajout($idEcriture,$idCompte,$idtiers,$credit,$debit,$id){
            if($credit ==''){
              $credit = "0.0";
            }
            if($debit == ''){
              $debit = "0.0";
            }
            if($idtiers == ''){
              $this->db->query("INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'$idEcriture','$idCompte',null,$credit,$debit,'$id')");
            }
            else{
              $this->db->query("INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'$idEcriture','$idCompte','$idtiers',$credit,$debit,'$id')");
            }
          }
          public function listeMouvementCredit($idEcriture){
            $query = $this->db->query("SELECT * FROM vMouvement where idEcriture='$idEcriture' and debit=0.0 order by idMouvement asc ");
            return $query->result_array();
          }
          public function listeMouvementDebit($idEcriture){
            $query = $this->db->query("SELECT * FROM vMouvement where idEcriture='$idEcriture' and credit=0.0 order by idMouvement asc ");
            return $query->result_array();
          }

          public function supprimeMouvement($idExercice,$id) {
              $query = $this->db->query("DELETE from Mouvement using Ecriture E where Mouvement.idEcriture = E.idEcriture and E.idExercice = '$idExercice' and E.idEntreprise = '$id'");
          }
    }
?>