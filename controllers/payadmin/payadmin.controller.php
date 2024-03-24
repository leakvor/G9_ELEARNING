<?php
require "database/database.php";
require "models/payment.model.php";
$payments = getPayment();
require "views/payadmin/payadmin.view.php";
