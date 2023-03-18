<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MCodeJournale extends CI_Model {
          public function ajout($nom){
            $this->db->query("INSERT INTO CodeJournale VALUES ('s_code'||NEXTVAL('s_code'),'$nom')");
          }
          public function listeCodeJournale(){
            $query = $this->db->query("SELECT * FROM CodeJournale order by idCodeJournale asc ");
            return $query->result_array();
          }
          public function getCodeJournale($code){
            $query = $this->db->query("SELECT * FROM CodeJournale where idcodejournale='$code' order by idCodeJournale asc ");
            return $query->result_array();
          }

    }
?>