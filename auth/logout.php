<?php
session_start();
require_once("../config/conn.php");

session_unset();
session_destroy();

header("location: ../index/");
?>