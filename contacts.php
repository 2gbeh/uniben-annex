<?php
include_once("conf/@conf.php");
include_once("php/logic/Define.php");
include_once("php/logic/Methods.php");
include_once("php/logic/Global.php");
include_once("data/List-Contacts.php");
include_once("php/server/Server-Contacts.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'Contacts';
include_once("inc/shared/Meta.php");
include_once("inc/shared/External.php");
?>
<link type="text/css" href="css/local/Style-Contacts.css" rel="stylesheet" />
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="contacts">
<?php include_once("inc/shared/Header.php"); ?>
<?php include_once("inc/shared/Nav.php"); ?>
<main>
<?php echo $output; ?>
<div class="wrap">
	<a href="#" class="pager" title="Back to Top">Top</a>
</div>
</main>
<?php include_once("inc/shared/Footer.php"); ?>
</body>
</html>
