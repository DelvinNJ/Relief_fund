 <?php   
 //database.php  
 class Databases{  
	public $con;  
	public $error;  

	// Database Connection
	public function __construct()  
	{  
			 $this->con = mysqli_connect("localhost", "root", "", "Relief");  
			 if(!$this->con)  
			 {  
						echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
			 }  
	}


	//Insert Query  
	public function insert($table_name, $data)  
	{  
			 $string = "INSERT INTO ".$table_name." (";            
			 $string .= implode(",", array_keys($data)) . ') VALUES (';            
			 $string .= "'" . implode("','", array_values($data)) . "')"; 
			 if(mysqli_query($this->con, $string))  
			 {  
				return true;  
			 }  
			 else  
			 {  
				echo mysqli_error($this->con);  
			 }  
	}


	// Update Query
	public function updateData($table_name,$condition_arr,$where_value)
	{
	 if($condition_arr!='')
	 {
			$sql = "UPDATE $table_name set ";
			$c = count($condition_arr);
			$i=1;
			foreach ($condition_arr as $key => $val) 
			{
				if($i == $c)
				{
					$sql.="$key='$val'";
				}
				else
				{
					$sql.="$key='$val' , "; 
				}
				$i++;	
			}
			$sql.= "where id='$where_value' ";
			echo($sql);
			mysqli_query($this->con, $sql);
	 }
	}


	// Getdata Query
 	public function getData($table_name,$field,$condition_arr='',$order_by_field='',$order_by_type='desc',$notequal='',$limit='')
	{
			$sql = "SELECT $field FROM $table_name";
			if($condition_arr!='')
			{	
				$sql.= " where ";
				$c = count($condition_arr);
				$i=1;
				foreach($condition_arr as $key => $val) 
				{
					if($i==$c)
					{
						$sql.="$key='$val'";
					}
					else
					{
						$sql.="$key='$val' and ";
					}
					$i++;
				}
			}
						
			
			if($notequal!='')
			{
				$sql.=" where ";
				$c = count($notequal);
				$i=1;
				foreach($notequal as $key => $val) 
				{
					if($i==$c)
					{
						$sql.="$key!='$val'";
					}
					else
					{
						$sql.="$key!='$val' and ";
					}
					$i++;
				}

			}
			


			if($order_by_field!='')
			{
				$sql.=" order by $order_by_field $order_by_type";
			}
			if($limit!='')
			{
				$sql.=" limit $limit";
			}
			



			$result = mysqli_query($this->con, $sql);
			if($result->num_rows>0)
			{
				$arr = array();
				while ($row = $result->fetch_assoc()) 
				{
					$arr[] = $row;
				}
				return $arr;
			}
			else{
				return 0;
			}


	}



	public function deleteData($table_name, $condition_arr)
	{
	 if($condition_arr!='')
	 {
			$sql = "DELETE FROM $table_name where ";
			$c = count($condition_arr);
			$i=1;
			foreach ($condition_arr as $key => $val) 
			{
				if($i == $c)
				{
					$sql.="$key='$val'";
				}
				else
				{
					$sql.="$key='$val' and"; 
				}
				$i++;	
			}
		$result=mysqli_query($this->con, $sql);

	 }
	}  

	









	public function get_safe_str($str)
	{
		if($str!='')
		{
			return (mysqli_real_escape_string($this->con,$str));
		}
	}
 }  
 ?>  