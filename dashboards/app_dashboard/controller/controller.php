<?php
require_once '../appdashboard/appdashboard.php';
//Instanciar class app dashboard
$appDashboard = new AppDashboard();
print_r($appDashboard->validateInfo($_POST['date']));

?>