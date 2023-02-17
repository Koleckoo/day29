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
// finding id through get
$id = $_GET['id'] ?? null;
// selection data from database based on id
$region = DB::selectOne("
SELECT *
FROM `regions`
WHERE `id` = ?
", [$id], Region::class);
//calling delete on found region by id
$region->delete();

header("Location: list.php");