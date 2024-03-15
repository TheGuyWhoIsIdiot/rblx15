<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

if(!isset($_GET["id"])){
    header("Location: /");
    exit();
}else{
    $FindGames = $pdo->prepare('select * from games where gameId="'.$_GET['id'].'"');
    $FindGames->execute();
    $row = $FindGames->fetch(PDO::FETCH_ASSOC);
}
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

pageBuilder::buildHeader();
$id = $_GET["id"];
?>
<main class="pt-5 container"> 
<div class="card">
  <div class="card-body">
<center><h1><span class="badge text-bg-secondary">Edit Game</span></h1></center>
<br>
 <form method="post" action="/develop/updategame/" id="clientform">
 <input type="hidden" name="id" value="<?= $id ?>">
  Name: <input type="text" name="gameName" value="<?= $row["gameName"] ?>">
   IP: <input type="text" name="gameIp" value="<?= $row["gameIp"] ?>">
   port: <input type="text" name="port" value="<?= $row["port"] ?>">
   description: <input type="text" name="gameDesc" value="<?= $row["gameDesc"] ?>">
  <input type="submit"class="btn-medium btn-primary btn-level-element ">
</form>
Client:
<select id="clients" name="client" form="clientform">
  <option value="1">2015</option>
  <option value="2">2016</option>
</select>
</div>
</main>

<?php pageBuilder::buildFooter(); ?>