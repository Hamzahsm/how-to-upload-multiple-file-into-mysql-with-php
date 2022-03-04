<?php 
//connecting to database 
$conn = mysqli_connect('yourhost', 'username', 'password', 'dbname');
//checking if failed to connecting the database
if(mysqli_connect_errno()){
  echo "Failed To Connect With The Database Because :" . mysqli_connect_error();
}

//if submit button was clicked
if(isset($_POST['submit'])){
  //this username below is use to make a directory user who fill the form
  $username = $_POST['username'];
  
  $files = array_filter($_FILES['files']['name']); //file yang diupload dijadikan array
  $total_count = count($_FILES['files']['name']); //menghitung jumlah array
  for($i = 0 ; $i < $total_count ; $i++) {
    $tmpFilePath = $_FILES['files']['tmp_name'][$i]; //checking the tmp file each file
    if($tmpFilePath !=""){
      //set new dir each user who fill the form with their username
      $dirusers = "./files/". $username;
      mkdir($dirusers);
      $newPathFile = "$dirusers/" .$_FILES['files']['name'][$i];
      //memindah file ke dalam folder yang telah dibuat
      move_uploaded_file($tmpFilePath, $newPathFile);
    }
  }
  
  //insert into mysqli
  $query = "INSERT INTO yourtable (username, files) VALUES ('$username', '$files')";
  $query_run = mysqli_query($conn, $query);
  
  if($query_run){
    echo"<script>alert('success insert into database!');</script>";
  } else {
    echo"<script>alert('Opps, failed insert into database!');</script>";
  }
}
?>

<!doctype html>
<html>
<head>
  <title>Tutorial How To Upload Multiple File</title>
</head>
<body>
  <form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="username"> Username </label>
    <input type="text" id="username" name="username" /> <br> <br>
    <label for=""> Choose Files </label>
    <input type="file" multiple name="files[]" /> <br>
    <button type="submit" name="submit"> Submit </button>
  </form>
</body>
</html>
