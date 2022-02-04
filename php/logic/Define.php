<?PHP
$def_form_action = 'action="'.htmlspecialchars($_SERVER['PHP_SELF']).'"';
$def_form_action .= '  method="post"';
$def_form_action .= ' autocomplete="off"';  

$def_file_action = $def_form_action;
$def_file_action .= ' enctype="multipart/form-data"';

$appstate = $_SESSION['appstate']; 
$user = $_SESSION['user'];
$admin = $_SESSION['admin'];
?>
