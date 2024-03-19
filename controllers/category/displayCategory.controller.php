<?php
require "database/database.php";
require "models/category.model.php";
$categorys=getCategorys();
require "views/category/displayCategory.view.php";