<?php

require 'PHPExcel/Classes/PHPExcel.php';

try {
    $uploadfile = 'test.xlsx';

    $objExcel = PHPExcel_IOFactory::load($uploadfile);

    $objData = PHPExcel_IOFactory::createReader('Excel2007');

    //read only
    $objData->setReadDataOnly(true);

    $objPHPExcel = $objData->load($uploadfile);

    // Select sheet to get
    $sheet = $objPHPExcel->setActiveSheetIndex(1);

    $Totalrow = $sheet->getHighestRow();
    $LastColumn = $sheet->getHighestColumn();

    $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

    $data = [];

    // Proceed to loop through each data cell
    // Repeat rows, Since the first row is assumed to be the column header, we will loop the value from line 2
    for ($i = 1; $i <= $Totalrow; $i++) {
        //---- Loop column
        for ($j = 0; $j < $TotalCol; $j++) {
            // Proceed to get the value of each cell into the array
            $data[$i - 1][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
        }
    }

    echo '<pre>';
    var_dump($data);
} catch (Exception $e) {
    var_dump($e->getMessage());
}
