<?php
session_start();
require_once("conn.php");

session_unset();
session_destroy();

header("location: ../inventory");
?>