<?PHP
//var_dump($_SERVER);
$table = 'msc_downloads';
$nav = 'admin_downloads_form.php';
$MODEL->Reset($table);

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
	$serial = $row->sn;
	$title = $row->title;
	$filename = $row->filename;	
	$size = $row->size;
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
		<td>'.$serial.'</td>
		<td>'.$title.'</td>
		<td class="nowrap">'.$filename.'</td>
		<td>'.$size.'</td>
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
	$thead .= '<th>'.$name.'</th>';
$thead = '<tr>'.$thead.'</tr>';

// DISPLAY
$output = '<table border="0" class="list">'.$thead.$tbody.'</table>';
?>
