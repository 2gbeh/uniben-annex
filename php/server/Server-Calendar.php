<?PHP
$classMap = array($mon,$tue,null,$thu,$fri,null,null);
$daysMap = $ENUMS->getCourseDays();
$timeMap = $ENUMS->getCourseTime();
$typeMap = $ENUMS->getCourseType();
$hexMap = array_values($ENUMS->getHexcode());
/*
array
(
	"code"=>"CSC 801",
	"title"=>"Current topics in Computer Science",
	"faculty"=>"Dr. F. Chete, Dr. (Mrs) V.I. Osubor",
	"type"=>1,
	"time"=>1,
),
var_dump($daysMap);
*/
foreach ($daysMap as $i => $day)
{
	$node = '<b style="float:right;">+</b>';
	$buffer .= '<li class="top" onclick=toggleDisplay("'.$day.'")>'.$node.' '.$day.'</li>';
	$assoc = $classMap[$i];
	$inner = '';		
	if ($assoc !== null)
	{
		foreach ($assoc as $period)
		{
			$code = $period['code'];
			$title = $period['title'];
			$faculty = $period['faculty'];		
			$type = $period['type'];
			
			$n = $period['time'] - 1;
			$time = $timeMap[$n];
			$hexcode = $hexMap[$type];	
			$type_name = $typeMap[$type];
			$type_pop = str_replace(' ','%20',$type_name);			
			$type_abbr = strtolower(substr($type_name,0,1)); 
			$sup = '&nbsp;<sup title="'.$type_name.'" onclick=pureAlert("'.$type_pop.'")>['.$type_abbr.']</sup>';
			
			$inner .= '<section style="border-left:solid '.$hexcode.';">
				<div class="time">'.$time.'</div>
				<div class="course"><b>'.$code.'</b>'.$sup.' - '.$title.'</div>
				<div class="faculty">'.$faculty.'</div>
			</section>';		
		}
	}
	else
		$inner = '<section style="border-left:solid;">Lecture Free</section>';

	$dayOfWeek = date('w') < 1? 6:date('w') - 1;
	$hidden = $i == $dayOfWeek ? '' : 'display:none;';
	$buffer .= '<li class="bottom" id="'.$day.'" style="'.$hidden.'">'.$inner.'</li>';	
}



$output = '<ul class="feed">'.$buffer.'</ul>';

?>