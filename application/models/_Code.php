<?php 

    class _Code extends CI_Model{
        public function getBarcode($hash)
        {
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($hash, $generator::TYPE_CODE_128, 1, 100);
        }

        public function getBarcodeSVG($hash)
        {
            $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
            echo $generator->getBarcode($hash, $generator::TYPE_CODE_128, 1, 100);
        }

        public function barcode($hash) {
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            file_put_contents("$hash.png", $generator->getBarcode("$hash", $generator::TYPE_CODE_128, 3, 50));
        }
    }

?>