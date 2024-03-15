<?php
  $id = $_GET['gamePassId'];

header('Location: https://economy.roblox.com/v2/assets/'.$id.'/details');
exit;
