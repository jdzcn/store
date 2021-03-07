<?php
    define("Title","御雅堂");
    // define("WEBSITE","https://jdztao.com/store/");
	include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/img.css">


  <title><?=Title?></title>
<style>
	.search {
		display:inline;
		float:right;
	}

	h4 {
		display:inline;
		width:200px;
	}
	</style>
</head>
<body>
<header>

	<a href="index.php"><b><?=Title?></b></a>
	<form class="search" action='index.php' method="get">
	<input type="search" id="query" name="key" placeholder="Search...">
	<button>GO</button>
	</form>	<hr>
</header>
<main>