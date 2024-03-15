<?php
  http_response_code(404);
 require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
  pageBuilder::buildHeader();
  require_once $_SERVER['DOCUMENT_ROOT'] . '/errors/includes/404.html';

?>