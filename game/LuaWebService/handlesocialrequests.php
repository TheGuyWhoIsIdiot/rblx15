<?php
header('Content-Type: text/xml; charset=utf-8');
 ob_start();
 include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';


$method = isset($_GET["method"]) ? $_GET["method"] : null;
$player = isset($_GET["playerid"]) ? $_GET["playerid"] : null;
$groupid = isset($_GET["groupid"]) ? $_GET["groupid"] : null;
$admin = $pdo->prepare('select * from users where userid='.$player);
$admin->execute();
$row = $admin->fetchAll(PDO::FETCH_ASSOC)[0];

if ($method === "IsBestFriendsWith") {
    echo '<Value Type="boolean">false</Value>';
} elseif ($method === "IsFriendsWith") {
    echo '<Value Type="boolean">false</Value>';
} elseif ($method === "IsInGroup") {
    if ($groupid === "1200769") {
        if ($row['admin'] == 1) {
        echo '<Value Type="boolean">true</Value>';
        } else {
               echo '<Value Type="boolean">false</Value>';
        }
    } else {
    echo '<Value Type="boolean">false</Value>';
    }
} else {
    echo '<Error>Unknown method</Error>';
}
?>