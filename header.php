<?php
    define("Title","御雅堂");
    define("WEBDIR","https://jdztao.com/store/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=WEBDIR?>css/default.css">
  <link rel="stylesheet" type="text/css" href="<?=WEBDIR?>css/lightform.css">
  <link rel="stylesheet" type="text/css" href="<?=WEBDIR?>css/dropmenu.css">
  <link rel="stylesheet" type="text/css" href="<?=WEBDIR?>css/topnav.css">

  <title><?=Title?></title>

</head>
<body>
<header>
		<a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>"><b><?=Title?></b></a>

  			<input type="search" id="query" name="key" placeholder="Search..." style="float:right">
        <div class="dropdown">
	<span>≡</span>  
	<div class="dropdown-content">
    <a href="#">商品管理</a>
    <a href="#">查询统计</a>
    <a href="#">数据维护</a>
	</div>
</div>
<nav>
	  <a href="#">Linux</a>
	  <a href="#">Html</a>
	  <a href="#">PHP</a>
	  <a href="#" style="float: right;">CSS</a>
	</nav>
	</header>