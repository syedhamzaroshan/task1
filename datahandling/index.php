<?php 

include('configuration/db.php');

 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Form Data Handling</title>
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
.box
 {
  width:100%;
  background-color:#0dcaf0;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}

.table 
    {
    border-collapse: separate;
    
    }

  .th{

    cursor: pointer;
    font-weight: normal;
    color: white;
    text-align: center;
    font-weight: bolder;
    border-bottom: 0;
    border-right: thin dotted gray;
    height: 50px;
     
}

.group{

cursor: pointer;
font-weight: normal;
color: gray;
text-align: center;
font-weight: bolder;
border-bottom: 0;
border-right: thin dotted gray;
height: 50px;
 
}

</style>
</head>
<body style="background-color: gray;">

<div class="card">
<div class="card-header">
<h3 class="card-title" style="text-align: center;">Form Data Handling</h3>
</div>
</div>
<div class="box">
<form class="row g-3 needs-validation" method="POST" action="#" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label" style="color: #000;"><b>First name</b></label>
    <input type="text"  class="form-control" id="validationCustom01" name="firstname" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom02" class="form-label" style="color: #000;"><b>Last name</b></label>
    <input type="text" class="form-control" id="validationCustom02" name="lastname" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label" style="color: #000;"><b>City</b></label>
    <input type="text" class="form-control" id="validationCustom03" name="city" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom04" class="form-label" style="color: #000;"><b>State</b></label>
    <input type="text" class="form-control" id="validationCustom03" name="state" required>
    <div class="invalid-feedback">
      Please select a valid State.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label" style="color: #000;"><b>Pin Code</b></label>
    <input type="number" class="form-control" id="validationCustom05" name="pincode" inputmode=”numeric” required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  
  <div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button class="btn btn-warning" type="submit" name="submit">Submit form</button>
  </div><br><br>
  <?php 

if(isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  
  $insert_query = mysqli_query($conn, "INSERT INTO entry(firstname,lastname,city,state,pincode) VALUES('$firstname', '$lastname', '$city', '$state', '$pincode')");
  if($insert_query)
  {
    echo "<script>alert('Entries Done Successfully')</script>";
    header('location:successfull.php');
  }
  else
  {
    echo "<script>alert('Entries Failed')</script>";
  }
}
?> 
</form>
</div><br><br>
<div class="container-fluid">
<h3 class="card-title" style="text-align: center;">Data Entries</h3><br>
<div class="table-responsive">
<table class="table table-bordered table-dark table-sm">

<thead>

<th scope="col" style="text-align: center;">Entry ID</th>
<th scope="col" style="text-align: center;">First Name</th>
<th scope="col" style="text-align: center;">Last Name</th>
<th scope="col" style="text-align: center;">City</th>
<th scope="col" style="text-align: center;">State</th>
<th scope="col" style="text-align: center;">Pincode</th>
<th scope="col" style="text-align: center;">Entry Time</th>
<th scope="col" style="text-align: center;">Actions</th>
</tr>
</thead>

<tbody class="table-group-divider">
<?php 

$limit = 6; 

if(isset($_GET['page']))
{
$page = $_GET['page'];

}
else
{
$page = 1;
}
$offset = ($page -1) * $limit;

$listentries = mysqli_query($conn, "SELECT * FROM entry ORDER BY entryid DESC LIMIT {$offset}, {$limit}");

if(mysqli_num_rows($listentries) > 0)
    {
        while ($row=mysqli_fetch_assoc($listentries)) 
        { 
            $entryid = $row['entryid'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $city = $row['city'];
            $state = $row['state'];
            $pincode = $row['pincode'];
            $entrytime = $row['entrytime'];
            ?>
            
  
<tr class="group">

<td><?php echo $entryid; ?></td>
<td><?php echo $firstname; ?></td>
<td><?php echo $lastname; ?></td>
<td><?php echo $city; ?></td>
<td><?php echo $state; ?></td>
<td><?php echo $pincode; ?></td>
<td><?php echo $entrytime; ?></td>
<td>
<a class="btn btn-success btn-sm" href="edit_entries?id=<?php echo $entryid; ?>"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
<a class="btn btn-danger btn-sm" href="del_entries?id=<?php echo $entryid; ?>" onclick="return confirm('Are you sure you want to delete this Entry?');"><i class="fas fa-trash"></i>&nbsp;Delete</a>
</td>
</tr>
<?php    }
    }
    ?>
</tbody>
 

</table>
</div>
<?php  
$sql1 = "SELECT * FROM entry ORDER BY entryid  DESC";
$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

if(mysqli_num_rows($result1) > 0){

while ($row=mysqli_fetch_assoc($result1)) {
  $entryid = $row['entryid'];
}
$total_records = mysqli_num_rows($result1);

$total_page = ceil($total_records / $limit);

echo '<nav aria-label="Page navigation example" >
<ul class="pagination justify-content-end">';

if($page > 1){
echo '<li class="page-item"><a href="index?page='.($page - 1).'" class="page-link">&nbsp;Prev</a>&nbsp;</li>';
}

for($i = 1; $i <= $total_page; $i++){
if($i == $page)
{
$active = "active";
}else
{
$active = "";
}
echo'<li class="page-item'.$active.'"><a class="page-link" href="index?page='.$i.'">&nbsp;'.$i.'&nbsp;</a>&nbsp;</li>';
}
if($total_page > $page)
{
echo '<li class="page-item"><a class="page-link" href="index?page='.($page + 1).'">&nbsp;Next</a>&nbsp;</a></li>';
}
echo'</ul></nav>';
}

else {
echo "<h2 style='text-align:center;color: #000;'>No Entries Found for Now</h2>";
} ?>
</div>

<script src="js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/92aaf4284a.js" crossorigin="anonymous"></script>
  </body>
<script>
  (() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</html>