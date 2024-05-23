
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

</head>
<body>
  <h2 style="text-align: center;">Programmes List</h2>
  <div class="container">
    <div class="row">

    <table class="table">
  <thead>
  
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Text Color</th>
      <th scope="col">Bg Color</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Actions</th>
    </tr>

  </thead>
  <tbody>
  <?php 

$fetch_event = mysqli_query($conn, "SELECT * FROM event");
if (mysqli_num_rows($fetch_event) > 0) 
{
       while($result = mysqli_fetch_array($fetch_event))
       { 
?>
    <tr>
      <th scope="row"><?php echo $result['event_id']; ?></th>
      <td><?php echo $result['event_name']; ?></td>
      <td><?php echo $result['eventtype']; ?></td>
      <td><?php echo $result['eventColor']; ?></td>
      <td><?php echo $result['eventbgcolor']; ?></td>
      <td><?php echo $result['event_start_date']; ?></td>
      <td><?php echo $result['event_end_date']; ?></td>
      <td>
        <a href="edit-events?id=<?php echo $result['event_id']; ?>" class="btn btn-info">
        <i class="fa fa-edit" aria-hidden="true"></i> Edit Events
       </a>
        <a href="del-events?id=<?php echo $result['event_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Events?');">
        <i class="fa fa-close" aria-hidden="true"></i> Delete Events
        </button>
        </td>
    </tr>
    <?php } } ?>
  </tbody>
</table>
<a href="index" class="btn btn-primary">Go Back</a> 
   <div>
  </div>
  <br>
  <script src="https://kit.fontawesome.com/92aaf4284a.js" crossorigin="anonymous"></script>
</body>  
</html> 