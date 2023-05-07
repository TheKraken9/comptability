<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MCompte extends CI_Model {
          public function ajout($numero,$intitule,$id){
            $this->db->query("INSERT INTO Compte VALUES ('cpt'||NEXTVAL('s_comp'),'$numero','$intitule','$id')");
          }

        public function ajoutTiers($type,$nom,$intitule,$id){
            $this->db->query("INSERT INTO tiers VALUES ('tie'||NEXTVAL('s_tier'), '$type', '$nom', '$intitule', '$id')");
        }
          public function listeCompte($id){
            $query = $this->db->query("SELECT * FROM Compte  where idEntreprise = '$id' and Numero::text != '0' order by numero ");
            return $query->result_array();
          }

        public function listeCompteTiers($id){
            $query = $this->db->query("SELECT * FROM tiers  where idEntreprise = '$id'");
            return $query->result_array();
        }
          public function isCompteExiste($numero,$id){
            $query = $this->db->query("SELECT * FROM Compte where numero='$numero' and idEntreprise = '$id'");
            $rep = $query->result_array();
            if(count($rep) > 0){
                throw new Exception("Compte ".$numero." existe deja");
            }
          }

        public function isCompteTiersExiste($typetiers, $nom, $intitule, $id){
            $query = $this->db->query("SELECT * FROM tiers where lower(type) = '$typetiers' and lower(nomtiers) = '$nom' and lower(intitulecompte) = '$intitule' and identreprise = '$id'");
            $rep = $query->result_array();
            if(count($rep) > 0){
                throw new Exception("Compte tiers ".$intitule." existe déjà");
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

            public function rechercheCompteTiers($numero,$id){
                $query = $this->db->query("SELECT * FROM tiers where idtiers='$numero' and idEntreprise = '$id'");
                return $query->result_array();
            }
          public function listeNumeroCompte(){
            $query = $this->db->query("SELECT * FROM NumeroCompte");
            return $query->result_array();
          }

          public function whereiscompte($param,$id) {
              if($param == '0'){
                  $query = $this->db->query("select * from compte where lower(numero) like '99999666' and identreprise = '$id'");
                  return $query->result_array();
              }
              $query = $this->db->query("select * from compte where Numero::text != '0' and lower(intitule) like '%$param%' or lower(numero) like '$param%' and identreprise = '$id'");
              return $query->result_array();
          }

        public function whereiscomptetiers($param,$id) {
            $query = $this->db->query("select * from tiers where lower(nomtiers) like '%$param%' or lower(type) like '%$param%' or lower(intitulecompte) like '%$param%' and identreprise = '$id'");
            return $query->result_array();
        }

        public function update($id,$idcompte,$intitule) {
              $this->db->where(array('idcompte' => $idcompte, 'identreprise' => $id));
              return $this->db->update('compte',array('intitule' => $intitule));
        }

        public function updateTiers($id,$idtiers,$type,$nom,$intitule) {
            $this->db->where(array('idtiers' => $idtiers, 'identreprise' => $id));
            return $this->db->update('tiers',array('type' => $type, 'nomtiers' => $nom, 'intitulecompte' => $intitule));
        }

        public function delete($id,$idcompte){
            $this->db->where(array('numero' => $idcompte, 'identreprise' => $id));
            return $this->db->delete('compte');
        }

        public function deleteTiers($id,$idtiers){
            $this->db->where(array('idtiers' => $idtiers, 'identreprise' => $id));
            return $this->db->delete('tiers');
        }

        public function listeTiers($id) {
            $query = $this->db->query("SELECT * FROM tiers where identreprise = '$id'");
            return $query->result_array();
        }

        public function listeNumeroCompteTiers() {
            $query = $this->db->query("SELECT * FROM typetiers");
            return $query->result_array();
        }

        public function insererCSV($csv_data, $id) {
            foreach ($csv_data as $row) {
                $values = [
                    'numero' => $row[0],
                    'intitule' => str_replace("'", "''", $row[1]),
                    'identreprise' => $id
                ];
                $this->ajout($values['numero'],$values['intitule'],$values['identreprise']);
            }
        }
    }
?>