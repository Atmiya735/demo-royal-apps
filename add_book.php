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
  <h3>Add New Book</h3>
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
    <form action="/action_page.php">
      <div class="form-group">
        <label for="email">Author:</label>
        <select class="dev_author form-control">
        <?php 
        foreach ($response['items'] as $value) {
          ?>
          <option value="<?php echo $value['id'];?>"><?php echo $value['first_name']." ".$value['last_name'];?></option>
          <?php     
        }
        ?>
      </select>
      </div>
      <div class="form-group">
        <label for="book_title">Book Title:</label>
        <input type="text" class="dev_book_title form-control" id="book_title">
      </div>
      <div class="form-group">
        <label for="book_description">Book Description:</label>
        <input type="text" class="dev_book_description form-control" id="book_description">
      </div>
      <div class="form-group">
        <label for="noofpages">Number of pages:</label>
        <input type="number" class="dev_pages form-control" id="noofpages">
      </div>
      <div class="form-group">
        <label for="book_isbn">ISBN :</label>
        <input type="text" class="dev_book_isbn form-control" id="book_isbn">
      </div>
      <div class="form-group">
        <label for="book_format">Format:</label>
        <input type="text" class="dev_book_format form-control" id="book_format">
      </div>
      <button type="button" class="btn_save_book btn btn-default">Submit</button>
    </form>
</div>

</body>
</html>
