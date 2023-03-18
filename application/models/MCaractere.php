<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');
    class MCaractere extends CI_Model {
          public function isPresenceCaractere($id){
            $query = $this->db->query("SELECT * FROM Caractere where idEntreprise = '$id'");
            $nbre = $query->result_array();
            $a = false;
            if(count($nbre) > 0){
                $a = true;
            }
            return $a;
          }
          public function ajout($nombre,$id){
            $this->db->query("INSERT INTO Caractere VALUES ('cara_'||NEXTVAL('s_Cara'),$nombre,'$id')");
          }
          public function getNombreCaractere($id){
            $query = $this->db->query("SELECT * FROM Caractere where idEntreprise = '$id'");
            $nbre = $query->result_array();
            return $nbre[count($nbre) - 1]['nombre'];
          }
    }
?>