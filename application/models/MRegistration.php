<?php

class MRegistration extends CI_Model
{
    protected function getUserId($nom, $mdp){
        $query=$this->db->get_where('entreprise',array('nom'=> $nom, 'mdp'=>$mdp));
        return $query->result_array();
    }
    public function checkLogin($nom, $mdp){
        $result = $this->getUserId($nom, $mdp);
        if(count($result)==1) return $result[0];
        return false;
    }
}