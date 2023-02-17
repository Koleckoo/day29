<?php 

require_once 'DB.php';
require_once 'DB_functions.php';
require_once 'Region.php';

DB::connect(
    '127.0.0.1',
    'world',
    'root',
    ''
);

$data = DB:: select('
SELECT * 
FROM `regions`
', [], Region::class);

var_dump($data);