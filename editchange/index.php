<?php
// btw, dont mess here
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!isset($_POST["id"])){
        header["Location: /"];
    }
    $FindGames = $pdo->prepare('select * from games where gameId="'.$_POST['id'].'"');
    $FindGames->execute();
    $row = $FindGames->fetch(PDO::FETCH_ASSOC);
    $id = $_POST["id"];
    if(!isset($_SESSION["logged_in"])){
        header("Location: /");
        exit();
    }else{
        extract($_SESSION['userData']);
    }
    if ($discord_id !== $row["ownerid"]) {
        header("Location: /");
        exit();
    }
    $gameName = htmlspecialchars($_POST["gameName"]);
    $gameIp = $_POST["gameIp"];
    $port = $_POST["port"];
    $gameDesc = htmlspecialchars($_POST["gameDesc"]);


    $update = "UPDATE games 
            SET gameName = '".$gameName."', gameIp = '".$gameIp."', port = ".$port.", gameDesc = '".$gameDesc."'
            WHERE gameid = ".$_POST["id"];
    $stmt = $pdo->prepare($update);
    $stmt->execute();
	exit('Gane updated');
}