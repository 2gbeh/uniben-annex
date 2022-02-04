<?PHP
class Manifest
{
	function __construct ()
	{
		$this->root =			"msc";		
		$this->appname = 		"Legacy";
		$this->alias = 			"msc";		
		$this->typeface = 		"M.Sc. (CS), UNIBEN 2018/2019";
		$this->abbr =	 		"MSC";
		$this->domain = 		"msc.hwplabs.com";
		$this->url = 			"http://msc.hwplabs.com/";	
		$this->cpanel = 		"http://cpanel.hwplabs.com/";
		$this->webmail =		"http://webmail.hwplabs.com/";
		$this->type = 			"School Portal";
		$this->meta = 			array 
								(
									"title"=>"Welcome to Masters (M.Sc.) in Computer Science, UNIBEN 2018/2019",
									"alt"=>$this->typeface,
									"desc"=>"Your online repository for all programme related news, shared media and course materials.",
									"keywords"=>"uniben,msc in computer science,msc,software engineering,hwp labs,tugbeh emmanuel",
									"author"=>"Tugbeh Emmanauel"
								);		
		$this->favicon = 		"media/icons/favicon.png";		
		$this->logo = 			"media/images/logo.png";
		$this->theme = 			array 
								(
									"pri"=>"#0093DD",
									"sec"=>"#007BB8",
									"alt"=>"#75C5F0"
								);
		$this->contractor = 	array 
								(
									"company"=>"HWP Labs",
									"name"=>"Tugbeh Emmanauel",
									"email"=>"tugbeh.osaretin@gmail.com",
									"phone"=>"08169960927"
								);
		$this->client = 		array 
								(
									"company"=>"HWP Labs",
									"name"=>"Tugbeh Emmanauel",
									"email"=>"tugbeh.osaretin@gmail.com",
									"phone"=>"08169960927"
								);
		$this->mailto =			array 
								(
									"info"=>"info@hwplabs.com",
									"support"=>"support@hwplabs.com",
									"contact"=>"contact@hwplabs.com",
									"link"=>"<a href='mailto:contact@hwplabs.com?Subject=Prospective%20Customer'>contact@hwplabs.com</a>",
									"sender"=>"HWP Labs Dive Team"
								);
		$this->copyright = 		"2019 HWP Labs. CRBN 658815";		
		$this->impressum =	 	"Copyright &copy; 2019 <a href='http://www.hwplabs.com/'>HWP Labs</a>. CRBN 658815";
		$this->framework =	 	"DragonFly";
		$this->bundle =			"1.8.4.19";
		$this->dates = 			array 
								(
									"initial"=>"2017/09/10",
									"stable"=>"2018/09/08",
									"expires"=>"2019/08/08",
									"renewal"=>"08/09/2018 - 07/09/2019"
								);
	}
}
$MANIFEST = new Manifest();
?>