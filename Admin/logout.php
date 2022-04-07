<?php
require_once("../_config.php");
session_destroy();
header("location: ".url("Admin/SignIn.php"));