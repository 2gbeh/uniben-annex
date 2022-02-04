<?PHP
$table = "msc_todo";
$nav = 'todo_preview.php';

$MODEL->Reset($table);
$sql = "SELECT * FROM ".$table." ORDER BY id";
$resultSet = $MODEL->Execute($sql);
//var_dump($resultSet);
if ($resultSet)
{
	$sn = 0;
	foreach ($resultSet as $row)
	{
		$sn++;		
		$caption = $row->headline;
		$date = transDate($row->date,'l, F j, Y \a\t h:i A');
				
		$utm = setQuery($row->date);
		$action = $nav.'?'.$utm;

		$buffer .= '<tr><td>
			<a href="'.$action.'">
				<div class="top">'.$sn.'. '.$caption.'</div>
				<div class="bottom">
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
			Total
		</th>
	</tr>
	'.$tbody.'
</table>';

?>
