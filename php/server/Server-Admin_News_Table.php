<?PHP
//var_dump($_SERVER);
$table = 'msc_news';
$nav = 'admin_news_form.php';

// DELETE
if (is_numeric($_GET['delete']))
{
	$exist = $MODEL->Exist('id',$_GET['delete']);
	if ($exist)	
	{
		$delete = $MODEL->Delete($_GET['delete']);
		if ($delete)
			$err = 'Row deleted succesfully!';
		else
			$err = '!<b>ERROR:</b> Unable to delete row!';			
	}
	else $err = '!<b>ERROR:</b> Row not found!';	
}

// TBODY
$resultSet = $MODEL->Read();
$tbody = '';
foreach ($resultSet as $row)
{
	$sn++;
	$headline = $row->headline;
	$byline = $row->byline;
	$thumbnail = $row->thumbnail;	
	$source = $row->source;
	$status = $row->status;		
	$date = $row->date;
	$id = $row->id;	

	$action = $nav.'?edit='.$id;
	$tbody .= '<tr>
		<td>'.$sn.'</td>
		<td>
			<a href="'.$action.'" class="btn-pri" title="Edit Row">Edit</a>&nbsp;
			<a onClick=unitDelete("'.$id.'") class="btn-sec" title="Delete Row">Delete</a>
		</td>		
		<td class="nowrap">'.$headline.'</td>
		<td class="nowrap">'.$byline.'</td>
		<td>'.$thumbnail.'</td>
		<td class="nowrap">'.$source.'</td>
		<td>'.$status.'</td>
		<td>'.$date.'</td>
		<td>'.$id.'</td>
	</tr>';
}

// THEAD
$total = count($resultSet);
$resultSet = $MODEL->Fields();
$thead .= '<th>S/N ('.$total.')</th>';
$thead .= '<th>&nbsp;</th>';
foreach ($resultSet as $name)
	$thead .= $name != 'article' ? '<th>'.$name.'</th>' : '';
$thead = '<tr>'.$thead.'</tr>';

// DISPLAY
$output = '<table border="0" class="list">'.$thead.$tbody.'</table>';
?>
