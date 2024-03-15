<?php
// hadi was here...
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php'; 

if(config["site"]["maintenance"]){
    $_SESSION["devpass"] = false;
    header("Location: /");
}
else{
    header("Location: /");
}