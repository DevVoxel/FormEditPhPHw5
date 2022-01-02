<?php require_once 'include/functions.php';

deleteDogname($_GET['id'] ?? 0);
header('Location: ./');