<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
if (isset($_GET["placeId"]))
  {
    /* define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'rblx15');
    define('DB_PASSWORD', 'A*yBH]mXYNC14]ed');
    define('DB_NAME', 'rblx15');
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $query = mysqli_query($con,'select gameName,gameDesc,port,gameIp,owner from games where gameId="'.$_GET['placeId'].'"');
    $row = mysqli_fetch_array($query); */

    $FindGames = $pdo->prepare('select * from games where gameId="'.$_GET['placeId'].'"');
    $FindGames->execute();
    $row = $FindGames->fetch(PDO::FETCH_ASSOC);
}
if(!isset($row))
{
  exit("place doesnt exist");
}
$userid = rand(1, 9999);
$guestuserid = rand(1, 9999);//rand(-9999, -1);
$username = null;
$charapp = "http://rb15.us.to/Asset/CharacterFetch.ashx";
$jobid = "Test";
$gameid = null;
$creatorid = $row["ownerid"];
$creatorid = substr($creatorid, 0, strlen($creatorid) / 2);
$membership = "TurboBuildersClub";
$guestmembership = "None";
$accountAge = 365;
$ip = null;
$port = null;
  
if (isset($_GET["ip"])) {
  $ip = $_GET["ip"];
}
elseif (!isset($_GET["placeId"])) {
   $ip = "127.0.0.1";
}
else {
  $ip = $row["gameIp"];
}

if (isset($_GET["placeId"])) {
  $gameid = $_GET["placeId"];
}
else {
  $gameid = "1818";
}
 
  
if (isset($_GET["port"])) {
  $port = $_GET["port"];
}
elseif (isset($_GET["placeId"])) {
  $port = $row["port"];
}
else {
  $port = "53640";
}
if(isset($_GET['username']) && isset($_GET['id'])){
  $userid = $_GET["id"];
  $username = $_GET['username'];
  
	  $joinscret = file_get_contents("./2014.txt");
	  $f1 = str_replace("%username%",$username ,$joinscret);
$f2 = str_replace("%serverip%",$ip,$f1);
$f3 = str_replace("%serverport%",$port,$f2);
$f4 = str_replace("%id%",$userid,$f3);
$f5 = str_replace("%charApp%",$charapp,$f4);
$f6 = str_replace("%mode%",$membership,$f5);
$joinscript = array(
  "ClientPort" => 0,
  "MachineAddress" => $ip,
  "ServerPort" => $port,
  "PingUrl" => "",
  "PingInterval" => 30,
  "UserName" => $username,
  "SeleniumTestMode" => false,
  "UserId" => $userid,
  "SuperSafeChat" => false,
  "CharacterAppearance" => $charapp,
  "ClientTicket" => gameUtils::GenerateClientTicketv1($userid, $username, $charapp, $jobid),
  "GameId" => $jobid,
  "PlaceId" => 1818,
  "MeasurementUrl" => "",
  "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
  "BaseUrl" => "http://www.rb15.us.to/",
  "ChatStyle" => "ClassicAndBubble",
  "VendorId" => "0",
  "ScreenShotInfo" => "",
  "VideoInfo" => "",
  "CreatorId" => $creatorid,
  "CreatorTypeEnum" => "User",
  "MembershipType" => $membership,
  "AccountAge" => $accountAge,
  "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
  "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
  "CookieStoreEnabled" => true,
  "IsRobloxPlace" => false,
  "GenerateTeleportJoin" => false,
  "IsUnknownOrUnder13" => false,
  "SessionId" => "",
  "DataCenterId" => 69420,
  "UniverseId" => $gameid,
  "BrowserTrackerId" => 0,
  "UsePortraitMode" => false,
  "FollowUserId" => 0
);
}else{
		  $joinscret = file_get_contents("./2014.txt");
	  $f1 = str_replace("%username%","Guest ".$userid,$joinscret);
$f2 = str_replace("%serverip%",$ip,$f1);
$f3 = str_replace("%serverport%",$port,$f2);
$f4 = str_replace("%id%",$guestuserid,$f3);
$f5 = str_replace("%charApp%",$charapp,$f4);
$f6 = str_replace("%mode%",$membership,$f5);
$joinscript = array(
  "ClientPort" => 0,
  "MachineAddress" => $ip,
  "ServerPort" => $port,
  "PingUrl" => "",
  "PingInterval" => 30,
  "UserName" => "Guest " . $userid,
  "SeleniumTestMode" => false,
  "UserId" => $guestuserid,
  "SuperSafeChat" => false,
  "CharacterAppearance" => $charapp,
  "ClientTicket" => gameUtils::GenerateClientTicketv1($userid, $username, $charapp, $jobid),
  "GameId" => $jobid,
  "PlaceId" => 1818,
  "MeasurementUrl" => "",
  "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
  "BaseUrl" => "http://www.rb15.us.to/",
  "ChatStyle" => "ClassicAndBubble",
  "VendorId" => "0",
  "ScreenShotInfo" => "",
  "VideoInfo" => "",
  "CreatorId" => $creatorid,
  "CreatorTypeEnum" => "User",
  "MembershipType" => $guestmembership,
  "AccountAge" => $accountAge,
  "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
  "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
  "CookieStoreEnabled" => true,
  "IsRobloxPlace" => false,
  "GenerateTeleportJoin" => false,
  "IsUnknownOrUnder13" => false,
  "SessionId" => "",
  "DataCenterId" => 69420,
  "UniverseId" => $gameid,
  "BrowserTrackerId" => 0,
  "UsePortraitMode" => false,
  "FollowUserId" => 0
);
}
if($row['client']=="2014"){
	$result = gameUtils::signv1($f6);
	header("Content-Type: text/plain");
	exit($result);
}else{
$joinscript = json_encode($joinscript, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
$joinscript = gameUtils::signv1($joinscript);
header("Content-Type: application/json");
exit($joinscript);
}
