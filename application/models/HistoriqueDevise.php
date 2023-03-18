<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MHistoriqueDevise extends CI_Model {
          public function ajout($idMouvement,$idDevise,$date,$prix){
            $this->db->query("INSERT INTO HistoriqueDevise VALUES ('s_histo'||NEXTVAL('s_histo'),'$idMouvement','$idDevise',$date,$prix)");
          }
          public function listeHistoriqueDevise(){
            $query = $this->db->query("SELECT * FROM HistoriqueDevise order by idHisto asc ");
            return $query->result_array();
          }
    }
?>