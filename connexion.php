<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=garage_revelation', 'root', '');

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}




?>