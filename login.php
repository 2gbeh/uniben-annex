<?php
include_once("config/@config.php");
include_once("library/JRAD/PHP/@JRAD-PHP.php");
include_once("library/JRAD/SQL/@JRAD-SQL.php");
include_once("php/logic/Controller.php");
include_once("php/logic/Methods.php");
include_once("data/list/Modules.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
include_once("include/shared/Meta.php");
include_once("library/JRAD/CSS/@JRAD-CSS.php");
include_once("library/JRAD/JS/@JRAD-JS.php");
include_once("library/JRAD/CSS/SKINS/DRAGONFLY/@DRA.php");
include_once("include/shared/External.php");
?>
<link type="text/css" href="css/shared/Global.css" rel="stylesheet" /> 
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="DRAGONFLY DRAGONFLY-GO home">
<?php include_once("include/shared/Header.php"); ?>
<main>
	<section>
		<?php if ($USER) {include_once("include/local/HUD.php");} ?>
	</section>
    

    <section>
    <ul class="list">   
		<?php 
		if (!$USER) 
		{
			$nav = "landing_register.php";
			$output = '<li>
				<a href="'.$nav.'">
				<table class="menu">
				<tr>
					<td><var class="avatar" style="background-image:url(media/icons/Glyph-User.png);">&nbsp;</var></td>
					<td><div class="caption">Create an Account</div></td>
					<td>'.setBadge($DATABASE->Meta('dve_users')->today).'</td>
				</tr>
				</table>
				</a>        
			</li>';
			echo $output;
		} 
		?>    
        <li>
        	<a href="course_modules.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Book.png);">&nbsp;</var></td>
                <td><div class="caption">Course Modules</div></td>
                <td><?php echo setBadge(count($__Modules)); ?></td>
            </tr>
            </table>
            </a>        
        </li>
        <li>
        	<a href="codelib.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Bookmark.png);">&nbsp;</var></td>
                <td><div class="caption">Code Library</div></td>
                <td>&nbsp;</td>
            </tr>
            </table>
            </a>        
        </li>        
        <li>
        	<a class="disabled">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Video.png);">&nbsp;</var></td>
                <td><div class="caption">Video Tutorials</div></td>
                <td>&nbsp;</td>
            </tr>
            </table>
            </a>        
        </li>
	</ul>        
	</section>


    <section>
    <?php include_once('include/local/Firefly.php'); ?>
    </section>


	<section>    
	<ul class="list">     
        <li>
        	<a href="groups.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Group.png);">&nbsp;</var></td>
                <td><div class="caption">Dive Groups</div></td>
                <td><?php echo setBadge($DATABASE->Meta('dve_users')->total); ?></td>
            </tr>
            </table>
            </a>        
        </li>      
        <li>
        	<a href="apps/analytics/index.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Stats.png);">&nbsp;</var></td>
                <td><div class="caption">Dive Analytics</div></td>
                <td><?php echo setLabel('New'); ?></td>
            </tr>
            </table>
            </a>        
        </li>                         
        <li>
        	<a href="business.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Briefcase.png);">&nbsp;</var></td>
                <td><div class="caption">Dive Business</div></td>
                <td>&nbsp;</td>
            </tr>
            </table>
            </a>        
        </li>          
	</ul>           
	</section>    
    
    
	<section>    
	<ul class="list">           
        <li>
        	<a href="payment.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Payment.png);">&nbsp;</var></td>
                <td><div class="caption">Payment Portal</div></td>
                <td><?php echo setBadge($DATABASE->Meta('dve_payment')->today); ?></td>
            </tr>
            </table>
            </a>        
        </li>   
        <li>
        	<a href="help_center.php">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Enquiry.png);">&nbsp;</var></td>
                <td><div class="caption">Help Center</div></td>
                <td><?php echo setBadge($DATABASE->Meta('dve_help')->today); ?></td>
            </tr>
            </table>
            </a>        
        </li>                            
        <li>
        	<a href="<?php echo pageLock($USER,'settings_profile.php'); ?>">
            <table class="menu">
            <tr>
                <td><var class="avatar" style="background-image:url(media/icons/Glyph-Cog.png);">&nbsp;</var></td>
                <td><div class="caption">Account Settings</div></td>
                <td>&nbsp;</td>
            </tr>
            </table>
            </a>        
        </li>  
		<?php
			if ($USER) {include_once("include/local/Logout.php");}
			else {include_once("include/local/Login.php");}
		?>      
	</ul>        
    </section>
</main>
<?php include_once("include/shared/Footer.php"); ?>
</body>
</html>

