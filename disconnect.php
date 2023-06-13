<?php
session_start();
unset($_SESSION['ID_connect']);
unset($_SESSION['status']);
header('location:index.php');
