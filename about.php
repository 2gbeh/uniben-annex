<?php
include_once("conf/@conf.php");
include_once("php/logic/Define.php");
include_once("php/logic/Methods.php");
include_once("php/logic/Global.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'ABOUT';
include_once("inc/shared/Meta.php");
include_once("inc/shared/External.php");
?>
<link type="text/css" href="css/local/Style-About.css" rel="stylesheet" />
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="about">
<?php include_once("inc/shared/Header.php"); ?>
<main>
	<div class="appname"><?php echo $MANIFEST->appname; ?> v5.10</div>
    <div class="bundle">Bundle <?php echo $MANIFEST->bundle; ?></div>
    <div class="copyright"><?php echo $MANIFEST->impressum; ?></div>
    <div class="about"><?php echo $MANIFEST->meta['title'].'. '.$MANIFEST->meta['desc']; ?></div>
    <p></p>

    <ul class="contact">
    <li title="Visit Website">	
	    <a href="http://www.hwplabs.com/" target="_blank">
	        <img src="media/icons/fa-web.png" alt="" /> <br/>
        	Website
        </a>
    </li>
    <li title="Email Us">
	    <a href="mailto:contact@hwplabs.com?cc=tugbeh.osaretin@gmail.com">    
        	<img src="media/icons/fa-email.png" alt="" /> <br/>
	        Email Address
        </a>
    </li>
    <li title="Call Now">
        <a href="tel:+2348169960927">
        	<img src="media/icons/fa-call.png" alt="" /> <br/>
	        Telephone
        </a>
    </li>
    <li title="Like us on Facebook">
        <a href="https://www.facebook.com/hwplabs" target="_blank">
            <img src="media/icons/fa-facebook.png" alt="" /> <br/>
            Facebook
        </a>
    </li>
    <li title="Follow us on Twitter">
        <a href="https://www.twitter.com/hwp_labs" target="_blank">
            <img src="media/icons/fa-twitter.png" alt="" /> <br/>
            Twitter
        </a>
    </li>
    <li title="Follow us on Instagram">
        <a href="https://www.instagram.com/hwplabs" target="_blank">
            <img src="media/icons/fa-instagram.png" alt="" /> <br/>
            Instagram
        </a>
    </li>
    </ul>    
</main>
</body>
</html>
