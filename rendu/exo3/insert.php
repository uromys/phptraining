
<?php
require_once 'functiondatabase.php';

$objet = $_GET['objet'];
$description = $_GET['description'];
//echo $objet;
//echo $description;
insert($objet,$description);
