<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
if(!isset($_SESSION["user"])){
    exit("not logged in");
}
$userid = $_SESSION["user"]["id"];
$query = $pdo->prepare("SELECT * FROM users WHERE userid = ?");
$query->execute([$userid]);
$user = $query->fetch();
echo("robux: " . $user["robux"]);