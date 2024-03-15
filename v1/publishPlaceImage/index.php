<?php
// publishPlaceImage
// Publish place image to cdn and modify db.
// render script by @dev.meblox
// php code by hadi
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
ini_set('display_errors', 1);
if(!isset($_GET["pass"]))
{
	exit("access denied");
}
elseif($_GET["pass"] == "dnsbjfndsjfnjsdnfj")
{
if (file_exists("C:/xampp/www/cdn/" . md5(($_GET["ID"] ?? "1818") . ($_GET["SIZE"] ?? "2")) . ".png"))
{
header('Content-Type: image/jpeg');
echo file_get_contents("C:/xampp/www/cdn/" . md5(($_GET["ID"] ?? "1818") . ($_GET["SIZE"] ?? "2")) . ".png");
exit();
}
$RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", 64989);
$job = new Roblox\Grid\Rcc\Job("RenderPlace");
$scriptText = '
pcall(function() game:GetService("ContentProvider"):SetBaseUrl("https://rb15.us.to") end)
pcall(function() game:GetService("ScriptContext").ScriptsDisabled = true end)
	
local PlaceId = ' . ($_GET["ID"] ?? "1818") . ' --define the placeid
local ThumbnailGenerator = game:GetService("ThumbnailGenerator")
game:Load("http://rb15.us.to/asset/?id="..PlaceId.."") -- load the game
for _,v in next, game:GetService("StarterGui"):GetChildren() do
	v:Destroy()
end
--print(ThumbnailGenerator:Click("PNG", 180, 100, false, false)) -- first image
--print(ThumbnailGenerator:Click("PNG", 500, 280, false, false)) -- second one
local thumb = ThumbnailGenerator:Click("PNG", 500, 280, false, true)
return thumb
';
$script = new Roblox\Grid\Rcc\ScriptExecution("RenderPlace", $scriptText);
$value = $RCCServiceSoap->BatchJob($job, $script);
while(!$value){
	sleep(1);
}
$image_data = base64_decode($value);

header('Content-Type: image/jpeg');

file_put_contents("C:/xampp/www/cdn/" . md5(($_GET["ID"] ?? "1818") . ($_GET["SIZE"] ?? "2")) . ".png", $image_data);
echo $image_data;
}

