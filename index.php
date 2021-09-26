<?php 

//if submit button was clicked
if(isset($_POST['submit'])){
  //this username below is use to make a directory user who fill the form
  $username = $_POST['username'];
  
  $files = array_filter($_FILES['files']['name]); //file yang diupload dijadikan array
  $total_count = count($_FILES['files']['name']; //menghitung jumlah array
  for($i = 0 ; i < $total_count ; i++) {
    $tmpFilePath = $_FILES['files']['tmp_name'][$i] //checking the tmp file each file
    if($tmpFilePath !=""){
      //set new dir each user who fill the form with their username
      $dirusers = "yourfolder/". $username;
      mkdir($dirusers);
      $newPathFile = "$dirusers/" .$_FILES['files']['name'][$i];
      //memindah file ke dalam folder yang telah dibuat
      move_uploaded_file($tmpFilePath, $dirusers);
    }
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
    <input type="file" multiple name="files[] /> <br>
    <button type="submit" name="submit"> Submit </button>
  </form>
</body>
</html>
