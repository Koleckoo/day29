<?php
require_once 'DB.php';
require_once 'DB_functions.php';
require_once 'Region.php';
//connection needs to be estahblished to the database
DB::connect(
    '127.0.0.1',
    'world',
    'root',
    ''
);

$allRegions = DB::select(
    "
    SELECT *
    FROM `regions`  
    ",[], Region::class
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'top-menu.php'?>
    <ul>
        <?php foreach($allRegions as $region): ?>
            <li>
                <a href="edit.php?id=<?= $region->id ?>"><?= $region->name ?></a>
                <form action="delete.php?id=<?= $region->id ?>" method="post" onsubmit="if (!confirm('Do you really want to delete this?')) return false";>
                    <button>Delete</button>
                </form>
            </li>
        <?php endforeach;?>
    </ul>
    
</body>
</html>