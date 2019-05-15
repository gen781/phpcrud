<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'in12345');
define('DB_NAME', 'phpcrud');

class DB_con
{

	function __construct()
	{

		$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		$this->dbcon=$con;

		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Ada masalah koneksi ke MySQL: " . mysqli_connect_error();
		}
	}

	//Data Insertion Function
	public function insert($fname,$lname,$emailid,$contactno,$address)
	{
		$ret=mysqli_query($this->dbcon,"insert into tblusers(FirstName,LastName,EmailId,ContactNumber,Address) values('$fname','$lname','$emailid','$contactno','$address')");
		return $ret;
	}

	//Data read Function
	public function fetchdata()
	{
		$result=mysqli_query($this->dbcon,"select * from tblusers");
		return $result;
	}


	//Data one record read Function
	public function fetchonerecord($userid)
	{
		$oneresult=mysqli_query($this->dbcon,"select * from tblusers where id=$userid");
		return $oneresult;
	}

	//Data updation Function
	public function update($fname,$lname,$emailid,$contactno,$address,$userid)
	{
		$updaterecord=mysqli_query($this->dbcon,"update  tblusers set FirstName='$fname',LastName='$lname',EmailId='$emailid',ContactNumber='$contactno',Address='$address' where id='$userid' ");
		return $updaterecord;
	}

	//Data Deletion function Function
	public function delete($rid)
	{
		$deleterecord=mysqli_query($this->dbcon,"delete from tblusers where id=$rid");
		return $deleterecord;
	}

} 
?>