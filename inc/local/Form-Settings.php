<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$table = 'dve_users';		
	$_POST = JRAD_VAL_TRIM($_POST);
	if ($_POST['username'] != $USER->username && JRAD_VAL_USERNAME($table)) 
		$err .= "Username already exist.<br/>";
	if ($_POST['phone'] != $USER->phone && JRAD_VAL_PHONE($table)) 
		$err .= "Phone Number already exist.<br/>";
	
	if ($err) {$err = '!'.$err;}
	else
	{		
		$execute = JRAD_ACCOUNT_UPDATE($table);
		if ($execute) {JRAD_CTRL_GOTO('?err=Account information updated.');}
		else {$err = "!Oops, something went wrong.";}
	}
	
}
?>