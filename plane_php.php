<?php
echo "<pre>";
print_r($_SERVER['PHP_SELF']);
if(!empty($_POST))
print_r($_POST);
if(!empty($_GET))
print_r($_GET);
if(!empty($_SESSION))
print_r($_SESSION);
echo "</pre>";

?>