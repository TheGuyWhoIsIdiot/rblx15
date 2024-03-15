<?php
class pageBuilder {
  public static function buildHeader() {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/site/header.php";
  }
  public static function buildFooter(){
    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/site/footer.php";
  }
  public static function buildAlert() {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/site/siteAlert.php";
  }
}