<?php 
error_reporting(E_ALL);
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Apps Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
  <script src="admin.js"></script>
</head>
<body>
<?php 
include "nav.php";
?>
  
<div class="container">
  <h3>Profile Details</h3>
  <table id="author" class="table table-striped table-bordered" style="width:100%">
    <tbody>
		<tr>
			<td>Name:</td>
			<td><?php echo $_SESSION['user_info']['first_name']." ".$_SESSION['user_info']['last_name'];?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?php echo $_SESSION['user_info']['email'];?></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td><?php echo $_SESSION['user_info']['gender'];?></td>
		</tr>
    </tbody>
    </table>
</div>

</body>
</html>
