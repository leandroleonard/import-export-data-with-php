<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_FILES['csv-file'])&& $_FILES['csv-file']['type'] == 'text/csv'){
            $file = $_FILES['csv-file'];

            $data_in_file = fopen($file['tmp_name'], 'r');

            $header = fgetcsv($data_in_file, 100, ';');

            $data = [];
            while($row = fgetcsv($data_in_file, 1000, ';')){
                array_push($data, $row);
            }
            // echo "<pre>";
            // print_r($header);
            include_once "../body/unknown-csv.php";
        }else{
            echo('You must select a csv file to process data');
        }
    }else{
        echo "Error:";
    }