<?PHP
$table = "msc_downloads";
$base = "media/uploads/downloads/";

$MODEL->Reset($table);
$sql = "SELECT * FROM ".$table." ORDER BY sn";
$resultSet = $MODEL->Execute($sql);
//var_dump($resultSet);
if ($resultSet)
{
	foreach ($resultSet as $row)
	{
		$sn = $row->sn;
		$caption = $row->title;
		$filename = $row->filename;		
		$size = toMoney($row->size);
		$date = transDate($row->date,'M j, Y h:i A');

		$href = substr($filename,'0',4) == 'http' ? $filename : $base.$filename;
		$dwl_ext = array_pop(explode('.',$filename));
		$dwl_name = str_replace(' ','_',$caption).'.'.$dwl_ext;
		$dwl_state = $dwl_ext == 'html' ? '' : 'download="'.$dwl_name.'"';		
		$action  = 'href="'.$href.'" '.$dwl_state.' title="Click to Download"';

		$buffer .= '<tr><td>
			<a '.$action.'>
				<div class="top">'.$sn.'. '.$caption.'</div>
				<div class="bottom">
					<span class="size">'.$size.' KB</span>
					<span class="date">'.$date.'</span>
				</div>
			</a>
		</td></tr>';
		
	}
	$total = count($resultSet);	
	$tbody = $buffer;
}
else 
{
	$tbody = "<tr><td>
		<a><span class='date'><kbd>No content found</span></a>
	</td></tr>";
}

$output = '<table border="0" class="feed">
	<tr>
		<th>
			<span class="total">'.$total.'</span>
			All Files
		</th>
	</tr>
	'.$tbody.'
</table>';

?>
