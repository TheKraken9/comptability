<?php
class Ecriture
{
    public function isCompteTiers($numero){
        $a = false;
        if($numero[0] == '4'){
            $a = true;
        }
        return $a;
    }
    public function analySeDebitCredit($chiffre){
        $a = $chiffre;
        if($chiffre !=''){
            $av = explode(",",$chiffre);
            $a = $this->enleveEspace($av[0]);
        }
        return $a;
    }
    public function constructionDate($date){
        $d = explode("/",$date);
        return $d[2]."-".$d[1]."-".$d[0];
    }
    public function enleveEspace($chiff){
        $chiffre = preg_replace('/[[:^print:]]/','',$chiff);
        $rep = str_replace(' ','',$chiffre);
        $rep = str_replace(' ','',$rep);
       /* $i = 0;
        $rep = "";
        for($i = 0 ; $i < count($ap) ; $i++){
            $rep = $rep.$ap[$i];
        }*/
        echo $rep.".0";
        return $rep.".0";
    }
    public function analyseVideDebitCredit($credit,$debit){
        $i = 0;
        for($i = 0 ; $i < count($debit) ;$i++){
            if(($debit[$i] == '') && ($credit[$i] == '')){
                throw new Exception("remplissez debit ou credit ");
            }
            if(($debit[$i] != '') && ($credit[$i] != '')){
                throw new Exception("choisir simplement 1 colonne soit debit ou credit");
            }
        }
    }
    public function traitementLibelleJourRef($jour,$libelle,$ref){
        if($jour == ''){
            throw new Exception("le jour est obligatoire");
        }
        if($libelle == ''){
            throw new Exception("le libelle est obligatoire");
        }
        if($ref == ''){
            throw new Exception("le ref-piece est obligatoire");
        }
    } 
    public function traitementCompteTiers($compte,$tiers){
        $i = 0;
        for($i = 0 ; $i < count($compte) ; $i++){
            if($compte[$i][0] != '4' && $tiers[$i] !=''){
                throw new Exception("seul le compte 4 peut avoir de tiers ".$compte[$i][0]." = ".$tiers[$i]);
            }
        }
    }
    public function traitementDebitCredit($credit,$debit){
        $tcredit = $this->calculeSomme($credit);
        $tdebit = $this->calculeSomme($debit);
        $rep = $tcredit - $tdebit;
        if($tcredit != $tdebit){
            if($rep < 0){
                $rep = (-1)*($rep);
                throw new Exception("le debit est superieur a ".$rep." par rapport au credit");
            }else{
                throw new Exception("le credit est superieur a ".$rep." par rapport au debit");
            }
        }
    }
    public function calculeSomme($tab){
        $i = 0;
        $somme = 0;
        for($i = 0 ; $i < count($tab) ; $i++){
            if($tab[$i]!=''){
                $somme = $somme + $tab[$i];
            }
        }
        return $somme;
    }
}
?>