<article>
<h2>Profilbilder</h2>
<?php
// Var ska bilderna lagras
$katalog = "bilder/";
// Lista tidigare profilbilder
$innehall = scandir($katalog);
// Skriv ut innehållet av katalogen
foreach ($innehall as $rad) {
    print(" - " . $rad . " <br>");
}
?>
<h2>Byt profilbild</h2>

<form action="profile.php" method="post" enctype="multipart/form-data">
  Select an image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit"><br>
</form>

<?php
$target_dir = "bilder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<br>File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<br>File is not an image.";
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
  echo "<br>Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<br>Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<br>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("refresh:2; url=profile.php");
  } else {
    echo "<br>Sorry, there was an error uploading your file.";
  }
}
}
?>
</article>