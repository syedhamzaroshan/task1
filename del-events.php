<?php  

include('configuration/db.php');


$events_del = mysqli_query($conn, "DELETE FROM event WHERE event_id = '".$_GET['id']."' ");

		if ($events_del) 
		{
		echo "<script>alert('Deleted Successfully')</script>";
		echo "<script>window.location.href = 'view-events'</script>";
		}

		else 
		{
		echo "<script>alert('Data Not Deleted')</script>";
		echo "<script>window.location.href = 'view-events'</script>";
		}

?>
