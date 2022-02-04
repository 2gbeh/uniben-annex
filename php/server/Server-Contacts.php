<?PHP
$hex = $ENUMS->getHexcode();
foreach ($listContacts as $assoc)
{
	$rowArray = explode(',',$assoc);
	$matno = $rowArray[0];	
	/*$nameArray = explode(' ',$rowArray[1]);
	if (count($nameArray) > 2)
		$name = $nameArray[0].' '.$nameArray[1].' '.substr($nameArray[2],0,1).'.';
	else 
		$name = $nameArray[0].' '.$nameArray[1];*/
	$name = $rowArray[1];
	$phone = $rowArray[2];

	$randHex = array_rand($hex,1);
	$bottom = $phone ? '
	<div class="bottom">
		<div class="phone">
			<label>Tel:</label> '.$phone.'
		</div>
	</div>':'';
	
	$buffer .= '<li>
		<div class="top" style="border-top:solid '.$hex[$randHex].';">
			<div class="name">'.$name.'</div>
			<div class="matno">'.$matno.'</div>			
		</div>
		'.$bottom.'
	</li>';	
}
$output = '<ul class="feed">'.$buffer.'</ul>';
?>