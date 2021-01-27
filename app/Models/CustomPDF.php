<?php

namespace App\Models;

use Elibyy\TCPDF\Facades\TCPDF;

class CustomPDF extends TCPDF
{
    public function Header() {
        $headerData = $this->getHeaderData();
        $this->SetFont('currier', 'B', 12);
        $this->writeHTML($headerData['string']);
    }

}
