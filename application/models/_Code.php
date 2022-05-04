<?php 

    class _Code extends CI_Model{
        public function getBarcode($hash)
        {
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($hash, $generator::TYPE_CODE_128, 1, 100);
        }
    }

?>