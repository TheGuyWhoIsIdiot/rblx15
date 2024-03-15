<?php
// in case it doesnt work, i made a backup

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
	$client = $_POST["client"];
  if($client == "1"){
	 $clientreal = 2015;
  }elseif($client == "2"){
	  $clientreal = 2016;
  }else{
	  $clientreal = 2015;
  }


    $update = "UPDATE games 
            SET gameName = '".$gameName."', gameIp = '".$gameIp."', port = ".$port.", gameDesc = '".$gameDesc."', client = '".$clientreal."'
            WHERE gameid = ".$_POST["id"];
    $stmt = $pdo->prepare($update);
    $stmt->execute();
	exit(header("Location: /Place.aspx?id=" . $_POST['id']));
}
// backup down here
/*
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
    $gameName = $_POST["gameName"];
    $gameIp = $_POST["gameIp"];
    $port = $_POST["port"];
    $gameDesc = $_POST["gameDesc"];
    
    try {
    $update = "UPDATE games 
            SET gameName = :gamename, gameIp = :gameip, port = :port, gameDesc = :gamedesc
            WHERE gameid = :gameid";
    $stmt = $pdo->prepare($update);
    
    $stmt->bindParam(':gameid', $_POST["id"]);
    $stmt->bindParam(':gamename', $gamename);
    $stmt->bindParam(':gameip', $gameip);
    $stmt->bindParam(':port', $port);
    $stmt->bindParam(':gamedesc', $gamedesc);
    $stmt->execute();
    header("Location: /games");
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
*/
