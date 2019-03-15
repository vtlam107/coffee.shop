<?php
	session_start();
	$id = $_GET['id'];
	unset($_SESSION['cart'][$id]);
	print_r($_SESSION['cart']);
?>