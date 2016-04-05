<?php
include_once 'common.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Site - Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/my-site/external/content/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/my-site/external/content/css/card.css" rel="stylesheet" media="screen">
	<link href="/my-site/external/content/css/feed.min.css" rel="stylesheet" media="screen">
	<link href="/my-site/external/content/css/icon.min.css" rel="stylesheet" media="screen">
	<link href="/my-site/external/content/css/button.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<section class="container">
		<br/>
		<a href="<?php echo $this->base->url.'/my-site'; ?>" class="btn btn-info"><?php echo $lang["HOME"] ?></a>
		<a href="<?php echo $this->base->url.'/my-site/login.php'; ?>" class="btn btn-info"><?php echo $lang["ADMIN_LOGIN"] ?></a>
		<div id="languages">
			<a href=<?php echo $_SERVER["PHP_SELF"]."?lang=en" ?>><img src="images/en.png" /></a>
			<a href=<?php echo $_SERVER["PHP_SELF"]."?lang=ch" ?>><img src="images/cn.png" /></a>
		</div>