<?php 

/**
 * <?php
$conn = mysqli_connect ("localhost","realdrea_boy","Adhull@123","realdrea_quiz");
if (mysqli_connect_error($conn))
{
	echo "connection failed";
}



?>
 */
class db
{
	PUBLIC $conn;
	public function __construct()
	{
		$this->conn =  mysqli_connect ("localhost","root","","realdream");
		if (mysqli_connect_error($this->conn))
		{
			echo "connection failed".mysqli_connect_error();
		}


	}
	 public function select($sql)
	
	{
		//$result = mysqli_query($conn, $sql);


			$resultset = array();
			$result    = $this->conn->query($sql);
			if($result)
			{
				if($result->num_rows > 0)
				
				{
					while($row = $result-> fetch_assoc())
					{
						$resultset[] = $row;
					}
					return $resultset;
				}

				return false;
			}
	}
	public function update($sql,$redirect)
	{
		if(mysqli_query($this->conn, $sql)){ 
		    echo "Record was updated successfully."; 
		    echo $redirect;
		} else { 
		    echo "ERROR: Could not able to execute $sql. "  
		                            . mysqli_error($this->conn); 
		}  
	return false;
	
	}  
	public function insert($sql)
	{
		$result = $this->conn->query($sql);
		if ($this->conn->affected_rows >0) {
			echo "inse";
		}else{
			return $result.error_get_last();
		}
		return false;
}
	}
	




$select = new db;
/*
$sql="select * from signup where name = mpm";
$getresult = $select->select_data($sql);
if($getresult)
{
	foreach ($getresult as  $value) {
		$name = $value['name'];
		echo $name."<br>";
	}
}
$sql = "UPDATE signup SET name = 'Abhishek' where sid = 3 ";
$result = $select->update($sql);
$sql = "INSERT into signup (name,email) values ('MPM','email')";
#$select->insert($sql);*/
define('ROOT', __DIR__ .'/');
?>