<?php
include_once("conf/@conf.php");
include_once("php/logic/Define.php");
include_once("php/logic/Methods.php");
include_once("php/logic/Global.php");
include_once("php/server/Server-Admin_News_Form.php");
if ($_GET['appstate'] == true) $_SESSION['appstate'] = true;
securePage('appstate','index.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'News Form';
include_once("inc/shared/Meta.php");
include_once("inc/shared/External.php");
?>
<link type="text/css" href="css/local/Style-Admin.css" rel="stylesheet" />
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="admin">
<?php include_once("inc/shared/Header.php"); ?>
<?php include_once("inc/shared/Nav.php"); ?>
<main>
	<?php include_once("inc/local/Tab-Admin.php"); ?>
    <form <?php echo $def_file_action; ?>>
		<?php echo getError($err); ?>
        <input type="text" name="headline" value="<?php echo $_POST['headline']; ?>" placeholder="Enter Headline" required />
        <input type="text" name="byline" value="<?php echo $_POST['byline']; ?>" list="byline" placeholder="Enter By-line" />
        <datalist id="byline"><?php echo $datalist_byline; ?></datalist>
        <textarea name="article" rows="10" placeholder="Enter Article" required><?php echo $_POST['article']; ?></textarea>
        <input type="text" name="thumbnail" value="<?php echo $_POST['thumbnail']; ?>" list="thumbnail" placeholder="Enter Thumbnail Name" />
        <datalist id="thumbnail"><?php echo $datalist_thumbnail; ?></datalist> 
        <input type="text" name="source" value="<?php echo $_POST['source']; ?>" placeholder="Enter Photo Source" />
        <input type="number" name="status" value="<?php echo $_POST['status']; ?>" placeholder="Enter Status" />
        <input type="text" name="date" value="<?php echo $_POST['date']; ?>" list="date" placeholder="Enter Date" />
        <datalist id="date"><?php echo $datalist_date; ?></datalist> 
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" />
        <input type="submit" value="Save" />
        <input type="reset" value="Cancel" />
    </form>
</main>
<?php include_once("inc/shared/Footer.php"); ?>
</body>
</html>
