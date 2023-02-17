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

$id = $_GET['id'] ?? null;

if (isset($id)) {
    $region = DB::selectOne("
    SELECT *
    FROM `regions`
    WHERE `id` = ?
    ", [$id], Region::class);
    var_dump($region);
} else {
    $region = new Region();
}
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
    <?php if(isset($id)): ?>
        <form action="save.php?id=<?= $id ?>" method="post">
    <?php else :?>
        <form action="save.php" method="post"> 
    <?php endif;?>

    Region:<br>
    <input type="text" name="region_name" value="<?= htmlspecialchars((string)$region->name) ?>"><br>
    <br>
    Slug:<br>
    <input type="text" name="region_slug" value="<?= htmlspecialchars((string)$region->slug) ?>"><br>
    <br>

    <button type="submit" >Submit</button>

    </form>
    
</body>
</html>