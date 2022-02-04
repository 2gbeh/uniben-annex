<?php
/*		
		'Lecture Note I, CSC801 - Current topics in Computer Systems',
		'by Dr. F. Chete',		
		'Lecture Note III, CSC803 - Advanced Compiler Construction',
		'by Dr. F.I. Amadin',			
		'Lecture Note IV, CSC824 - System Analysis &amp; Design',
		'by Prof. (Mrs) F. Egbokhare',		
		'Lecture Note I, CSC839 - Seminar',
		'by Dr. S.S. Daodu',		
		'Lecture Note III, CSC834 - Design and Analysis of Algorithm',
		'by Prof. A.A. Imianvan',		
		'Lecture Note I, CSC841 - Programming Languages',
		'by Dr. K.C. Ukaoha',
*/
include_once("conf/@conf.php");
$col = array('headline','byline','article','thumbnail','source','status','date','id');
$row = array 
(
	array 
	(
		'Lecture Note IV, CSC834 - Design and Analysis of Algorithm',
		'by Prof. A.A. Imianvan',		
		'Encoding',
		'',
		'',
		'1',
		'2019-05-16 09:00:00',
		'45'
	)
);

$sandbox = false;
$counter = 0;
foreach ($row as $assoc)
{
	$post = array();
	for ($i = 0; $i < count($col); $i++)
	{
		$key = $col[$i];
		$value = $assoc[$i];
		$post[$key] = $value;
	}
	if ($sandbox == true && $MODEL->Create($post))
		$counter++;
}
echo "Total rows affected: ".$counter;
?>

