<?php
    //shitty code...
    http_response_code(403);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
    pageBuilder::buildHeader();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/errors/includes/403.html';
?>