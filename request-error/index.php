<?php
  // very kewl request-error code by simple
  if (isset($_GET["code"]))
  {
    $errorcode = $_GET["code"];
    if (file_exists("errors/" . $errorcode . ".php"))
    {
     include("errors/" . $errorcode . ".php");
    }
    else
    {
      include("errors/unknown.php");
    }
  }
  else
  {
    exit;
  }
?>