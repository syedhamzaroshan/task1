
<?php 

include('configuration/db.php');

?>

<html>  
<head>  
<title>Edit Events</title>

<link rel="stylesheet" href="css/bootstrap.min.css"/> 
<link rel="stylesheet" href="css/fullcalendar.css" />
 
<link rel="stylesheet" href="css/bootstrap.min.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/fullcalendar.min.js"></script>

<style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 .error
{
  color: red;
  font-weight: 700;
} 
</style>

</head>
<body>
  <h2 style="text-align: center;">Javascript Fullcalendar</h2>
  <div class="container">
    <div class="row">
    
<?php 

if(isset($_POST['submit']))
{
  $title = $_POST['title'];
  $eventtype = $_POST['eventtype'];
  $eventColor = $_POST['eventColor'];
  $eventbgcolor = $_POST['eventbgcolor'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  
  $insert_query = mysqli_query($conn, "UPDATE event SET event_name = '$title', eventtype = '$eventtype', eventColor = '$eventColor', eventbgcolor = '$eventbgcolor', event_start_date = '$start_date', event_end_date = '$end_date' WHERE event_id = '".$_GET['id']."'");
  if($insert_query)
  {
    echo "<script>alert('Updated Successfully')</script>";
    header('location:view-events');
  }
  else
  {
    $msg = "Event not created";
  }
}
?> 
    <div class="container">  
    <div class="table-responsive">  
    <h3 style="text-align:center;">Edit Event</h3><br/>
    <div class="box">
     <form method="POST" action="#">  
     <?php 

$fetch_event = mysqli_query($conn, "SELECT * FROM event WHERE event_id = '".$_GET['id']."'");
if (mysqli_num_rows($fetch_event) > 0) 
{
       while($row = mysqli_fetch_array($fetch_event))
       { 
?>
       <div class="form-group">
       <label for="title">Enter Title of the Event</label>
       <input type="text" name="title" id="title" value="<?php echo $row['event_name']; ?>" 
       data-parsley-type="title" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>

      <div class="form-group">
       <label for="title">Select Event</label>
       <select class="form-control" name="eventtype" class="form-control">
       <option value="<?php echo $row['eventtype']; ?>"><?php echo $row['eventtype']; ?></option>
        <option value="None">Select Event*</option>
        <option value="Checklist">Checklist</option>
        <option value="Event">Event</option>
        <option value="Holiday">Holiday</option>
        </select>
      </div>

      <div class="form-group">
       <label for="title">Select Text Color</label>
       <input type="color" name="eventColor" class="form-control" value="<?php echo $row['eventColor']; ?>">
      </div>

      <div class="form-group">
       <label for="title">Select Bg-Color</label>
       <input type="color" name="eventbgcolor" class="form-control" value="<?php echo $row['eventbgcolor']; ?>">
      </div>

      <div class="form-group">
       <label for="date">Start Date</label>
       <input type="date" name="start_date" value="<?php echo $row['event_start_date']; ?>"  
       data-parsley-type="date" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>

      <div class="form-group">
       <label for="date">End Date</label>
       <input type="date" name="end_date" id="end_date"  value="<?php echo $row['event_end_date']; ?>" 
       data-parsley-type="date" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
     <?php } } ?> 
      <div class="form-group">
       <button type="submit" id="save-event" name="submit" type="submit" class="btn btn-success">Update Event</button>
       </div>
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
       <a href="view-events" class="btn btn-primary">Go Back</a> 
     </form>
     </div>
   </div> 
   
</div>

   <div>
  </div>
  <br>
 
</body>  
</html> 