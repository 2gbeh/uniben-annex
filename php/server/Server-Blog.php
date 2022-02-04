<?PHP
$table = 'msc_news';
$nav = 'index.php';
$base = 'media/uploads/news/';

$getQuery = getQuery($_GET);
$whereClause = array('date',$getQuery);
$result = $MODEL->Read($whereClause,true);

if ($_GET && $result)
{
	$row = $result;	
	$this_page = $row->headline;
	$this_desc = htmlspecialchars(substr($row->article,0,160));	

	$headline = $row->headline;	
	$byline = $row->byline;
	$footnote = 'Posted on '.transDate($row->date,'l, F j, Y \a\t h:i A (T)');
	$thumbnail = $base.$row->thumbnail;
	$figcaption = $row->source ? 'Photo Source: '.$row->source:'';
	$article = $row->article;

	$output = '<div class="headline">'.$headline.'</div>
	<div class="byline">'.$byline.'</div>
	<div class="footnote">'.$footnote.'</div>
	<figure class="thumbnail" style="background-image:url('.$thumbnail.');">&nbsp;</figure>
	<div class="figcaption">'.$figcaption.'</div>    
	<article>'.$article.'</article>';
}
else
{
	$base = 'media/icons/';		
	$this_page = 'No content found';
	$this_desc = false;
	
	$icon = '<img src="'.$base.'404.png" alt="'.$this_page.'" border="0" />';
	$caption = '<h2>'.$this_page.'</h2>';
	$option= '<h3>Troubleshooting suggestions:</h3>
	<ol class="bullet-list">
		<li>Check the address for typing errors such as ww.example.com instead of www.example.com
		<li>If you are unable to load any pages, check your computer’s network connection.
		<li>If your computer or network is protected by a firewall or proxy, make sure that Firefox is permitted to access the Web.		
	</ol>';

	$output = '<div class="troubleshoot">'.$icon.$caption.$option.'</div>';
}
?>