<?php
  header("Content-Type: application/xml;charset=utf-8");
  if ($_GET["method"] == "IsBestFriendsWith") {
    echo '<Value Type="boolean">true</Value>';
  }
  if ($_GET["method"] == "IsFriendsWith") {
  echo '<Value Type="boolean">true</Value>';
  }
  if ($_GET["method"] == "IsInGroup") {
  echo '<Value Type="boolean">false</Value>';
  }