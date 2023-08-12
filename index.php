<?php
echo "Export csv file";

$header = ['id', 'name', 'age'];

$people = [
    [
        'id' => 1,
        'name' => 'Leandro Ventura',
        'age' => 21
    ],
    [
        'id' => 2,
        'name' => 'John Doe',
        'age' => 27
    ],
    [
        'id' => 3,
        'name' => 'Anne Mary',
        'age' => 18
    ],
];

$file = fopen('files/people.csv', 'w');

if(!fputcsv($file, $header, ';')){
    exit("Error: Something went wrong during save header");
}

foreach($people as $person){
    if(!fputcsv($file, $person, ';')){
        exit('Error: Something went wrong while saving ' . $person[1]);
    }
}

fclose($file);