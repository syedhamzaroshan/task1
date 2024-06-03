<?php  

include('configuration/db.php');

$entry_del = mysqli_query($conn, "DELETE FROM entry WHERE entryid = '".$_GET['id']."'");

		if ($entry_del) 
		{
		echo "<script>alert('Deleted Data Successfully')</script>";
		echo "<script>window.location.href = 'index'</script>";
		}

		else 
		{
		echo "<script>alert('Data Not Deleted')</script>";
		echo "<script>window.location.href = 'index'</script>";
		}

?>
