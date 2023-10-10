<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Royal Apps Demo</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="listing.php">Author</a></li>
      <li><a href="add_book.php">Add Book</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
Welcome, <?php echo $_SESSION['user_info']['first_name']." ".$_SESSION['user_info']['last_name'];?> <a href="profile.php">View Profile</a>
