<?PHP
//var_dump($_SERVER);
$table = 'msc_news';
$nav = 'blog.php';
$base = 'media/uploads/news/';

$sql = "SELECT * FROM ".$table." ORDER BY id DESC";
$resultSet = $MODEL->Execute($sql);
foreach ($resultSet as $row)
{
	$thumbnail = $base.$row->thumbnail;
	$headline = $row->headline;
	$byline = $row->byline ? $row->byline : '';
	$footnote = transDate($row->date);
	$status = $row->status;	

	$utm = setQuery($row->date);
	$action = $nav.'?'.$utm;
	$class = $status == 1? 'disabled':'';
			
	$buffer .= '<li>
		<a href="'.$action.'" class="'.$class.'">
		<table border="0" class="post">
		<tr>
			<td class="left">
				<figure class="thumbnail" style="background-image:url('.$thumbnail.')">&nbsp;</figure>
			</td>
			<td class="right">
				<div class="headline">'.$headline.'</div>
				<div class="byline">'.$byline.'</div>
				<div class="footnote">'.$footnote.'<div>
			</td>
		</tr>
		</table>
		</a>
	</li>';
}
$output = '<ul class="feed">'.$buffer.'</ul>';
?>
