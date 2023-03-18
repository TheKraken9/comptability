<?php
require('fpdf.php');
class PDF extends FPDF
{
    public function __construct() {
        parent::construct();
    }
        function BasicTable($taile,$header, $data)
    {
        for($i = 0 ; $i < count($header) ; $i++){
            $this->Cell($taile[$i],7,$header[$i],1);
        }
        $this->Ln();
        foreach($data as $row){
            for($i = 0 ; $i < count($row) ; $i++){
                $this->Cell($taile[$i],6,$row[$i],1);
            }
            $this->Ln();
        }
    }
}
?>