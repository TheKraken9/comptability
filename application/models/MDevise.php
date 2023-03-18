<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MDevise extends CI_Model {
          public function ajout($nom){
            $this->db->query("INSERT INTO Devise VALUES ('s_dev'||NEXTVAL('s_dev'),'$nom')");
          }
          public function listeDevise(){
            $query = $this->db->query("SELECT * FROM Devise order by idDevise asc ");
            return $query->result_array();
          }
    }
?>