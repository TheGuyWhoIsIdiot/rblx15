<?php
$productId = $_REQUEST['productId'];
exit('{"success": true, "status": "Bought", "receipt", "'.$productId.'"}');