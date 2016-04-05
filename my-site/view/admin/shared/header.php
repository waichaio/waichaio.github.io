<?php
include_once '../../common.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Site - Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../../external/content/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../../external/content/css/Markdown.css" rel="stylesheet" media="screen">
</head>
<body>
	<section class="container">
		<br/>
		<a href="<?php echo 'http://'.$_SERVER["SERVER_NAME"].'/my-site/login.php?status=logout'; ?>" class="btn btn-info">Logout</a>