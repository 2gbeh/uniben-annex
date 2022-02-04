<?PHP
class Enumerators
{
	function getHexcode ($key)
	{
		$array = array('red'=>'#DD4B39','green'=>'#00A654','blue'=>'#00C0EF','yellow'=>'#F39C12');
		$output = $key ? $array[$key] : $array;
		return $output;
	}
	function getCourseDays ($key)
	{
		$array = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$output = $key ? $array[$key] : $array;
		return $output;
	}
	function getCourseTime ($key)
	{
		$array = array('09:00 AM - 12:00 PM','12:00 PM - 03:00 PM','03:00 PM - 06:00 PM');
		$output = $key ? $array[$key] : $array;
		return $output;
	}
	function getCourseType ($key)
	{
		$array = array('Elective Course','Core Course','Mandatory Course','Seminar/Project');
		$output = $key ? $array[$key] : $array;
		return $output;
	}		
		
		
}
$ENUMS = new Enumerators();
?>