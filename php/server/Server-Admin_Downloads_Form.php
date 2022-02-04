<?PHP
$table = 'msc_downloads';
$MODEL->Reset($table);
$nav = 'admin_downloads_table.php';
$nav_2 = 'downloads.php';
$action = '<b><a href="'.$nav_2.'" target="_blank">Visit Downloads Page</a></b>';

// DATALIST
$sql = "SELECT DISTINCT title,filename,date FROM ".$table;
$resultSet = $MODEL->Execute($sql);
foreach ($resultSet as $assoc) 
{
	$datalist_title .= '<option value="'.$assoc->title.'" />';
	$datalist_filename .= '<option value="'.$assoc->filename.'" />';	
	$datalist_date .= '<option value="'.$assoc->date.'" />';		
}

// POSTBACK
if ($_GET['edit'])
{
	$row = $MODEL->Read($_GET['edit'],true);
	$_POST = (array)$row;
}

// SUBMIT
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$__POST = $MODEL->SanitizeNoStrip($_POST,true);
	if ($_POST['id'])
	{
		$where = array('id',$_POST['id']);
		if ($MODEL->Update($__POST,$where))
		{
			$err = "Material updated successfully. ".$action;
			unset($_SESSION['postback']);
		}
		else 
			$err = "!<b>ERROR:</b> Unable to update material";		
	}
	else
	{
		if ($MODEL->Create($__POST))
			$err = "Material published successfully. ".$action;
		else 
			$err = "!<b>ERROR:</b> Unable to publish material";
	}
}


?>