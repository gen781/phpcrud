<?php
// include database connection file
include_once("function.php");


//Deletion
if(isset($_GET['del']))
    {
        // Geeting deletion row id
		$rid=$_GET['del'];
		$deletedata=new DB_con(); 
		$sql=$deletedata->delete($rid);

		if($sql)
		{
			// Message for successfull insertion
			echo "<script>alert('Data berhasil dihapus');</script>";
			echo "<script>window.location.href='index.php'</script>"; 
		}
    }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD dengan MYSQL </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css"></style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h3>PHP CRUD dengan MYSQL</h3> <hr />
	<a href="insert.php"><button class="btn btn-primary"> Tambah Data</button></a>
	<div class="table-responsive">                
	<table id="mytable" class="table table-bordred table-striped">                 
		<thead>
			<th>#</th>
			<th>Nama Awal</th>
			<th>Nama Akhir</th>
			<th>Email</th>
			<th>No. HP</th>
			<th>Alamat</th>
			<th>Tgl. Posting</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
	<tbody>
		

	<?php
	$fetchdata=new DB_con(); 
	$sql=$fetchdata->fetchdata();
	$cnt=1;
	while($row=mysqli_fetch_array($sql))
	{
		?>               
			<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<td><?php echo htmlentities($row['FirstName']);?></td>
			<td><?php echo htmlentities($row['LastName']);?></td>
			<td><?php echo htmlentities($row['EmailId']);?></td>
			<td><?php echo htmlentities($row['ContactNumber']);?></td>
			<td><?php echo htmlentities($row['Address']);?></td>
			<td><?php echo htmlentities($row['PostingDate']);?></td>

			<td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

			<td><a href="index.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Yakin menghapus data?');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
			</tr>
		<?php 
		// for serial number increment
		$cnt++;
	} ?>
	</tbody>      
	</table>
	</div>
	</div>
	</div>
	</div>
</body>
</html>