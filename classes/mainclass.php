<?php 

$conn = mysqli_connect ("localhost","root","","realdream");
if (mysqli_connect_error($conn))
{
	echo "connection failed";
}




class academic_exam 
{
	
	
	public function test_info($conn)
	{
		//$arr[]=0;
		$sql = "SELECT * FROM signup";
		$qry =mysqli_query($conn,$sql);
		$result = mysqli_fetch_assoc($qry)
		return $result;
	}
	
};
?>