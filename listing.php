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
<script>
  $(document).ready(function(){
    new DataTable('#author');
  });
</script>
<body>
<?php 
  include "nav.php";
?>
<div class="container">
  <h3>Author List</h3>
  <?php 
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://candidate-testing.api.royal-apps.io/api/v2/authors',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$_SESSION['token'].'',
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response, true);
  ?>
  <table id="author" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Place Of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($response['items'] as $value) {
                ?>
                <tr>
                    <td><?php echo $value['first_name']." ".$value['last_name'];?></td>
                    <td><?php echo $value['gender'];?></td>
                    <td><?php echo $value['place_of_birth'];?></td>
                    <td><a href="single_author.php?id=<?php echo $value['id'];?>">View Books</a> | <a href="javascript:void(0)" class="dev_author_delete" data-id="<?php echo $value['id'];?>">Delete</a></td>
                </tr>
                <?php 
            }
          ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Place Of Birth</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
