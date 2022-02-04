// JavaScript Document
function $_clearRequest ()
{
	var $page = window.location.href;
	var $page = $page.split('#') && $page.split('?');	
	return $page[0];
}
function $_goto ($url)
{
	if ($url[0] == "?") {window.location.href = $_clearRequest() + $url;}
	else window.location.href = $url;	
}
function $_toTop ()
{
	var $page = window.location.href;
	var $clear = $page.split('#');
	window.location.href = $clear[0]+'#';
}
function $_toBottom ($url)
{
	var $page = window.location.href;
	var $clear = $page.split('#');
	window.location.href = $clear[0]+'#bottom';
}
function pureAlert ($args) 
{
	var $jscape = $args.replace('%20',' ');
	alert($jscape);
}
function toggleDisplay ($args) 
{
	var $status, $target = document.getElementById($args);
	if (!$target.style.display || $target.style.display == "none")
		$status = "block";
	else 
		$status = "none";
	$target.style.display = $status;	
}
function unitDelete ($args)
{
	if (confirm('Delete Record?') == true)
		$_goto("?delete="+$args);
}
function batchDelete ($args)
{
	if (confirm('Delete Records?') == true)
		document.getElementById($args).submit();
}
function secureLogin ($args)
{
	var password = prompt("Enter Password :");
	if (password != null)
	{
		if (password == "4444") $_goto("admin_news_form.php?appstate=true");
		else alert("Unathorized Access!");
	}
}


