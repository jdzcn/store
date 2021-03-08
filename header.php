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

	header img {
		width:60px;
		height: auto;
	}
	footer {
		text-align: center;
	}
	</style>
</head>
<body>
<header>

	<a href="index.php"><img src="logo.png"></a>
	<form class="search" action='index.php' method="get">
	<input type="search" id="query" name="key" placeholder="Search...">
	<button>GO</button>
	</form>	<hr>
</header>
<main>