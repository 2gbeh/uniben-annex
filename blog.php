<?php
include_once("conf/@conf.php");
include_once("php/logic/Define.php");
include_once("php/logic/Methods.php");
include_once("php/logic/Global.php");
include_once("php/server/Server-Blog.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_title = $this_page;
$meta_desc = $this_desc;
include_once("inc/shared/Meta.php");
include_once("inc/shared/External.php");
?>
<link type="text/css" href="css/local/Style-Blog.css" rel="stylesheet" />
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="blog">
<?php include_once("inc/shared/Header.php"); ?>
<?php include_once("inc/shared/Nav.php"); ?>
<main>
<?php echo $output; ?>
<p>&nbsp;</p>
<a href="#" class="pager" title="Back to Top">Top</a>
<a href="<?php echo $nav; ?>" class="pager" title="Return to News">More News</a>
</main>
<?php include_once("inc/shared/Footer.php"); ?>
</body>
</html>
