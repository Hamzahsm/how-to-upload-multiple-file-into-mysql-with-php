<!doctype html>
<html>
<head>
  <title>Tutorial How To Upload Multiple File</title>
</head>
<body>
  <form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="username"> Username </label>
    <input type="text" id="username" name="username" /> <br>
    <label for=""> Choose Files </label>
    <input type="file" multiple name="files[] /> <br>
    <button type="submit" name="submit"> Submit </button>
  </form>
</body>
</html>
