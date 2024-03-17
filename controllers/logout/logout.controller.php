<?php
// Start or resume session
session_start();

// Destroy session data
session_unset();

header('location: /');
require "controllers/home/home.controller.php";