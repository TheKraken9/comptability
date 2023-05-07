<?php
//include('/opt/lampp/htdocs/comptability/application/libraries/Pdf.php');
class Compte
{
      private $idCompte = "";
      private $numero = "";
      private $intitule = "";

      public function traitementCompte($num,$intitule){
            if($num == 0){
                throw new Exception("veillez remplir le numero");
            }
            if($intitule ==''){
                throw new Exception("veillez remplir l'intitule");
            }
      }

    public function traitementCompteTiers($nom,$intitule){
        if($nom == ''){
            throw new Exception("veillez remplir le nom");
        }
        if($intitule ==''){
            throw new Exception("veillez remplir l'intitule");
        }
    }
      public function traitementNumero($num,$numero,$nbreCara){
            $numI = $num."".$numero;
            $i = 0;
            for ($i=strlen($numI) ; $i < $nbreCara ; $i++) { 
                $numI = $numI . "0";
            }
            if(strlen($numI) > $nbreCara){
                throw new Exception("le numero de compte ne depasse pas ".$nbreCara." caractere");
            }
            if($numI[2] == '0'){
                throw new Exception("le troisieme caractere ne doit pas etre 0 ");
            }
            return $numI;
      }
      public function listeCompteEnPdf($list){
            $pdf = new Pdf();
			$pdf->SetFont('Arial','',10);
			$pdf->AddPage();
		    $tai = array(40,100);
            $header = array('NUM COMPTE','INTITULE');
			$pdf->BasicTable($tai,$header,$this->conversionArray($list));
			$pdf->Output();
      }
      public function conversionArray($data){
            $list = array();
            $i = 0;
            $e = 0;
            for ($i=0; $i < count($data) ; $i++) { 
                $list[$i][0] = $data[$i]['numero'];
                $list[$i][1] = $data[$i]['intitule'];
            }
         return $list;
      }
      public function conversionArrayNumeroCompe($list){
          $rep = array();
          $i = 0;
          foreach($list as $row){
              $rep[$i] = $row['numero'];
              $i++;
          }
          return $rep;
      }
}
?>