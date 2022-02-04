<?php
include_once("conf/@conf.php");
include_once("php/logic/Define.php");
include_once("php/logic/Methods.php");
include_once("php/logic/Global.php");
var_dump(model());
function model ()
{
	$model = $GLOBALS['MODEL'];
	$model->Reset('msc_otis');	
/*	return $model->Schema();
	return $model->Fields();
	return $model->Exist('id',1);
	return $model->Proxy();	*/
//	return $model->Unique('proxy');
	return $model->OTIS();
}
function ftp ()
{
	return false;
	$model = $GLOBALS['MODEL'];
	$model->Reset('dve_materials');
	$resultSet = $model->Read();
	$model->Reset('msc_downloads');
	foreach ($resultSet as $i => $row)
	{
		if ($i > 25)
		{
			$s = $row->chapter;
			$c = $row->title;
			$n = $row->filename;
			$z = $row->size;
			$d = $row->eta;												
			$entry = array('sn'=>$s,'caption'=>$c,'name'=>$n,'size'=>$z,'date'=>$d);
#			$model->Create($entry);
		}
	}
	return $model->Read();
}
?>