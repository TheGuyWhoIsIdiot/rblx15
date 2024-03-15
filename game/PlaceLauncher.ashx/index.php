<?php
//{"Error" : "Invalid request type"}
$joinScriptUrl = "http://www.rb15.us.to/Game/Join.ashx";
$authUrl = "http://www.rb15.us.to/Login/Negotiate.ashx";
$status = 2;
if(isset($_GET['username']) && isset($_GET['id'])){
	$joinScriptUrl = "http://www.rb15.us.to/Game/Join.ashx?placeId=" . $_GET["placeId"] . "&username=" . $_GET['username'] . "&id=" . $_GET['id'];
}else{
$joinScriptUrl = "http://www.rb15.us.to/Game/Join.ashx?placeId=" . $_GET["placeId"];
}
$script = array(
    "jobId" => "Test",
    "status" => $status,
    "joinScriptUrl" => $joinScriptUrl,
    "authenticationUrl" => $authUrl,
    "authenticationTicket" => "1",
    "message" => null
);

header("Content-Type: application/json");
echo(str_replace('\\/', '/', json_encode($script)));
//echo(json_encode($script));

