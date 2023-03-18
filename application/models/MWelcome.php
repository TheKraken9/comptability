<?php if (! defined('BASEPATH')) exit('NO direct script access allowed');

class MWelcome extends CI_Model
{
    public function inserer ($nom, $mdp, $dirigeant, $siege, $datecreation, $numidfiscale, $numstat, $numregcom, $status, $datedebutexo, $devisetenuedecompte, $deviseequi) {
        $this->db->query("insert into entreprise values ('ent' || NEXTVAL('s_ent'), '$nom', '$mdp', '$dirigeant', '$siege', '$datecreation', '$numidfiscale', '$numstat', '$numregcom', '$status', '$datedebutexo', '$devisetenuedecompte', '$deviseequi')");
    }
}