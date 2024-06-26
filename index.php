
<?php 

include('configuration/db.php');

?>

<html>  
<head>  
<title>JavaScript FullCalendar</title>

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
  <h2 style="text-align: center;">Events Calendar</h2>
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
   <div id="calendar"></div>
</div>
<div class="col">

<?php 

if(isset($_POST['submit']))
{
  $title = $_POST['title'];
  $eventtype = $_POST['eventtype'];
  $eventColor = $_POST['eventColor'];
  $eventbgcolor = $_POST['eventbgcolor'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  
  $insert_query = mysqli_query($conn, "INSERT INTO event(event_name,eventtype,eventColor,eventbgcolor,event_start_date,event_end_date) VALUES('$title', '$eventtype', '$eventColor', '$eventbgcolor', '$start_date', '$end_date')");
  if($insert_query)
  {
    echo "<script>alert('Added Successfully')</script>";
    header('location:index.php');
  }
  else
  {
    $msg = "Event not created";
  }
}
?> 
    <div class="container">  
    <div class="table-responsive">  
    <h3 style="text-align:center;">Create Event</h3><br/>
    <div class="box">
     <form method="POST" action="#">  

       <div class="form-group">
       <label for="title">Enter Title of the Event</label>
       <input type="text" name="title" id="title" placeholder="Enter Title" required 
       data-parsley-type="title" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>

      <div class="form-group">
       <label for="title">Select Event</label>
       <select class="form-control" name="eventtype" class="form-control" required>
        <option value="None">Select Event*</option>
        <option value="Checklist">Checklist</option>
        <option value="Event">Event</option>
        <option value="Holiday">Holiday</option>
        </select>
      </div>

      <div class="form-group">
       <label for="title">Select Text Color</label>
       <input type="color" name="eventColor" class="form-control" id="eventColor" required="">
      </div>

      <div class="form-group">
       <label for="title">Select Bg-Color</label>
       <input type="color" name="eventbgcolor" class="form-control" id="eventColor" required="">
      </div>

      <div class="form-group">
       <label for="date">Start Date</label>
       <input type="date" name="start_date" id="start_date" required 
       data-parsley-type="date" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>

      <div class="form-group">
       <label for="date">End Date</label>
       <input type="date" name="end_date" id="end_date" required 
       data-parsley-type="date" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      
      <div class="form-group">
       <button type="submit" id="save-event" name="submit" type="submit" class="btn btn-success">Save Event</button>
       </div>
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
       <a href="view-events" class="btn btn-primary">List Events</a> 
     </form>
     </div>
   </div> 
   
  </div>
    
</div>

   <div>
  </div>
  <br>
  <?php 

$fetch_event = mysqli_query($conn, "SELECT * FROM event");

?>
<script>
   $(document).ready(function() {
   $('#calendar').fullCalendar({
       events:[
       <?php
       while($result = mysqli_fetch_array($fetch_event))
       { ?>
      {
          title: '<?php echo $result['event_name']; ?>',
          start: '<?php echo $result['event_start_date']; ?>',
          end: '<?php echo $result['event_end_date']; ?>',
          color: '<?php echo $result['eventbgcolor']; ?>',
          textColor: '<?php echo $result['eventColor']; ?>'
       },
    <?php } ?>
             ]

           
});
});
</script>

</body>  
</html> 