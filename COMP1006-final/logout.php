<?php

session_start();
if (!isset($_SESSION['user'])) {
  $_SESSION["errors"][] = "Please log in to access content";
  header("Location: login.php");
  exit;
}

unset($_SESSION['user']);
$_SESSION['successes'][] = "you have been logged out ";

header("Location: index.php");
exit;