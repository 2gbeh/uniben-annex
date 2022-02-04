<?PHP
class DataModel
{
	public $conn, $server, $username, $password, $database, $table;
	function __construct ($table)
	{
		$this->pseudo = "hwplabsc";		
		$this->server = "localhost";
		$this->username = $this->Localhost() ? "root" : $this->pseudo."_root";
		$this->password = $this->Localhost() ? "" : "_Strongp@ssw0rd";
		$this->database = $this->pseudo."_db";
		$this->table = $table ? $table : "msc_news";
		$this->Connect();
	}
	function Localhost () {if ($_SERVER['SERVER_NAME'] == 'localhost') return true;}	
	function Connect ()
	{	
		$this->conn = new mysqli 
		(
			$this->server,
			$this->username,
			$this->password,
			$this->database
		);
		if ($this->conn->connect_error) die("Connection failed: ".$this->conn->connect_error);
	}
	function Reset ($table) {$this->table = $table;}	
	function Schema ($table)
	{
		$conn = $this->conn;		
		$table = $table ? $table : $this->table;
		$sql = "SHOW COLUMNS FROM ".$table;
		$result = $conn->query($sql);
		while ($row = $result->fetch_object()) {$output[] = $row;}
		return $output;
	}
	function Fields ($table)
	{
		$resultSet = $this->Schema($table);
		foreach ($resultSet as $object)
			$output[] = $object->Field;
		return $output;
	}
	function Column ($column_name = 'id')
	{
		$sql = "SELECT ".$column_name." FROM ".$this->table;
		$result = $this->Execute($sql);
		foreach ($result as $assoc) $output[] = current($assoc);
		return $output;
	}	
	function Size ($table)
	{
		$table = $table ? $table : $this->table;
		$sql = "SELECT COUNT(id) FROM ".$table;
		$result = $this->Execute($sql,true);
		return current($result) ? current($result) : 0;
	}
	function Sum ($column_name)
	{
		$sql = "SELECT SUM(".$column_name.") FROM ".$this->table;
		$result = $this->Execute($sql,true);
		return current($result) ? current($result) : 0;
	}	
	function Unique ($column_name)
	{
		$sql = "SELECT DISTINCT ".$column_name." FROM ".$this->table;
		$result = $this->Execute($sql,true);
		return $result ? count($result) : 0; 
	}
	function Exist ($field, $value)
	{
		$sql = "SELECT id FROM ".$this->table." WHERE ".$field."='".$value."'";
		$result = $this->Execute($sql,true);
		return current($result);		
	}		
	function Recent ($table)
	{
		$table = $table ? $table : $this->table;
		$sql = "SELECT * FROM ".$table." WHERE DATE(date)=CURDATE()";
		$result = $this->Execute($sql);
		return $result;
	}
	function Create ($array)
	{
		$conn = $this->conn;		
		$table = $this->table;		
		// Fields
		$array_keys = array_keys($array);
		$fields = implode(",",$array_keys);
		// Values
		$array_values = array_values($array);
		foreach ($array_values as $each) {$values .= "'".$each."',";}
		$values = substr($values,0,-1);
		// Query
		$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$values.")";
		if ($conn->query($sql) === TRUE) {return $conn->insert_id;}
	}
	function Read ($where, $strict = false)
	{
		$conn = $this->conn;		
		$table = $this->table;
		// Where Clause		
		if (is_array($where) && count($where) == 2) 
			$whereClause = " WHERE ".$where[0]."='".$where[1]."'";
		else if (is_numeric($where) && $where > 0) 
			$whereClause = " WHERE id='".$where."'";
		// Query
		$sql = "SELECT * FROM ".$table.$whereClause;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
			while ($row = $result->fetch_object()) {$array[] = $row;}
		$output = $strict == true && count($array) == 1 ? current($array) : $array;
		return $output;
	}
	function Update ($array, $where)
	{
		$conn = $this->conn;		
		$table = $this->table;		
		// Where Clause		
		if (is_array($where) && count($where) == 2) 
			$whereClause = " WHERE ".$where[0]."='".$where[1]."'";	
		else if (is_numeric($where) && $where > 0) 
			$whereClause = " WHERE id='".$where."'";			
		// Set Clause
		foreach ($array as $key => $value) {$setClause .= $key."='".$value."',";}
		$setClause = substr($setClause,0,-1);
		// Query
		$sql = "UPDATE ".$table." SET ".$setClause.$whereClause;
		if ($conn->query($sql) === TRUE) {return true;}
	}
	function Delete ($where)
	{
		$conn = $this->conn;		
		$table = $this->table;
		// Where Clause				
		if (is_array($where) && count($where) == 2) 
			$whereClause = " WHERE ".$where[0]."='".$where[1]."'";
		else if (is_numeric($where) && $where > 0) 
			$whereClause = " WHERE id='".$where."'";			
		// Query
		$sql = "DELETE FROM ".$table.$whereClause;
		if ($conn->query($sql) === TRUE) {return true;}
	}
	function Execute ($sql, $strict = false)
	{
		$conn = $this->conn;		
		$table = $this->table;
		if (substr($sql,0,6) == "SELECT")
		{
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
				while ($row = $result->fetch_object()) {$array[] = $row;}
			$output = $strict == true && count($array) == 1 ? current($array) : $array;
			return $output;
		}
		else
		{ 
			if ($conn->query($sql) === TRUE) 
				$output = substr($sql,0,6) == "INSERT" ? $conn->insert_id : true;
			return $output;
		}
	}
	function Sanitize ($array, $strict = false) 
	{
		foreach ($array as $name => $value)
		{
			if (substr($name,0,7) != 'submit-' && $name != 'id')
			{
				$value = trim($value);
				$value = stripslashes($value);
				$value = htmlspecialchars($value);
				$new_array[$name] = $value;
			}		
		}
		return $strict == true ? $this->SanitizeStrict($new_array):$new_array;
	}
	function SanitizeNoStrip ($array, $strict = false) 
	{
		foreach ($array as $name => $value)
		{
			if (substr($name,0,7) != 'submit-' && $name != 'id')
			{
				$value = trim($value);
				$new_array[$name] = $value;
			}		
		}
		return $strict == true ? $this->SanitizeStrict($new_array):$new_array;
	}
	private function SanitizeStrict ($array) 
	{
		foreach ($array as $key => $value)
			if (strlen($value) > 0)
				$new_array[$key] = $value;
		return $new_array;
	}					
	function Filesyst ($base)
	{		
		if (count($_FILES) == 1)
		{
			$array = current($_FILES);
			if ($array['name'])
			{
				$obj = (object)$array;
				$map_img = array('jpeg','jpg','png','gif','bmp','tif');
				$map_vid = array('3gp','mp4','avi','ogg','flv','mkv','webm','wav');
				$map_doc = array('txt','pdf','doc','docx','ppt','pptx','xls','xlsx');
				$obj->kb = round($array['size']/1024);
				$obj->tmp = array_pop(explode('\\',$array['tmp_name']));
				$obj->ext = array_pop(explode('.',$array['name']));
				$obj->format = '.'.$obj->ext;
				$obj->base = $base;
				$obj->def = str_replace(' ','_',$array['name']);
				$obj->def_name = $base.$obj->def;
				$obj->alt = date("YmdHis").$obj->format;
				$obj->alt_name = $base.$obj->tim;
				$obj->is_img = in_array($obj->ext,$map_img) ? true:false;
				$obj->is_vid = in_array($obj->ext,$map_vid) ? true:false;
				$obj->is_doc = in_array($obj->ext,$map_doc) ? true:false;
				$output = $obj;
				return $output;
			}
		}
	}
	function Page ()
	{
		$str = $_SERVER['SCRIPT_FILENAME'];
		$arr = explode('/',$str);
		
		$output->url = $url = $str;
		$output->size = $size = count($arr)-1;
		$output->root = $root = $arr[0];
		$output->parent = $parent = $arr[count($arr)-2];
		$output->file = $file = $arr[count($arr)-1];
		$output->page = $page = array_shift(explode('.',$file));
		$output->ext = $ext = array_pop(explode('.',$file));
		return $output;
	}
	function Proxy ()
	{
		if ($_SERVER['HTTP_CLIENT_IP'])
			$proxy = $_SERVER['HTTP_CLIENT_IP'];
		else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
			$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if ($_SERVER['HTTP_X_FORWARDED'])
			$proxy = $_SERVER['HTTP_X_FORWARDED'];
		else if ($_SERVER['HTTP_FORWARDED_FOR'])
			$proxy = $_SERVER['HTTP_FORWARDED_FOR'];
		else if ($_SERVER['HTTP_FORWARDED'])
			$proxy = $_SERVER['HTTP_FORWARDED'];
		else if ($_SERVER['REMOTE_ADDR'])
			$proxy = $_SERVER['REMOTE_ADDR'];
		else
			$proxy = $_SERVER['SERVER_ADDR'];
	
		if (!filter_var($proxy, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false)
			return $proxy;
		if (!filter_var($proxy, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false)
			return $proxy;			
	}	
	function OTIS ($whitelist)
	{
		$csv = '127.0.0.1,129.205.113.92,'.$whitelist;
		$arr = explode(',',$csv);
		$proxy = $this->Proxy();
		
		if (!in_array($proxy,$arr) && substr($proxy,0,12) != '129.205.113.')
		{		
			$source = $this->Page()->file;		
			$date = date('Y-m-d H:i:s');		
			$sql = "SELECT * FROM ".$this->table." WHERE proxy='".$proxy."' AND DATE(date)=CURDATE()";
			$result = $this->Execute($sql,true);
			if (is_object($result))
			{
				$counter = $result->counter + 1;
				$array = array('source'=>$source,'counter'=>$counter,'date'=>$date);
				$this->Update($array,$result->id);
			}
			else 
			{
				$array = array('source'=>$source,'proxy'=>$proxy);
				$this->Create($array);
			}
		}
#		$resultSet = $this->Read();
		$total = $this->Size();
		$gross = $this->Sum('counter');
		$unique = $this->Unique('proxy');		
		$today = count($this->Recent());
		$days = $this->Unique('date');
		$average = round($gross / $days);
		$monthly = $average * 30;
		$rate = ($unique * 100) / $total;
		$retention = round(100 - $rate);
				 
		$output->total = $total;
		$output->gross = $gross;
		$output->unique = $unique;
		$output->today = $today;
		$output->average = $average;
		$output->monthly = $monthly;
		$output->retention = $retention;
		$output->csv = implode(",",(array)$output);
		return $output;
	}
}
$MODEL = new DataModel();
?>
