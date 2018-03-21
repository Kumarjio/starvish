<?php

class Pdf {


    function load($param = NULL) {
        require_once APPPATH .'third_party/mpdf/mpdf.php';

        if ($param == NULL) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
        return new mPDF($param);
    }

}