<?php
class Exercice
{
    public function operationDateFin($moisDeb,$annee){
        date_default_timezone_set('America/New_York');
        $debut = $annee."-".$moisDeb."-"."01";
       // $fin = date_add(date_create($debut),date_interval_create_from_date_string("365 days"));
       $date = date('Y-m-d', strtotime($debut. ' + 11 months'));
       return date("Y-m-t", strtotime($date));
    }     
    public function operationDateDebut($moisDeb,$annee){
        $debut = $annee."-".$moisDeb."-"."01";
        return $debut;
        ///return date('Y-m-d', strtotime($debut .'+0 day'));;
    }
    public function listerMois($debut,$fin){
        date_default_timezone_set('America/New_York');
        $list = array();
        $i = 0;
        $dt = $debut;
        $es = "";
        for($i = 0 ; $i <= 11 ; $i ++){
            $list[$i] = $dt;
            $dt = date('Y-m-d', strtotime($dt. ' + 1 months'));
        }
        return $list;
    }
    public function getSoldeCreditaire($list){
        $deb = $this->totalDebit($list);
        $cred = $this->totalCredit($list);
        $cal = $cred - $deb;
        $a = 0;
        if($cal > 0){
            $a = $cal;
        }
        return $a;
    }
    public function getSoldeDebitaire($list){
        $deb = $this->totalDebit($list);
        $cred = $this->totalCredit($list);
        $cal = $deb - $cred;
        $a = 0;
        if($cal > 0){
            $a = $cal;
        }
        return $a;
    }
    public function totalDebit($debit){
        $a = 0;
        foreach($debit as $row){
            $a = $a + intval($row['debit']);
        }
        return $a;
    }    
    public function totalCredit($credit){
        $a = 0;
        foreach($credit as $row){
            $a = $a + intval($row['credit']);
        }
        return $a;
    }
}
?>