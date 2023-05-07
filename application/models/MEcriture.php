<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MEcriture extends CI_Model {
          public function ajout($idExercice,$idCode,$date,$libelle,$ref,$ident){
            $query = $this->db->query("select NEXTVAL('s_ecr')");
            $res = $query->result_array();
            $id = $res[0]['nextval'];
            $idF = intval($id) + 1;
            $idfin = "s_ecr".$idF;
            $this->db->query("INSERT INTO Ecriture VALUES ('$idfin','$idExercice','$idCode','$date','$libelle','$ref','$ident')");
            return $idfin;
          }
          public function listeToutEcriture($id){
            $query = $this->db->query("SELECT * FROM Ecriture where idEntreprise = '$id' order by idEcriture asc ");
            return $query->result_array();
          }
          public function listeEcriture($idExercice,$idCode,$mois){
            $query = $this->db->query("SELECT * FROM vEcriture where idExercice='$idExercice' and idCodeJournale='$idCode' and mois='$mois' order by jour asc ");
            return $query->result_array();
          }
          public function getEcriture($idEcriture){
            $query = $this->db->query("SELECT * FROM vEcriture where idEcriture='$idEcriture' order by jour asc ");
            return $query->result_array();
          }

          public function supprimeEcriture($idExercice,$id) {
              $this->db->where(array('idexercice'=>$idExercice,'identreprise'=>$id));
              return $this->db->delete('ecriture');
          }

          public function importer($csv_data, $ident, $idExercice, $idCode){
              echo $idExercice,$ident,$idCode;
              foreach ($csv_data as $row) {
                  $values = [
                      'date' => $row[0],
                      'ref_piece' => $row[1],
                      'libelle' => $row[5]
                  ];
                  $idecr = $this->ajout($idExercice,$idCode,$values['date'],$values['libelle'],$values['ref_piece'],$ident);
                  break;
              }
              reset($csv_data);
                foreach ($csv_data as $row) {
                    $values = [
                        'date' => $row[0],
                        'compte' => $row[2],
                        'tiers' => $row[3],
                        'credit' => $row[7],
                        'debit' => $row[6]
                    ];
                    $this->ajoutLigne($idecr, $values['compte'],$values['tiers'],$values['credit'],$values['debit'],$ident);
                }
          }

        public function ajoutLigne($idEcriture,$idCompte,$idtiers,$credit,$debit,$id){
            if($idtiers != ''){
                $res = $this->db->query("SELECT * FROM tiers where lower(nomTiers)=lower('$idtiers') and idEntreprise = '$id'")->result_array();
                if(count($res) > 0){
                    //$tiers[$i] = $res[0]['idtiers'];
                }else{
                    $this->db->query("INSERT INTO Tiers VALUES ('s_tier'||NEXTVAL('s_tier'),'Tiers','$idtiers','$idtiers','$id')");
                }
            }
            if($credit ==''){
                $credit = "0.0";
                $debit = floatval(str_replace(',', '', $debit));
            }
            elseif($debit == ''){
                $debit = "0.0";
                $credit = floatval(str_replace(',', '', $credit));
            } else {
                $credit = floatval(str_replace(',', '', $credit));
                $debit = floatval(str_replace(',', '', $debit));
            }
            if($idtiers == '' && $idCompte == ''){
                $idCompte = 0;
                $this->db->query("INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'$idEcriture','$idCompte',null,'$credit','$debit','$id')");
            }
            elseif($idCompte == ''){
                $idCompte = 0;
                $this->db->query("INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'$idEcriture','$idCompte',null,'$credit','$debit','$id')");
            }
            elseif($idtiers == ''){
                $this->db->query("INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'$idEcriture','$idCompte',null,'$credit','$debit','$id')");
            }
            else{
                $this->db->query("INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'$idEcriture','$idCompte','$idtiers','$credit','$debit','$id')");
            }
        }
    }
?>