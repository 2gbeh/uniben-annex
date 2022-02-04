<?php 
$theme = 1;
$class = $theme == 1? '':'class="alt"'; 
$src = $theme == 1? 'src="media/images/logo.png"':'src="media/images/logo_alt.png"'; 
$logstate = $_SESSION['appstate'] == true? 'href="admin_news_form.php"':'onClick=secureLogin("admin_news_form.php")';
?>
<header <?php echo $class; ?> ondblclick="$_toBottom()">
<a class="equiv" title="Menu" onclick="toggleDisplay('top_menu')">&equiv;</a>
<a href="index.php" title="Home">
    <img <?php echo $src; ?> alt="<?php echo $MANIFEST->typeface; ?>" border="0" />
</a>
</header>
<ul class="top_menu" id="top_menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="todo.php">Assignment</a></li>
	<li><a href="downloads.php">Materials</a></li>    
	<li><a href="calendar.php">Time Table</a></li>
	<li><a href="contacts.php">Coursemates</a></li>
	<li><a href="about.php">@Webmaster</a></li>
	<li><a <?php echo $logstate; ?>>Admin Portal</a></li>        
</ul>
<div class="whitespace"></div>