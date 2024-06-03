<?php 

include('configuration/db.php');
$showentries = mysqli_query($conn, "SELECT * FROM entry WHERE entryid = '".$_GET['id']."' ORDER BY entryid");
 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Form Data Handling</title>
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

</style>
</head>
<body style="background-color: gray;">

<div class="card">
<div class="card-header">
<h3 class="card-title" style="text-align: center;">Edit Form Data Handling</h3>
</div>
</div>
<div class="box">
<?php 
        while ($row=mysqli_fetch_assoc($showentries)) 
        { 
            
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $city = $row['city'];
            $state = $row['state'];
            $pincode = $row['pincode'];

            ?>
<form class="row g-3 needs-validation" method="POST" action="#" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label" style="color: #000;"><b>First name</b></label>
    <input type="text"  class="form-control" id="validationCustom01" value="<?php echo $firstname; ?>" name="firstname">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom02" class="form-label" style="color: #000;"><b>Last name</b></label>
    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $lastname; ?>" name="lastname">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label" style="color: #000;"><b>City</b></label>
    <input type="text" class="form-control" id="validationCustom03" value="<?php echo $city; ?>" name="city">
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom04" class="form-label" style="color: #000;"><b>State</b></label>
    <input type="text" class="form-control" id="validationCustom03" value="<?php echo $state; ?>" name="state">
    <div class="invalid-feedback">
      Please select a valid State.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label" style="color: #000;"><b>Pin Code</b></label>
    <input type="number" class="form-control" id="validationCustom05" value="<?php echo $pincode; ?>" name="pincode" inputmode=”numeric”>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div><br><br><br><br>
  <?php } ?>
  <div class="d-grid gap-2 d-md-flex justify-content-md-center">
  
    <button class="btn btn-warning" type="submit" name="submit">Update form</button>
  
    <a class="btn btn-danger" href="index">Cancel</a>
  
  </div><br><br>
  <?php 

if(isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  
  $insert_query = mysqli_query($conn, "UPDATE entry SET firstname = '$firstname', lastname = '$lastname', city = '$city', state = '$state', pincode = '$pincode'");
  if($insert_query)
  {
    echo "<script>alert('Entries Updated Successfully')</script>";
    header('location:index');
  }
  else
  {
    echo "<script>alert('Entries Update Failed')</script>";
  }
}
?> 
</form>
</div><br><br>


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