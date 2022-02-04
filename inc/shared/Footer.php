<?php 
$MODEL->Reset('msc_otis'); 
$otis = $MODEL->OTIS()->csv; 
?>
<footer id="bottom" ondblclick="$_toTop()">
    <?php echo $MANIFEST->impressum; ?> 
    <span class="hotkey" onclick="otis(this)" title="Traffic Stats?" data-csv="<?php echo $otis; ?>">(i)</span>
</footer>
<script type="text/javascript">
function otis (args)
{
	var $csv = args.getAttribute('data-csv');
	var $array = $csv.split(',');
	var $buffer = "*** TRAFFIC STATS *** \n";
	$buffer += "Total Hits: " +$array[1]+ "\n";
	$buffer += "Unique Hits: " +$array[2]+ ", " +$array[3]+ " (today) \n";
	$buffer += "Average Hits: " +$array[4]+ " (per day) \n";
	$buffer += "Monthly Active Users: " +$array[5]+ "\n";
	$buffer += "Retention Rate: " +$array[6]+ "%";
	alert($buffer);
}
</script>