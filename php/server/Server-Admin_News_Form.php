<?PHP
$table = 'msc_news';
$nav = 'admin_news_table.php';
$nav_2 = 'index.php';
$action = '<b><a href="'.$nav_2.'" target="_blank">Visit News Page</a></b>';


// DATALIST
$sql = "SELECT DISTINCT byline,thumbnail,date FROM ".$table;
$resultSet = $MODEL->Execute($sql);
foreach ($resultSet as $assoc) 
{
	$datalist_byline .= '<option value="'.$assoc->byline.'" />';
	$datalist_thumbnail .= '<option value="'.$assoc->thumbnail.'" />';	
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
			$err = "Article updated successfully. ".$action;
		else 
			$err = "!<b>ERROR:</b> Unable to update article";		
	}
	else
	{
		if ($MODEL->Create($__POST))
			$err = "Article published successfully. ".$action;
		else 
			$err = "!<b>ERROR:</b> Unable to publish article";
	}
}

?>