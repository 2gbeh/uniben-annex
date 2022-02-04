<?PHP
function timestamp () {return date("YmdHis");}
function setQuery ($args)
{
	$output = str_replace(' ','',$args);
	$output = str_replace('-','',$output);
	$output = str_replace(':','',$output);	
	return $output;
}
function getQuery ($args)
{
	$keys = array_keys($args);
	$timestamp = current($keys);
	$y = substr($timestamp,0,4);
	$m = substr($timestamp,4,2);
	$d = substr($timestamp,6,2);
	$h = substr($timestamp,8,2);
	$i = substr($timestamp,10,2);
	$s = substr($timestamp,12,2);
	$output = $y.'-'.$m.'-'.$d.' '.$h.':'.$i.':'.$s;
	return $output;
}
function transDate ($timestamp, $format = "D, M j, Y h:i A")
{
	$strtotime = strtotime($timestamp);
	return date($format,$strtotime);	
}
function isActive ($args) 
{
	$url = $_SERVER['PHP_SELF'];
	$file = array_pop(explode('/',$url));
	$page = array_shift(explode('.',$file));
	if ($args == $page) return "class='active'";
}
function isSelected ($name, $option) 
{
	if ($_POST[$name] == $option) return 'selected="selected"';
}
function getNavBadge ($args) 
{
	if (is_numeric($args) && $args > 0)
	{
		$output = $args < 10 ? '0'.$args : $args;
		return '<var>'.$output.'</var>';
	}
}
function getError ($err)
{
	if ($err || $_GET['err'])
	{
		if ($_GET['err']) $err = $_GET['err'];
		$code = substr($err,0,1);
		$message = substr($err,1);
		if ($code == "$") $color = 'ERROR-PRIMARY';
		else if ($code == "!") $color = 'ERROR-DANGER';
		else if ($code == "@") $color = 'ERROR-WARNING';
		else if ($code == "#") $color = 'ERROR-INFO';
		else {$color = 'ERROR-SUCCESS'; $message = $err; $_POST = array();}
		$output = "<div class='ERROR ".$color."' id='ERROR'>
			<span class='ERROR-CANCEL' title='Close' onClick=document.getElementById('ERROR').style.display='none'>&times;</span>
			".$message."
		</div>";
		return $output;			
	}
}
function toNumber ($args) 
{
	$args = str_replace('.00','',$args);
	$args = str_replace(',','',$args);
	$args = str_replace(' ','',$args);	
	for ($i = 0; $i < strlen($args); $i++) {$array[] = (int)$args[$i];}
	$output = implode('',$array);
	return (int)$output;
}
function toMoney ($args) 
{
    if (is_double($args) || strlen($args) <= 3) {return $args;}
    else
    {
		$args = toNumber($args);
		$output = number_format($args);
		return $output;
    }
}
function loadPage ($url) 
{
	echo '<script type="text/javascript">location.assign("'.$url.'");</script>';
}
function securePage ($sessionKey, $url) 
{
	if (!$sessionKey) $sessionKey = 'user';
	if (!$url) $url = '../../index.php?err=!Log in to access Account';
	if (!isset($_SESSION[$sessionKey])) loadPage($url);
}


?>