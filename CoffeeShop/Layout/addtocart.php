<?php
	session_start();
	$id = $_GET['id'];
	$_SESSION['cart'][$id] = 1;
	print_r($_SESSION['cart']);
?>