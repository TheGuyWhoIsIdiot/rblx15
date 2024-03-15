<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
  if(!isset($_SESSION['user'])){
	header("Location: /games/");
}else{

}
// hello, meditation here. i'm too lazy and sick to fix this shit code. if someone here see this, replace it. thanks.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rblx15');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['gamename'];
  $port = $_POST['gameport'];
  $desc = $_POST['gamedesc'];
  $ip = $_POST['gameip'];
  $query = $pdo->prepare("INSERT INTO games (gameName, gameDesc, gameIp, port) VALUES (:gameName, :gameDesc, :gameIp, :port)");
  $query->execute(["gameName" => $name, "gameDesc" => $desc, "gameIp" => $ip, "port" => $port]);
  //mysqli_query($con,"INSERT INTO `games` (`gameName`, `gameId`, `gameDesc`, `gameIp`, `port`) VALUES ('".htmlspecialchars($name)."', NULL, '".htmlspecialchars($desc)."', '".$ip."', ".$port.");"); // Adds the game
	exit("game uploaded succesfully");
}
pageBuilder::buildHeader();
// end the code lmao.
?>
<main class="pt-5 container"> 
<div class="card">
  <div class="card-body">
<center><h1>Games <span class="badge text-bg-secondary">New</span></h1></center>
 <form method="post" action="/develop/sendserver/" id="clientform">
  <div>Name: <input type="text" name="gamename"></div>
   <div>IP: <input type="text" name="gameip"></div>
   <div>port: <input type="text" name="gameport"></div>
   <div>description: <input type="text" name="gamedesc"></div>
   <label for="clients">Client:</label>

  <input type="submit"class="btn-medium btn-primary btn-level-element ">
  
</form>
<select id="clients" name="client" form="clientform">
  <option value="1">2015</option>
  <option value="2">2016</option>
</select>
</div>
</main>