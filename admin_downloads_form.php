<?php
include_once("conf/@conf.php");
include_once("php/logic/Define.php");
include_once("php/logic/Methods.php");
include_once("php/logic/Global.php");
include_once("php/server/Server-Admin_Downloads_Form.php");
if ($_GET['appstate'] == true) $_SESSION['appstate'] = true;
securePage('appstate','index.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'Downloads Form';
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
        <input type="text" name="sn" value="<?php echo $_POST['sn']; ?>" placeholder="Enter S/N" required />
        <input type="text" name="title" value="<?php echo $_POST['title']; ?>" list="title" placeholder="Enter Title" required />
        <datalist id="title"><?php echo $datalist_title; ?></datalist>
        <input type="text" name="filename" value="<?php echo $_POST['filename']; ?>" list="filename" placeholder="Enter File Name/Link" required />
        <datalist id="filename"><?php echo $datalist_filename; ?></datalist>        
        <input type="number" name="size" value="<?php echo $_POST['size']; ?>" placeholder="Enter File Size (KB)" required />        
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
