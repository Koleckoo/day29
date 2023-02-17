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

//creating an ID if its there else creating it with null 
$id = $_GET['id'] ?? null;


if (isset($id)) {
    //finding the region
    $region = DB::selectOne("
    SELECT *
    FROM `regions`
    WHERE `id` = ?
    ", [$id], Region::class);

} else {
    //setting up new object
    $region = new Region();
    
}
// assigning properties from post method
$region->name = $_POST["region_name"] ?? $region->name;
$region->slug = $_POST["region_slug"] ?? $region->slug;
//calling save function - that has update or insert function in it
$region->save();
//redirection
if (isset($id)) {
   header('Location: edit.php?id=' . $id);
} else {
   header('Location: edit.php?id=' . $region->id);
    
}




