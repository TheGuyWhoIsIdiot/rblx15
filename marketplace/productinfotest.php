<?php
  $value = $_GET['assetId'] ?? $_GET['AssetID'] ?? $_GET['assetid'] ?? $_GET['assetID'];
  if (ctype_digit($value)) {
  $id = $value;
  $fileid = $id;
  $realfileid = $id;
}
  header('Location: https://economy.roblox.com/v2/assets/'.$id.'/details');
?>