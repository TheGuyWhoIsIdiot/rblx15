<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
$script = file_get_contents("./script.txt");
if(isset($_GET["port"]) and isset($_GET["filename"])){
  $replace1 = str_replace("%port%",$_GET["port"],$script);
  $replace2 = str_replace("%filename%",$_GET["filename"],$replace1);
}elseif(isset($_GET["port"])){
  $replace1 = str_replace("%port%",$_GET["port"],$script);
  $replace2 = str_replace("%filename%","place.rbxl",$replace1);
}elseif(isset($_GET["filename"])){
  $replace1 = str_replace("%port%",53640,$script);
  $replace2 = str_replace("%filename%",$_GET["filename"],$replace1);
}else{
  $replace1 = str_replace("%port%",53640,$script);
  $replace2 = str_replace("%filename%","place.rbxl",$replace1);
}

$hostscriptsigned = gameUtils::signv1($replace2);
header("content-type: text/plain");
exit($hostscriptsigned);


// old script: 
/*
game:Load('rbxasset://place.rbxl')
print('Loading map')
local scriptContext = game:GetService('ScriptContext')
pcall(function() scriptContext:AddStarterScript(libraryRegistrationScriptAssetID) end)
scriptContext.ScriptsDisabled = false
game:SetPlaceID(1818, false)
game:GetService('ChangeHistoryService'):SetEnabled(false)
pcall(function() settings().Network.UseInstancePacketCache = true end)
pcall(function() settings().Network.UsePhysicsPacketCache = true end)
--pcall(function() settings()['Task Scheduler'].PriorityMethod = Enum.PriorityMethod.FIFO end)
pcall(function() settings()['Task Scheduler'].PriorityMethod = Enum.PriorityMethod.AccumulatedError end)
--settings().Network.PhysicsSend = 1 -- 1==RoundRobin
settings().Network.PhysicsSend = Enum.PhysicsSendMethod.ErrorComputation2
settings().Network.ExperimentalPhysicsEnabled = true
settings().Network.WaitingForCharacterLogRate = 100
pcall(function() settings().Diagnostics:LegacyScriptMode() end)
game.Lighting.GlobalShadows = true
game:GetService('RunService'):Run()
game:GetService('NetworkServer'):Start(53640)
pcall(function() game:GetService('Players'):SetChatStyle(Enum.ChatStyle.Both) end)
*/